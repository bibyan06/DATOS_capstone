<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers; // This is the correct import

class AuthLoginController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
    {
        // $this->middleware('verify.email.and.move.to.employee');
        
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

    public function loginverified(Request $request)
    {
        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            $user = auth()->user();

            // Check if email is verified
            if ($user->hasVerifiedEmail()) {
                // Update email_verified_at timestamp
                $user->email_verified_at = now();
                $user->save();

                // Move user data to employees table
                $employee = new Employee();
                $employee->name = $user->name;
                $employee->email = $user->email;
                // Add other fields as needed
                $employee->save();
            }

            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
}
