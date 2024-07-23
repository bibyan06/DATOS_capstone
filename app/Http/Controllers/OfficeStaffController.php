<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfficeStaffController extends Controller
{
    public function dashboard()
    {
        return view('office_staff.os_dashboard');
    }
    public function account()
    {
        return view('office_staff.os_account');
    }

    public function upload_document()
    {
        return view('office_staff.os_upload_document');
    }
}
