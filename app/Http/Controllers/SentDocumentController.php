<?php

namespace App\Http\Controllers;

use App\Models\ForwardedDocument;
use App\Models\SendDocument;


class SentDocumentController extends Controller
{
    public function index()
    {
        // Fetch forwarded documents with related employee (recipient) and document details
        $forwardedDocuments = ForwardedDocument::with(['forwardedToEmployee', 'document'])->get();
        $sentDocuments = SendDocument::with(['employee', 'document'])->get();
    
        return view('admin.documents.sent_docs', compact('forwardedDocuments', 'sentDocuments'));
    }
    
}
