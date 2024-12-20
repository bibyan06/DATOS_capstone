<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForwardedDocument;
use App\Models\SendDocument;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function index($viewName)
    {
        // Fetch the authenticated user's employee_id
        $userEmployeeId = Auth::user()->employee_id;

        // Fetch the corresponding employee record from the Employee table
        $employee = Employee::where('employee_id', $userEmployeeId)->first();

        // Ensure that the employee record exists before querying documents
        if ($employee) {
            // Use the employee's id (primary key) for filtering the forwarded and sent documents
            $employeeId = $employee->id;

            // Fetch forwarded documents for the current user
            $forwardedDocuments = ForwardedDocument::with(['forwardedByEmployee', 'document'])
                ->where('forwarded_to', $employeeId) // Use employee.id for filtering
                ->get();

            // Fetch sent documents for the current user
            $sentDocuments = SendDocument::with(['sender', 'document'])
                ->where('issued_to', $employeeId) // Use employee.id for filtering
                ->get();

            // Return the appropriate view with the documents
            return view($viewName, compact('forwardedDocuments', 'sentDocuments'));
        } else {
            // Handle case where the employee record doesn't exist for the user
            \Log::error('Employee record not found for user with employee_id: ' . $userEmployeeId);
            return view($viewName)->withErrors(['Employee record not found.']);
        }
    }

    public function getNotificationCount()
    {
        try {
            $user = Auth::user();  // Get the authenticated user object

            if (!$user) {
                return response()->json(['error' => 'Unauthenticated'], 401);
            }

            $userId = $user->user_id;  // Get the custom user identifier

            // Count notifications for the current user in both tables
            $forwardedCount = DB::table('forwarded_documents')
                                ->where('status', 'delivered')
                                ->where('forwarded_to', $userId)  
                                ->count();
            
            $sentCount = DB::table('send_document')
                            ->where('status', 'delivered')
                            ->where('issued_to', $userId)  
                            ->count();

            $notificationCount = $forwardedCount + $sentCount;

            return response()->json(['notificationCount' => $notificationCount]);
        } catch (\Exception $e) {
            \Log::error("Error in getNotificationCount: " . $e->getMessage());
            return response()->json(['error' => 'Server error'], 500);
        }
}   


}
