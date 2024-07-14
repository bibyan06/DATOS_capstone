<?php

namespace App\Http\Controllers;

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

        // Attempt to authenticate the user
        if (Auth::attempt(['employee_id' => $request->employee_id, 'password' => $request->password])) {
            // Authentication was successful
            return response()->json(['message' => 'Login successful'], 200);
        }

        // Authentication failed
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}
