<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();
        
        if ($user) {
            // Fetch the employee record based on the user's employee_id
            $employee = Employee::where('employee_id', $user->employee_id)->first();

            if ($employee) {
                $position = $employee->position;

                if ($position == 'admin') {
                    return view('home.admin');
                } elseif ($position == 'office_staff') {
                    return view('home.office_staff');
                } elseif ($position == 'dean') {
                    return view('home.dean');
                }
            }
        }

        // Handle cases where the employee record doesn't exist or user is not authenticated
        return redirect()->route('login'); // Or any default view
    }

    public function adminHome()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        return view('home.admin', compact('user'));
    }
}
