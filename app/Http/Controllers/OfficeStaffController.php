<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class OfficeStaffController extends Controller
{
    public function dashboard()
    {
        return view('office_staff.os_dashboard');
    }
    public function os_account()
    {
        return view('office_staff.os_account');
    }

    public function upload_document()
    {
        return view('office_staff.os_upload_document');
    }

    public function memorandum()
    {
        return view('office_staff.documents.memorandum');
    }

    public function os_notification()
    {
        return view('office_staff.os_notification');
    }

    public function someMethod()
    {
    $user = auth()->user();

    if (strpos($user->employee_id, '02') !== 0) {
        abort(403, 'Unauthorized action.');
    }

    // Proceed with the action
    }

    public function uploadDocument(Request $request)
    {
        // Validate the form data
        $request->validate([
            'document_number' => 'required|numeric',
            'document_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|exists:category,category_id', // Ensure the category exists
            'file_upload' => 'required|file|mimes:pdf|max:10240', // max size 10MB
            'document_tags' => 'nullable|string',
        ]);

        // Debugging: Log the request data
        \Log::info('Upload Request Data:', $request->all());

        // Handle the file upload
        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('documents', $fileName, 'public');

            // Debugging: Log the file path
            \Log::info('Uploaded File Path:', ['file_path' => $filePath]);

            // Save the document record to the database
            $document = new Document();
            $document->document_number = $request->document_number;
            $document->document_name = $request->document_name;
            $document->description = $request->description;
            $document->category_id = $request->category;
            $document->file_path = $filePath;
            $document->document_status = 'pending';
            $document->upload_date = now();
            $document->uploaded_by = Auth::user_id();

            // Debugging: Check if the document is being saved correctly
            if ($document->save()) {
                \Log::info('Document saved successfully:', ['document' => $document]);
            } else {
                \Log::error('Failed to save document.');
            }

            // Handle tags if provided
            if ($request->document_tags) {
                $tags = explode(',', $request->document_tags);
                foreach ($tags as $tagName) {
                    $tag = Tag::firstOrCreate(['tag_name' => trim($tagName)]);
                    $document->tags()->attach($tag);
                }
            }

            return redirect()->back()->with('success', 'Document uploaded successfully.');
        }

        return redirect()->back()->with('error', 'File upload failed.');
    }

}
