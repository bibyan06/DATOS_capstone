<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function admin_account()
    {
        $authUser = Auth::user();
        $user = User::where('employee_id', $authUser->employee_id)->first();
        
        if (!$user) {
            return redirect()->route('home')->with('error', 'User not found.');
        }
        
        return view('office_staff.admin_account', compact('user'));
    }


    public function os_account()
    {
        $authUser = Auth::user();
        $user = User::where('employee_id', $authUser->employee_id)->first();
        
        if (!$user) {
            return redirect()->route('home')->with('error', 'User not found.');
        }
        
        return view('office_staff.os_account', compact('user'));
    }

    public function dean_account()
    {
        $authUser = Auth::user();
        $user = User::where('employee_id', $authUser->employee_id)->first();
        
        if (!$user) {
            return redirect()->route('home')->with('error', 'User not found.');
        }
        
        return view('office_staff.dean_account', compact('user'));
    }
}


