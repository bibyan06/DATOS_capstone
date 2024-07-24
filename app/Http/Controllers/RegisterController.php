<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\RedirectsUsers;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Custom validation rule for email domain
        $allowedDomains = ['bicol-u.edu.ph', 'gmail.com'];
        $request->validate([
            'employee_id' => 'required|string|max:20|unique:users',
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'age' => 'required|integer|min:18|max:120',
            'gender' => 'required|string|in:male,female',
            'phone_number' => 'required|string|max:20',
            'home_address' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users'),
                function ($attribute, $value, $fail) use ($allowedDomains) {
                    $domain = substr(strrchr($value, "@"), 1);
                    if (!in_array($domain, $allowedDomains)) {
                        $fail("The email must be from one of the following domains: " . implode(', ', $allowedDomains));
                    }
                },
            ],
            'username' => 'required|string|max:20|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:18',
                'confirmed',
                'regex:/[a-z]/',   // At least one lowercase letter
                'regex:/[A-Z]/',   // At least one uppercase letter
            ],
            'password_confirmation' => 'required|string|min:8',
        ]);

        try {
            DB::beginTransaction();

            // Determine user_type based on employee_id
            $user_type = 'employee'; // Default user_type
            if (strpos($request->employee_id, '01') === 0) {
                $user_type = 'admin';
            } elseif (strpos($request->employee_id, '02') === 0) {
                $user_type = 'office_staff';
            } elseif (strpos($request->employee_id, '03') === 0) {
                $user_type = 'dean';
            }

            // Create user
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
                // 'email_verified_at' => now(), // Set email_verified_at if you want it to be verified immediately
                'email_verified_at' => null,
                'user_type' => $user_type,
            ]);

            // Create employee record with the same position
            Employee::create([
                'employee_id' => $request->employee_id,
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'position' => $user_type, // Position is the same as user_type in this case
            ]);

            DB::commit();

            if ($user instanceof MustVerifyEmail) {
                $user->sendEmailVerificationNotification();
                return redirect()->route('verification.notice');
            }

            Auth::login($user);

            return redirect('/login')->with('message', 'Registration successful. Please check your email to verify your account.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('User registration failed: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to register user'], 500);
        }
    }
}
