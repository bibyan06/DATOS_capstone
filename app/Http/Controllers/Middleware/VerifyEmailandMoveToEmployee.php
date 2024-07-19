<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;

class VerifyEmailAndMoveToEmployee
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && !Auth::user()->email_verified_at) {
            $user = Auth::user();
            $user->email_verified_at = now();
            $user->save();

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

            // Remove the user from the users table
            $user->delete();
        }

        return $next($request);
    }
}