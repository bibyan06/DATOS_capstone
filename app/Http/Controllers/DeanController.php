<?php

namespace App\Http\Controllers;
use App\Models\Document;

use Illuminate\Http\Request;

class DeanController extends Controller
{
    public function dashboard()
    {
        return view('dean.dean_dashboard');
    }
    public function dean_account()
    {
        return view('dean.dean_account');
    }

    public function upload_document()
    {
        return view('dean.dean_upload_document');
    }

    public function edit_docs()
    {
        return view('dean.documents.dean_edit_docs');
    }

    public function notification()
    {
        return view('dean.documents.dean_notification');
    }

    public function request()
    {
        return view('dean.documents.dean_request');
    }

    public function search()
    {
        return view('dean.documents.dean_search');
    }

    public function view_docs()
    {
        return view('dean.documents.dean_view_docs');
    }
    public function memorandum()
    {
        return view('dean.documents.memorandum');
    }

    public function someMethod()
    {
        $user = auth()->user();

        if (strpos($user->employee_id, '03') !== 0) {
            abort(403, 'Unauthorized action.');
        }

        // Proceed with the action
    }
    public function showHomePage()
    {
        $documents = Document::where('document_status', 'Approved')->get(); 
        return view('home.dean', compact('documents'));
    }

    public function showApprovedDocuments()
    {
        // Fetch all approved documents
        $documents = Document::where('document_status', 'Approved')->get();
        return view('dean.documents.dean_search', compact('documents'));
    }
}
