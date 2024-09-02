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

    public function create_admin()
    {
        $categories = DB::table('category')->get(); // Fetch all categories from the 'category' table
        return view('admin.admin_upload_document', compact('categories'));
    }

    public function store(Request $request)
    {
        Log::info('Upload Document Method Called');

    $allowedCategories = [
        'Memorandum', 
        'Audited Disbursement Voucher', 
        'Claim Monitoring Sheet', 
        'Monthly Report Service of Personnel'
    ];

    try {
        // Validate the request data
        $validatedData = $request->validate([
            'document_number' => 'required|string',
            'document_name' => 'required|string',
            'description' => 'nullable|string',
            'category_name' => 'required|exists:category,category_name',
            'file' => 'required|mimes:pdf|max:5120',
            'tags' => 'nullable|string',
        ]);

        Log::info('Validation passed:', $validatedData);

        // Check if the file is uploaded
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('documents');
            Log::info('File uploaded to: ' . $path);

            $document = new Document();
            $document->document_number = $validatedData['document_number'];
            $document->document_name = $validatedData['document_name'];
            $document->description = $validatedData['description'] ?? null;
            $document->category_name = $validatedData['category_name'];
            $document->file_path = $path;
            $document->document_status = 'Pending';
            $document->upload_date = now();

            // Set the uploaded_by field
            $authenticatedUser = Auth::user();
            $document->uploaded_by = $authenticatedUser ? $authenticatedUser->first_name . ' ' . $authenticatedUser->last_name : 'Unknown User';

            DB::transaction(function () use ($document, $request) {
                $document->save();

                // Handle tags if provided
                if ($request->has('tags')) {
                    $tags = explode(',', $request->input('tags'));
                    foreach ($tags as $tag) {
                        $tagModel = Tag::firstOrCreate(['tag_name' => trim($tag)]);
                        $document->tags()->attach($tagModel->tag_id);
                    }
                }
            });

            Log::info('Document saved successfully with ID: ' . $document->id);

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


    public function approve($document_id)
    {
        // Find the document by its ID
        $document = Document::find($document_id);

        // Check if the document exists and is currently pending
        if ($document && $document->document_status == 'Pending') {
            // Update the document status to 'approved'
            $document->document_status = 'Approved';
            $document->save();

            // Flash a success message to the session
            session()->flash('success', 'Document approved successfully.');

            // Redirect to the approved documents page
            return redirect()->route('admin.documents.approved_docs');
        } else {
            // Flash an error message if the document cannot be approved
            session()->flash('error', 'Unable to approve document.');
            return back();
        }
    }

    public function decline($documentId, Request $request)
{
    // Validate the remark
    $request->validate([
        'remark' => 'required|string|max:255',
    ]);

    // Find the document
    $document = Document::findOrFail($documentId);

    // Update the document status and remark
    $document->document_status = 'Declined';
    $document->remark = $request->remark;
    $document->save();

    return redirect()->route('admin.documents.declined_docs')->with('status', 'Document is declined.');
}

    public function showApprovedDocuments()
    {
        // Fetch all approved documents
        $documents = Document::where('document_status', 'approved')->get();
        return view('admin.documents.approved_docs', compact('documents'));
    }


    public function serve($filename)
    {
        $file = storage_path('app/documents/' . $filename);

        if (file_exists($file)) {
            return response()->download($file);
        }

        return abort(404);
    }

}
