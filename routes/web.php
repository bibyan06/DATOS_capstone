<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\AuthLoginController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\EmailVerificationController;

// Redirect the root URL to the login page
Route::redirect('/', 'login');

// Static pages for terms of service and privacy policy
Route::view('/terms-of-service', 'terms.show')->name('terms.show');
Route::view('/privacy-policy', 'policy.show')->name('policy.show');

// Registration and login routes
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/login', [AuthLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthLoginController::class, 'login']);
// Route::post('/login', 'Auth\AuthLoginController@login')->middleware('verify.email.and.move.to.employee');
Route::post('login-verified', [AuthLoginController::class, 'loginverified'])->name('login.verified');

// Email verification routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->name('verification.notice');

Route::get('/email/confirmed', function () {
    return view('email-confirmed');
});

Route::get('/email/verified', 'VerificationController@verified')->name('verification.verified');

Route::get('/verify-email/confirmed', [EmailVerificationController::class, 'confirmEmail'])->name('email.confirmed');
// Route::group(['middleware' => ['verify.email.and.move.to.employee']], function () {
//     Route::get('/login', 'Auth\LoginController@login');
// });

Route::get('/email/verify/{token}', [RegisterController::class, 'verifyEmail'])->name('verify.email');
// Route::get('/email/verify-confirmed/{token}', [RegisterController::class, 'verifyEmailConfirmed'])->name('verify.email.confirmed');

Route::post('/email/verification-notification', [EmailVerificationController::class, 'resend'])->name('verification.send');


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
