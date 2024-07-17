<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;

class VerificationController extends Controller
{
    public function verify(Request $request, $id, $hash)
    {
        $user = \App\Models\User::find($id);

        if (!$user) {
            abort(404, 'User not found.');
        }

        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            abort(404, 'Invalid verification link.');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('login')->with('status', 'Email already verified.');
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        // Move data from temporary_users to users table
        \App\Models\User::create([
            'name' => $user->name,
            'email' => $user->email,
            // Add other fields as needed
        ]);

        return redirect()->route('login')->with('status', 'Email successfully verified. You can now login.');
    }
}
