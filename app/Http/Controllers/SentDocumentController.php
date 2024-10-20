<?php

namespace App\Http\Controllers;

use App\Models\ForwardedDocument;
use App\Models\SendDocument;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class SentDocumentController extends Controller
{
    public function index($viewName)
    {
        // Fetch forwarded documents only for the authenticated user
        $forwardedDocuments = ForwardedDocument::with(['forwardedToEmployee', 'document'])
            ->where('forwarded_by', auth()->id())
            ->get();

        // Fetch sent documents only for the authenticated user
        $sentDocuments = SendDocument::with(['employee', 'document'])
            ->where('issued_by', auth()->id())
            ->get();

        // Return the view with the filtered documents
        return view($viewName, compact('forwardedDocuments', 'sentDocuments'));
    }
}
