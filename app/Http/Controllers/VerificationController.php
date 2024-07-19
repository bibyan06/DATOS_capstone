<?php

namespace App\Http\Controllers;

use App\Models\TemporaryUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class VerificationController extends Controller
{
//     public function verifyEmail(Request $request, $id, $token)
//     {
// //         // Find the temporary user with the matching ID and verification token
// //         $tempUser = TemporaryUser::where('id', $id)
// //             ->where('verification_token', $token)
// //             ->first();

// //         if (!$tempUser) {
// //             return redirect('/login')->withErrors(['message' => 'Invalid or expired verification link.']);
// //         }

// //         // Move the data to the users table
// //         // Move data from temporary_users to users
// //         $user = new User();
// //         $user->employee_id = $tempUser->employee_id;
// //         $user->last_name = $tempUser->last_name;
// //         $user->first_name = $tempUser->first_name;
// //         $user->middle_name = $tempUser->middle_name;
// //         $user->age = $tempUser->age;
// //         $user->gender = $tempUser->gender;
// //         $user->phone_number = $tempUser->phone_number;
// //         $user->home_address = $tempUser->home_address;
// //         $user->email = $tempUser->email;
// //         $user->username = $tempUser->username;
// //         $user->password = $tempUser->password; // Assuming password is already hashed
// //         $user->save();

// //         // Delete the temporary user record
// //         $tempUser->delete();

// //         Log::info('Temporary user deleted.', ['tempUser' => $tempUser]);

// //         return redirect('/login')->with('message', 'Your email has been verified. You can now log in.');
//     }
    public function verifyEmail(Request $request)
    {
        // Verify the email token and user ID
        $user = User::find($request->route('id'));
        if (!$user || !$user->hasVerifiedEmail()) {
            return redirect()->route('verification.notice');
        }

        // Update the email_verified_at column
        $user->email_verified_at = now();
        $user->save();

        // Redirect to a success page or display a success message
        return redirect()->route('verification.success');
    }
    
    public function resendVerificationEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
