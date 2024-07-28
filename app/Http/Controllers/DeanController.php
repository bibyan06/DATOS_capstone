<?php

namespace App\Http\Controllers;

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

    public function someMethod()
{
    $user = auth()->user();

    if (strpos($user->employee_id, '03') !== 0) {
        abort(403, 'Unauthorized action.');
    }

    // Proceed with the action
}
}
