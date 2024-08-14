<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    public function uploadDocument(Request $request)
    {
        \Log::info('Upload Document Method Called');
        
        // Define allowed categories
        $allowedCategories = ['1', '2', '3', '4']; // Example IDs

        // Validate the form data
        $request->validate([
            'document_number' => 'required|numeric',
            'document_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => ['required', function ($attribute, $value, $fail) use ($allowedCategories) {
                if (!in_array($value, $allowedCategories)) {
                    $fail('The selected category is invalid.');
                }
            }],
            'file_upload' => 'required|array',
            'file_upload.*' => 'file|mimes:pdf|max:1024', 
            'document_tags' => 'nullable|string',
        ]);

        \Log::info('Request Data:', $request->all());

        // Handle the file upload
        $files = $request->file('file_upload');
        $uploadedDocuments = [];

        foreach ($files as $file) {
            $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('documents', $fileName, 'public');
            \Log::info('Uploaded File Path:', ['file_path' => $filePath]);

            // Save the document record to the database
            $document = new Document();
            $document->document_number = $request->document_number;
            $document->document_name = $request->document_name;
            $document->description = $request->description;
            $document->category_id = $request->category_id;
            $document->file_path = $filePath;
            $document->document_status = 'pending'; // Set status to pending initially
            $document->upload_date = now();
            $document->uploaded_by = Auth::id();

            if ($document->save()) {
                \Log::info('Document saved successfully:', ['document' => $document]);

                // Handle tags
                if ($request->document_tags) {
                    $tags = explode(',', $request->document_tags);
                    foreach ($tags as $tagName) {
                        $tag = Tag::firstOrCreate(['tag_name' => trim($tagName)]);
                        $document->tags()->attach($tag);
                    }
                }

                $uploadedDocuments[] = $document;
            } else {
                \Log::error('Failed to save document.');
                return response()->json([
                    'success' => false,
                    'message' => 'File upload failed.'
                ], 400);
            }
        }

        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Document uploaded successfully.',
            'documents' => $uploadedDocuments
        ]);
    }
    public function showUploadForm()
    {
        return view('admin.admin_upload_document');
    }
    
    // public function store(Request $request)
    // {
    //     // Validate and handle file upload
    //     $request->validate([
    //         'document_name' => 'required|string',
    //         'description' => 'nullable|string',
    //         'category_id' => 'required|integer',
    //         'file' => 'required|file|mimes:pdf|max:5120',
    //     ]);

    //     $file = $request->file('file');
    //     $filePath = $file->store('documents'); // Store the file

    //     Document::create([
    //         'document_name' => $request->input('document_name'),
    //         'description' => $request->input('description'),
    //         'category_id' => $request->input('category_id'),
    //         'file_path' => $filePath,
    //         'document_status' => 'pending', // Initially mark as pending
    //         'upload_date' => now(),
    //         'uploaded_by' => auth()->user()->id,
    //     ]);

    //     return redirect()->route('admin.documents.review_docs')->with('success', 'Document uploaded and pending review.');
    // }

    public function showReviewDocs()
    {
        // Fetch documents with 'pending' status
        $documents = Document::where('document_status', 'pending')->get();
        return view('admin.documents.review_docs', compact('documents'));
    }

    public function reviewDocument(Request $request, $id)
    {
        $document = Document::findOrFail($id);
        $action = $request->input('action');

        if ($action == 'approve') {
            $document->document_status = 'approved';
        } elseif ($action == 'decline') {
            $document->document_status = 'declined';
        } else {
            // Handle invalid action case
            return redirect()->route('admin.documents.review_docs')->with('error', 'Invalid action.');
        }

        $document->save();

        // Redirect based on the action
        if ($document->document_status == 'approved') {
            return redirect()->route('admin.documents.approved_docs')->with('success', 'Document approved successfully.');
        } else {
            return redirect()->route('admin.documents.review_docs')->with('success', 'Document declined successfully.');
        }
    }

    public function showApprovedDocs()
    {
        // Fetch documents with 'approved' status
        $documents = Document::where('document_status', 'approved')->get();
        return view('admin.documents.approved_docs', compact('documents'));
    }

}
