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
}
