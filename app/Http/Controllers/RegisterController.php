<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\TemporaryUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Notifications\VerifyEmail;
use Illuminate\Auth\Events\Registered;



class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validation rules
        $request->validate([
            'employee_id' => 'required|string|max:20|unique:temporary_users',
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'age' => 'required|integer|min:18|max:120',
            'gender' => 'required|string|in:male,female',
            'phone_number' => 'required|string|max:20',
            'home_address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:temporary_users',
            'username' => 'required|string|max:20|unique:temporary_users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);

        try {
            $verification_token = Str::random(64);

            $tempUser = TemporaryUser::create([
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
                'verification_token' => $verification_token,
            ]);

            // Send email verification notification
            $tempUser->notify(new VerifyEmail($tempUser->verification_token));

            return redirect()->route('verification.notice')
                ->with('message', 'A verification email has been sent. Please check your email to verify your account.');
        } catch (\Exception $e) {
            // Log exception if registration fails
            Log::error('User registration failed: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to register user'], 500);
        }
    }

    public function verifyEmail($token)
    {
        $temporaryUser = TemporaryUser::where('verification_token', $token)->first();

        if ($temporaryUser) {
            DB::beginTransaction();

            try {
                $user = User::create([
                    'employee_id' => $temporaryUser->employee_id,
                    'last_name' => $temporaryUser->last_name,
                    'first_name' => $temporaryUser->first_name,
                    'middle_name' => $temporaryUser->middle_name,
                    'age' => $temporaryUser->age,
                    'gender' => $temporaryUser->gender,
                    'phone_number' => $temporaryUser->phone_number,
                    'home_address' => $temporaryUser->home_address,
                    'email' => $temporaryUser->email,
                    'username' => $temporaryUser->username,
                    'password' => $temporaryUser->password,
                ]);

                $employee_id = $user->employee_id;
                $position = 'employee';

                if (strpos($employee_id, '01') === 0) {
                    $position = 'admin';
                } elseif (strpos($employee_id, '02') === 0) {
                    $position = 'office_staff';
                } elseif (strpos($employee_id, '03') === 0) {
                    $position = 'dean';
                }

                Employee::create([
                    'employee_id' => $user->employee_id,
                    'last_name' => $user->last_name,
                    'first_name' => $user->first_name,
                    'position' => $position,
                ]);

                $temporaryUser->delete();
                DB::commit();

                event(new Registered($user));

                return redirect('/login')->with('message', 'Your email has been verified. You can now log in.');
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Email verification failed: ' . $e->getMessage());
                return response()->json(['message' => 'Email verification failed'], 500);
            }
        } else {
            return redirect('/register')->with('error', 'Invalid verification token');
        }
    }
}
