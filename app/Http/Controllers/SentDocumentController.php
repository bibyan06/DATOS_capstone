<?php

namespace App\Http\Controllers;

use App\Models\ForwardedDocument;
use App\Models\SendDocument;
use App\Models\Employee; // Import Employee model
use Illuminate\Support\Facades\Auth;

class SentDocumentController extends Controller
{
    public function index($viewName)
    {
        // Fetch the authenticated user's employee_id
        $userEmployeeId = auth()->user()->employee_id;

        // Fetch the corresponding employee record from the Employee table
        $employee = Employee::where('employee_id', $userEmployeeId)->first();

        // Ensure that the employee record exists before querying documents
        if ($employee) {
            // Use the employee's id for filtering the forwarded and sent documents
            $employeeId = $employee->id;

            // Fetch forwarded documents where the current user is the one who forwarded the document
            $forwardedDocuments = ForwardedDocument::with(['forwardedToEmployee', 'document'])
                ->where('forwarded_by', $employeeId) // Correct filter for employee id
                ->get();

            // Fetch sent documents where the current user issued the document
            $sentDocuments = SendDocument::with(['employee', 'document'])
                ->where('issued_by', $employeeId) // Correct filter for employee id
                ->get();

            // Log the results to verify data
            \Log::info('Forwarded Documents:', $forwardedDocuments->toArray());
            \Log::info('Sent Documents:', $sentDocuments->toArray());

            // Return the view with the filtered documents
            return view($viewName, compact('forwardedDocuments', 'sentDocuments'));
        } else {
            // Handle case where the employee record doesn't exist for the user
            \Log::error('Employee record not found for user with employee_id: ' . $userEmployeeId);
            return view($viewName)->withErrors(['Employee record not found.']);
        }
    }
}
