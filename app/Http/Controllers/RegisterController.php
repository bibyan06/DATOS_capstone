<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Assuming you have a User model
use Illuminate\Support\Facades\Hash; // For password hashing
use Illuminate\Support\Facades\Log;
use App\Models\Employee; 

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
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);

        // Create a new user
        try {
            Log::info('Creating new user...');
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
                // Determine role based on employee_id prefix
                $employee_id = $request->employee_id;
                $role = 'user'; // Default role for other cases
                $position = 'employee'; // Default position for other cases


                if (strpos($employee_id, '01') === 0) {
                    $role = 'admin';
                } elseif (strpos($employee_id, '02') === 0) {
                    $role = 'office_staff';
                } elseif (strpos($employee_id, '03') === 0) {
                    $role = 'dean';
                }

                // Assign role to the user
                $user->assignRole($role);

                 // Log success message
                Log::info('User registered successfully: ' . $user->id);

                // Update the employee table
                $employee = new Employee();
                $employee->user_id = $user->id;
                $employee->employee_id = $user->employee_id;
                $employee->last_name = $user->last_name;
                $employee->first_name = $user->first_name;
                $employee->position = $position;
                $employee->save();

                // Flash success message to session
                $request->session()->flash('status', 'Registration successful! Please log in.');

                // Redirect to login page
                return redirect()->route('login');
            } else {
                // Log error if user creation fails
                Log::error('Failed to create user');
                return response()->json(['message' => 'Failed to register user'], 500);
            }
        } catch (\Exception $e) {
            // Log exception if registration fails
            Log::error('User registration failed: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to register user'], 500);
        }
    }
}