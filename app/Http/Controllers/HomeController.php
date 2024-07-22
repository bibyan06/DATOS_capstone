<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        if (Auth::user()->user_type == 'admin'){
            return view('admin.home');
        }
        elseif(Auth::user()->user_type == 'office_staff'){
            return view ('office_staff.home');
        }elseif (Auth::user()->user_type == 'dean'){
            return view ('dean.home');
        }




        // $user = Auth::user(); // Get the authenticated user

        // if ($user) {
        //     // Fetch the employee record based on the user's employee_id
        //     $employee = Employee::where('employee_id', $user->employee_id)->first();

        //     if ($employee) {
        //         $position = $employee->position;

        //         if ($position == 'admin') {
        //             return view('admin.home');
        //         } elseif ($position == 'office_staff') {
        //             return view('office_staff.home');
        //         } elseif ($position == 'dean') {
        //             return view('dean.home');
        //         }
        //     }
        // }

        // Handle cases where the employee relationship doesn't exist
        return redirect()->route('login'); // Or any default view
    }
}
