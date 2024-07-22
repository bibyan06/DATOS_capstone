<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\AuthLoginController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\OfficeStaffController; 

// Redirect the root URL to the login page
Route::redirect('/', 'login');

// Static pages for terms of service and privacy policy
Route::view('/terms-of-service', 'terms.show')->name('terms.show');
Route::view('/privacy-policy', 'policy.show')->name('policy.show');

// Registration and login routes
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/login', [AuthLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthLoginController::class, 'login']);
Route::post('login-verified', [AuthLoginController::class, 'loginverified'])->name('login.verified');

// Home route
Route::get('/home', [HomeController::class, 'index']);

// Email verification routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->name('verification.notice');

Route::get('/email/confirmed', function () {
    return view('email-confirmed');
});

Route::get('/email/verified', [VerificationController::class, 'verified'])->name('verification.verified');

Route::get('/verify-email/confirmed', [EmailVerificationController::class, 'confirmEmail'])->name('email.confirmed');

Route::get('/email/verify/{token}', [RegisterController::class, 'verifyEmail'])->name('verify.email');

Route::post('/email/verification-notification', [EmailVerificationController::class, 'resend'])->name('verification.send');

Route::get('/redirects', [HomeController::class, 'index']);

// Test database connection route
Route::get('/test-db', function () {
    try {
        \DB::connection()->getPdo();
        return 'Database connection is working!';
    } catch (\Exception $e) {
        return 'Could not connect to the database. Please check your configuration. Error: ' . $e->getMessage();
    }
});

// Grouped routes with authentication and verification middleware
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Routes for designated landing pages
Route::get('/home/admin', function () {
    return view('home.admin');
})->name('home.admin');

Route::get('/home/office_staff', function () {
    return view('home.office_staff');
})->name('home.office_staff');

Route::get('/home/dean', function () {
    return view('home.dean');
})->name('home.dean');


//Route for office_staff side 
// Route::get('/office_staff/os_dashboard', function () {
//     return view('office_staff.os_dashboard');
// })->name('office_staff.os_dashboard');

Route::get('/office_staff/os_dashboard', [OfficeStaffController::class, 'dashboard'])->name('office_staff.os_dashboard');
Route::get('/office_staff/account', [OfficeStaffController::class, 'account'])->name('office_staff.account');


//Route for Files 


// Fallback home route
Route::get('/home', function () {
    return view('home');
})->name('home');
