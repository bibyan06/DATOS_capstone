<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $rolePrefix)
    {
        $user = Auth::user();

        if ($user && strpos($user->employee_id, $rolePrefix) === 0) {
            return $next($request);
        }

        return redirect('/')->with('error', 'You do not have permission to access this page.');
    }
}