<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException; // Import the correct exception class

class DocumentController extends Controller
{
    
    public function create()
    {
        $categories = DB::table('category')->get(); // Fetch all categories from the 'category' table
        return view('office_staff.os_upload_document', compact('categories'));
    }

    public function store(Request $request)
    {
        Log::info('Upload Document Method Called');

        $allowedCategories = ['Memorandum', 'Audited Disbursement Voucher', 'Claim Monitoring Sheet', 
                                'Monthly Report Service of Personnel'];

        try {
            $validatedData = $request->validate([
                'document_number' => 'required|string',
                'document_name' => 'required|string',
                'description' => 'nullable|string',
                'category_name' => 'required|exists:category,category_name',
                'file' => 'required|mimes:pdf|max:5120',
                'document_tags' => 'nullable|string',
            ]);

            Log::info('Validation passed:', $validatedData);

            if ($request->hasFile('file')) {
                $path = $request->file('file')->store('documents');
                Log::info('File uploaded to: ' . $path);

                $document = new Document();
                $document->document_number = $validatedData['document_number'];
                $document->document_name = $validatedData['document_name'];
                $document->description = $validatedData['description'] ?? null;
                $document->category_name = $validatedData['category_name'];
                $document->file_path = $path;
                $document->document_status = 'pending';
                $document->upload_date = now();
                $authenticatedUser = Auth::user();
                if ($authenticatedUser) {
                    $document->uploaded_by = $authenticatedUser->first_name . ' ' . $authenticatedUser->last_name;
                } else {
                    $document->uploaded_by = 'Unknown User';
                }                DB::transaction(function () use ($document) {
                    $document->save();
                });

                Log::info('Document saved successfully with ID: ' . $document->id);

                if ($request->has('document_tags')) {
                    $tags = explode(',', $request->input('document_tags'));
                    foreach ($tags as $tag) {
                        $tagModel = Tag::firstOrCreate(['tag_name' => trim($tag)]);
                        $document->tags()->attach($tagModel);
                    }
                }

                return response()->json([
                    'message' => 'Document uploaded and pending review.'
                ], 200);

            } else {
                Log::warning('No file was uploaded with the request.');
                return response()->json(['error' => 'Please upload a file.'], 422);
            }

        } catch (ValidationException $e) {
            Log::error('Validation failed', ['errors' => $e->errors()]);
            return response()->json(['error' => 'Validation failed.', 'details' => $e->errors()], 422);

        } catch (\Exception $e) {
            Log::error('Error saving document: ' . $e->getMessage());
            return response()->json(['error' => 'Document upload failed.'], 500);
        }
    }


    public function approve($id)
    {
        $document = Document::findOrFail($id);
        $document->document_status = 'approved';
        $document->save();

        return redirect()->route('documents.review_docs')
            ->with('success', 'Document approved successfully.');
    }

    public function decline($id)
    {
        $document = Document::findOrFail($id);
        $document->document_status = 'declined';
        $document->save();

        return redirect()->route('documents.review_docs')
            ->with('error', 'Document declined.');
    }

    public function showRecentDocuments()
    {
        $documents = Document::where('document_status', 'approved')->get();
        return view('your_view_name', compact('documents'));
    }

}
