<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Assuming you have a User model
use Illuminate\Support\Facades\Hash; // For password hashing
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validation rules
        $request->validate([
            'employee_id' => 'required|string|max:20|unique:users',
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'age' => 'required|integer|min:18|max:120',
            'gender' => 'required|string|in:male,female',
            'phone_number' => 'required|string|max:20',
            'home_address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:20|unique:users',
            'password' => 'required|string|min:12|confirmed',
            'password_confirmation' => 'required|string|min:12',
        ]);

        // Create a new user
        try {
            $user = User::create([
                'employee_id' => $request->employee_id,
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'age' => $request->age,
                'gender' => $request->gender,
                'phone_number' => $request->phone_number,
                'home_address' => $request->home_address,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);

            if ($user) {
                return response()->json(['message' => 'User registered successfully'], 201);
            } else {
                return response()->json(['message' => 'Failed to register user'], 500);
            }
        } catch (\Exception $e) {
            Log::error('User registration failed: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to register user'], 500);
        }
    }
}