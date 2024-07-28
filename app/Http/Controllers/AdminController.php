<?php

namespace App\Http\Controllers;

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

    public function someMethod()
{
    $user = auth()->user();

    if (strpos($user->employee_id, '01') !== 0) {
        abort(403, 'Unauthorized action.');
    }

    // Proceed with the action
}
}
