<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

    public function upload_document()
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

    public function approved_docs()
    {
        return view('admin..documents.approved_docs');
    }

    public function edit_docs()
    {
        return view('admin..documents.edit_docs');
    }

    public function memorandum()
    {
        return view('admin..documents.memorandum');
    }

    public function request_docs()
    {
        return view('admin..documents.request_docs');
    }

    public function sent_docs()
    {
        return view('admin..documents.sent_docs');
    }

    public function view_docs()
    {
        return view('admin..documents.view_docs');
    }


    public function someMethod()
    {
        $user = auth()->user();

        if (strpos($user->employee_id, '01') !== 0) {
            abort(403, 'Unauthorized action.');
        }
        // Proceed with the action
    }

    public function showAdminHome()
    {
        $user = Auth::user();
        dd($user); // This will dump the user data and stop execution
        return view('admin', compact('user'));
    }
}
