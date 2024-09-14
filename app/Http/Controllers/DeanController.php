<?php

namespace App\Http\Controllers;
use App\Models\Document;
use Illuminate\Support\Facades\DB;

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

    public function admin_order()
    {
        return view('dean.documents.admin_order');
    }

    public function mrsp()
    {
        return view('dean.documents.mrsp');
    }

    public function cms()
    {
        return view('dean.documents.cms');
    }

    public function audited_dv()
    {
        return view('dean.documents.audited_dv');
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

    public function showDeanHome()
    {
        $documents = DB::table('documents')
            ->join('category', 'documents.category_name', '=', 'category.category_name') // Join using category_name
            ->where('category.category_name', 'Memorandum')  // Filter for memorandums
            ->select('documents.*')  // Select all columns from the documents table
            ->get();
    
        return view('home.dean', compact('documents')); // Passing 'documents' to the view
    }

}
