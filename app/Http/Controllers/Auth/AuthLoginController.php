<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
            $this->updateLoginSession(Auth::user()->employee_id);
            return $this->sendLoginResponse($request);
        }

        // Authentication failed
        return redirect()->back()->with('error', 'Invalid employee ID or password.');
    }

    protected function updateLoginSession($employeeId)
    {
        $existingSession = DB::table('login_session')
            ->where('employee_id', $employeeId)
            ->first();

        if ($existingSession) {
            // Update existing session
            DB::table('login_session')
                ->where('employee_id', $employeeId)
                ->update([
                    'login_date' => Carbon::now()->format('Y-m-d H:i:s'),
                    'status' => 'active',
                ]);
        } else {
            // Create new session
            DB::table('login_session')->insert([
                'employee_id' => $employeeId,
                'login_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'status' => 'active',
            ]);
        }
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

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        $user = auth()->user();
        $employeeId = $user->employee_id;

        if (Str::startsWith($employeeId, '01')) {
            return redirect()->route('home.admin');
        } elseif (Str::startsWith($employeeId, '02')) {
            return redirect()->route('home.office_staff');
        } elseif (Str::startsWith($employeeId, '03')) {
            return redirect()->route('home.dean');
        }

        return redirect()->intended($this->redirectPath()); // Default fallback
    }

    public function logout(Request $request)
    {
        // Get the current user ID
        $user = Auth::user();
        $employeeId = $user->employee_id;

        // Log the values for debugging
        \Log::info("Attempting to update login_session for employee_id: $employeeId");
        \Log::info("Logout Date: " . Carbon::now()->format('Y-m-d H:i:s'));

        // Update the login_session table
        DB::table('login_session')
            ->where('employee_id', $employeeId)
            ->where('status', 'active')
            ->update([
                'logout_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'status' => 'inactive'
            ]);

        // Log out the user
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
