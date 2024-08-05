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
        try {
            $request->validate([
                'document_number' => 'required|numeric',
                'document_name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'category' => ['required', function ($attribute, $value, $fail) use ($allowedCategories) {
                    if (!in_array($value, $allowedCategories)) {
                        $fail('The selected category is invalid.');
                    }
                }],
                'file_upload' => 'required|file|mimes:pdf|max:10240', // max size 10MB
                'document_tags' => 'nullable|string',
            ]);
        } catch (ValidationException $e) {
            \Log::error('Validation failed', ['errors' => $e->errors()]);
            return response()->json(['message' => 'Validation failed.', 'errors' => $e->errors()], 422);
        }
    
        \Log::info('Request Data:', $request->all());
    
        // Handle the file upload
        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('documents', $fileName, 'public');
    
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
            $document->uploaded_by = Auth::id();
    
            if ($document->save()) {
                \Log::info('Document saved successfully:', ['document' => $document]);
            } else {
                \Log::error('Failed to save document.');
            }
    
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
