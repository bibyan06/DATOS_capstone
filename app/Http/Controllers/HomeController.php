<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user
        $employee = $user->employee; // Access the related employee model

        if ($employee) {
            $position = $employee->position;

            if ($position == 'admin') {
                return view('admin');
            } elseif ($position == 'office_staff') {
                return view('office_staff');
            } elseif ($position == 'dean') {
                return view('dean');
            }
        }

        // Handle cases where the employee relationship doesn't exist
        return redirect()->route('login'); // Or any default view
    }
}
