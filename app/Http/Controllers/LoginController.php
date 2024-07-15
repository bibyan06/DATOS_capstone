<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'employee_id' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('employee_id', 'password');

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Authentication was successful
            return redirect()->intended('dashboard');
        }

        // Authentication failed
        return redirect()->back()->with('error', 'Invalid employee ID or password.');
    }
}
