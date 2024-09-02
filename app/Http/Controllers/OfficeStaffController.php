<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Employee;
use App\Models\User;
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

    public function view($document_id)
    {
        $document = Document::findOrFail($document_id);

        if (!$document) {
            abort(404, 'Document not found.');
        }
    
        return view('office_staff.documents.os_view_docs', compact('document'));
    }

    public function edit($document_id)
    {
        $document = Document::find($document_id);
        return view('office_staff.documents.edit_docs', compact('document'));
    }

    public function update(Request $request, $document_id)
    {
        $request->validate([
            'document_name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $document = Document::findOrFail($document_id);
        $document->document_name = $request->input('document_name');
        $document->description = $request->input('description');
        $document->save();

        return redirect()->route('office_staff.documents.os_view_docs', $document_id)
                         ->with('success', 'Document updated successfully.');
    }


    public function category_count()
    {
        // Retrieve documents uploaded by the current user
        $currentUserName = Auth::user()->first_name . ' ' . Auth::user()->last_name;
        $documents = Document::where('uploaded_by', $currentUserName)->get();
    
        // Count documents per category
        $memorandumCount = Document::where('category_name', 'Memorandum')->count();
        $claimMonitoringSheetCount = Document::where('category_name', 'Claim Monitoring Sheet')->count();
        $mrspCount = Document::where('category_name', 'Monthly Report Service of Personnel')->count();
        $auditedDVCount = Document::where('category_name', 'Audited Disbursement Voucher')->count();
    
        // Pass the data to the view
        return view('office_staff.os_dashboard', compact('documents', 'memorandumCount', 'claimMonitoringSheetCount', 'mrspCount', 'auditedDVCount'));
    }

    public function display_uploaded_docs()
    {
        $currentUserName = Auth::user()->first_name . ' ' . Auth::user()->last_name;
        $documents = Document::where('uploaded_by', $currentUserName)->get();

        // Count documents per category
        $memorandumCount = Document::where('category_name', 'Memorandum')->count();
        $claimMonitoringSheetCount = Document::where('category_name', 'Claim Monitoring Sheet')->count();
        $mrspCount = Document::where('category_name', 'Monthly Report Service of Personnel')->count();
        $auditedDVCount = Document::where('category_name', 'Audited Disbursement Voucher')->count();

        // Pass the data to the view
        return view('office_staff.os_dashboard', compact('documents', 'memorandumCount', 'claimMonitoringSheetCount', 'mrspCount', 'auditedDVCount'));
    }
    
}
