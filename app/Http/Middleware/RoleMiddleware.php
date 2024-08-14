<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        $user = Auth::user();
        if (!$user || !$this->hasRole($user, $role)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }

    protected function hasRole($user, $role)
    {
        return Str::startsWith($user->employee_id, $role);
    }
}

