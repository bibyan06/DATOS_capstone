<?php

namespace App\Http\Controllers;
use App\Models\Document;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use App\Models\Role; // Include the Role model
use Illuminate\Support\Facades\Log;

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


    // Function to handle the addition of a new dean account
    // Function to handle the addition of a new dean account
    public function storeDeanAccount(Request $request)
    {
        try {
            // Validate the input data
            $validated = $request->validate([
                'last_name' => 'required|string|max:255',
                'first_name' => 'required|string|max:255',
                'middle_name' => 'nullable|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'college' => 'required|string|max:255',
                'password' => 'required|string|min:6',
                'employee_id' => 'required|string|unique:users',
            ]);

            // Fetch the role ID for the dean from the roles table
            $role = Role::where('position', 'Dean')->first();

            if (!$role) {
                // Handle the case where the 'dean' role doesn't exist
                \Log::error('Role not found for position: dean');
                return response()->json(['success' => false, 'message' => 'Dean role not found.']);
            }

            // Create a new dean account and assign the role
            $user = User::create([
                'last_name' => $validated['last_name'],
                'first_name' => $validated['first_name'],
                'middle_name' => $validated['middle_name'],
                'email' => $validated['email'],
                'college' => $validated['college'],
                'password' => bcrypt(value: $validated['password']),
                'employee_id' => $validated['employee_id'],
                'role_id' => $role->id, // Save the fetched role ID
            ]);

            // Send verification email
            $user->sendEmailVerificationNotification();

            // Create an entry in the Employee table
            Employee::create([
                'employee_id' => $validated['employee_id'], // Use the validated employee_id
                'last_name' => $user->last_name,
                'first_name' => $user->first_name,
                'position' => 'Dean', // Assign position as 'Dean'
            ]);

            

            // Send success response
            return response()->json(['success' => true, 'message' => 'Dean account created successfully. Verification email sent.']);
        } catch (\Exception $e) {
            // Log the error and send failure response
            \Log::error('Failed to create dean account:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'Failed to create dean account.']);
        }
    }

    public function deanList()
    {
        $users = User::where('role_id', '3')->get(); // Adjust based on your role column
        return view('admin.college_dean', compact('users'));
    }

}
