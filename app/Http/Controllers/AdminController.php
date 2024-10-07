<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Employee;
use App\Models\User;
use App\Models\Role;

class AdminController extends Controller
{
    public function dashboard()
    {
        $documents = Document::all(); // Fetch documents from the database
        $totalDocuments = $documents->count();
        $totalEmployees = Employee::count(); // Assuming you also want total employees
    
        // Pass the data to the view
        return view('admin.admin_dashboard', compact('documents', 'totalDocuments', 'totalEmployees'));;
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

    public function notification()
    {
        return view('admin.admin_notification');
    }

    public function review_docs()
    {
        // Fetch documents with 'pending' status
        $documents = Document::where('document_status', 'Pending')->get();
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

    public function admin_order()
    {
        return view('admin.documents.admin_order');
    }

    public function mrsp()
    {
        return view('admin.documents.mrsp');
    }

    public function cms()
    {
        return view('admin.documents.cms');
    }

    public function audited_dv()
    {
        return view('admin.documents.audited_dv');
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

    public function showAdminPage()
    {
        // Fetch the pending document count
        $pendingCount = Document::where('document_status', 'Pending')->count();

        // Pass the pending count to the correct view (ensure the right view file is used)
        return view('admin.admin_dashboard', compact('pendingCount')); // Adjust 'admin.dashboard' to the correct view file
    }


    public function adminHome()
    {
        // Fetch the documents from the database
        $documents = Document::where('document_status', 'Approved')->get();

        // Pass the documents to the view
        return view('home.admin', compact('documents'));
    }

    public function adminDashboard()
    {
        // Count the total number of approved documents
        $totalDocuments = Document::where('document_status', 'Approved')->count();

        // Count the total number of employees
        $totalEmployees = Employee::count();

        // Pass these values to the view
        return view('admin.admin_dashboard', compact('totalDocuments', 'totalEmployees'));
    }

    public function view($document_id)
    {
        $document = Document::findOrFail($document_id);

        if (!$document) {
            abort(404, 'Document not found.');
        }
    
        return view('admin.documents.view_docs', compact('document'));
    }

    public function edit($document_id)
    {
        $document = Document::find($document_id);
        return view('admin.documents.edit_docs', compact('document'));
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

        return redirect()->route('admin.documents.view_docs', $document_id)
                         ->with('success', 'Document updated successfully.');
    }


    public function category_count()
    {
        // Fetch totals for the dashboard
        $totalDocuments = Document::count();
        $totalEmployees = User::count();

        // Fetch counts by document category
        $claimMonitoringSheetCount = Document::where('category_name', 'Claim Monitoring Sheet')->where('document_status', 'Approved')->count();
        $memorandumCount = Document::where('category_name', 'Memorandum')->where('document_status', 'approved')->count();
        $mrspCount = Document::where('category_name', 'Monthly Report Service of Personnel')->where('document_status', 'Approved')->count();
        $auditedDVCount = Document::where('category_name', 'Audited Disbursement Voucher')->where('document_status', 'Approved')->count();

        return view('admin.admin_dashboard', compact(
            'totalDocuments', 'totalEmployees',
            'claimMonitoringSheetCount', 'memorandumCount', 'mrspCount', 'auditedDVCount'
        ));
    }

    public function display_uploaded_docs()
    {
        // Fetch all documents from the documents table
        $documents = Document::all();

        // Additional data for the dashboard (e.g., counts)
        $totalDocuments = Document::count();
        $totalEmployees = Employee::count();
        
        $claimMonitoringSheetCount = Document::where('category_name', 'claim_monitoring_sheet')->count();
        $memorandumCount = Document::where('category_name', 'memorandum')->count();
        $mrspCount = Document::where('category_name', 'mrsp')->count();
        $auditedDVCount = Document::where('category_name', 'audited_DV')->count();

        return view('admin.admin_dashboard', compact(
            'documents',
            'totalDocuments',
            'totalEmployees',
            'claimMonitoringSheetCount',
            'memorandumCount',
            'mrspCount',
            'auditedDVCount'
        ));
    }

    public function showProfile()
    {
        // Eager load the role with the user
        $user = User::with('role')->find(Auth::id());

        return view('admin.admin_account', compact('user'));
    }

    public function showOfficeStaff()
    {
        // Retrieve all office staff where the second segment of employee_id is '002'
        $officeStaff = Employee::whereRaw("SUBSTRING_INDEX(SUBSTRING_INDEX(employee_id, '-', 2), '-', -1) = '002'")
                                ->get();

        // Pass the data to the view
        return view('admin.office_staff', ['officeStaff' => $officeStaff]);
    }

    public function showMemorandums()
    {
        // Assuming category_id for Memorandum is '1' or replace it with the correct value
        $documents = Document::where('category_name', 'Memorandum')
                            ->where('document_status', 'approved') // Show only approved documents
                            ->get();

        return view('admin.documents.memorandum', compact('documents'));
    }

    // public function showAdminOrders()
    // {
    //     // Assuming category_id for Memorandum is '1' or replace it with the correct value
    //     $documents = Document::where('category_name', 'Administrative Orders')
    //                         ->where('document_status', 'approved') // Show only approved documents
    //                         ->get();

    //     return view('admin.documents.admin_order', compact('documents'));
    // }

    public function showMrsp()
    {
        // Assuming category_id for Memorandum is '1' or replace it with the correct value
        $documents = Document::where('category_name', 'Monthly Report Service Personnel')
                            ->where('document_status', 'approved') // Show only approved documents
                            ->get();

        return view('admin.documents.mrsp', compact('documents'));
    }

    public function showCms()
    {
        // Assuming category_id for Memorandum is '1' or replace it with the correct value
        $documents = Document::where('category_name', 'Claim Monitoring Sheet')
                            ->where('document_status', 'approved') // Show only approved documents
                            ->get();

        return view('admin.documents.cms', compact('documents'));
    }

    public function showAuditedDV()
    {
        // Assuming category_id for Memorandum is '1' or replace it with the correct value
        $documents = Document::where('category_name', 'Audited Disbursement Voucher')
                            ->where('document_status', 'approved') // Show only approved documents
                            ->get();

        return view('admin.documents.audited_dv', compact('documents'));
    }



}