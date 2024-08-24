<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class OfficeStaffController extends Controller
{
    public function dashboard()
    {
        return view('office_staff.os_dashboard');
    }
    public function os_account()
    {
        return view('office_staff.os_account');
    }

    public function os_upload_document()
    {
        return view('office_staff.os_upload_document');
    }

    public function memorandum()
    {
        return view('office_staff.documents.memorandum');
    }

    public function os_all_docs()
    {
        return view('office_staff.documents.os_all_docs');
    }
    public function os_view_docs()
    {
        return view('office_staff.documents.os_view_docs');
    }
    public function edit_docs()
    {
        return view('office_staff.documents.edit_docs');
    }

    public function os_notification()
    {
        return view('office_staff.os_notification');
    }

    public function someMethod()
    {
    $user = auth()->user();

    if (strpos($user->employee_id, '02') !== 0) {
        abort(403, 'Unauthorized action.');
    }

    // Proceed with the action
    }

    public function showHomePage()
    {
        $documents = Document::where('document_status', 'Approved')->get(); // or any other query
        return view('home.office_staff', compact('documents'));
    }
    
}
