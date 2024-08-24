<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Document;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.admin_dashboard');
    }

    public function admin_account()
    {
        return view('admin.admin_account');
    }

    public function admin_upload_document()
    {
        return view('admin.admin_upload_document');
    }

    public function view_document()
    {
        return view('admin.admin_view_document');
    }

    public function college_dean()
    {
        return view('admin.college_dean');
    }

    public function office_staff()
    {
        return view('admin.office_staff');
    }

    public function review_docs()
    {
        // Fetch documents with 'pending' status
        $documents = Document::where('document_status', 'pending')->get();
        return view('admin.documents.review_docs', compact('documents'));
    }

    public function approved_docs()
    {
        // Fetch documents with 'approved' status
        $documents = Document::where('document_status', 'Approved')->get();
        return view('admin.documents.approved_docs', compact('documents'));
    }

    public function declined_docs()
    {
        // Fetch documents with 'approved' status
        $documents = Document::where('document_status', 'Declined')->get();
        return view('admin.documents.declined_docs', compact('documents'));
    }

    public function edit_docs()
    {
        return view('admin.documents.edit_docs');
    }

    public function memorandum()
    {
        return view('admin.documents.memorandum');
    }

    public function request_docs()
    {
        return view('admin.documents.request_docs');
    }

    public function sent_docs()
    {
        return view('admin.documents.sent_docs');
    }

    public function view_docs()
    {
        return view('admin.documents.view_docs');
    }
    public function all_docs()
    {
        return view('admin.documents.all_docs');
    }

    public function someMethod()
    {
        $user = auth()->user();

        // Ensure the user has the '01' prefix in employee_id for admin actions
        if (strpos($user->employee_id, '01') !== 0) {
            abort(403, 'Unauthorized action.');
        }
        // Proceed with the action
    }

    public function reviewDocument(Request $request, $id)
    {
        $document = Document::findOrFail($id);
        $action = $request->input('action');

        if ($action == 'Approve') {
            $document->document_status = 'Approved';
        } elseif ($action == 'Decline') {
            $document->document_status = 'Declined';
        }

        $document->save();

        // Redirect based on the action
        if ($document->document_status == 'Approved') {
            return redirect()->route('admin.documents.approved_docs')->with('success', 'Document approved successfully.');
        } else {
            return redirect()->route('admin.documents.review_docs')->with('success', 'Document declined successfully.');
        }
    }

    public function adminHome()
    {
        // Fetch the documents from the database
        $documents = Document::where('document_status', 'Approved')->get();

        // Pass the documents to the view
        return view('home.admin', compact('documents'));
    }
}
