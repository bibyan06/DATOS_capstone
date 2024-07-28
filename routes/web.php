<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\AuthLoginController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\OfficeStaffController; 
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeanController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckEmployeeId;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\User;

// Redirect the root URL to the login page
Route::redirect('/', 'login');

// Static pages for terms of service and privacy policy
Route::view('/terms-of-service', 'terms.show')->name('terms.show');
Route::view('/privacy-policy', 'policy.show')->name('policy.show');

// Registration and login routes
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/login', [AuthLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthLoginController::class, 'login'])->middleware('throttle:3,2');
Route::post('login-verified', [AuthLoginController::class, 'loginverified'])->name('login.verified');

// Home route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Email verification routes
Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/verification-notification', [EmailVerificationController::class, 'resend'])->name('verification.send');

// Custom verification confirmed route
Route::get('/email/confirmed', [EmailVerificationController::class, 'verified'])->name('email.confirmed');

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

// Route for office_staff side 
Route::get('/office_staff/os_dashboard', [OfficeStaffController::class, 'dashboard'])->name('office_staff.os_dashboard');
Route::get('/office_staff/os_account', [OfficeStaffController::class, 'os_account'])->name('office_staff.os_account');
Route::get('/office_staff/os_upload_document', [OfficeStaffController::class, 'upload_document'])->name('office_staff.os_upload_document');

// Route for admin side 
Route::get('/admin/admin_dashboard', [AdminController::class, 'dashboard'])->name('admin.admin_dashboard');
Route::get('/admin/admin_account', [AdminController::class, 'admin_account'])->name('admin.admin_account');
Route::get('/admin/admin_upload_document', [AdminController::class, 'upload_document'])->name('admin.admin_upload_document');
Route::get('/admin/admin_view_document', [AdminController::class, 'view_document'])->name('admin.admin_view_document');


// Route for dean side 
Route::get('/dean/dean_dashboard', [DeanController::class, 'dashboard'])->name('dean.dean_dashboard');
Route::get('/dean/dean_account', [DeanController::class, 'dean_account'])->name('dean.dean_account');
Route::get('/dean/dean_upload_document', [DeanController::class, 'upload_document'])->name('dean.dean_upload_document');

// Route for Profile 
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

// Route for Logout
Route::post('/logout', [AuthLoginController::class, 'logout'])->name('logout');

//Route for access control
Route::middleware(['auth', 'check_role:01'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
});

Route::middleware(['auth', 'check_role:02'])->group(function () {
    Route::get('/office-staff', [OfficeStaffController::class, 'index']);
});

Route::middleware(['auth', 'check_role:03'])->group(function () {
    Route::get('/dean', [DeanController::class, 'index']);
});

// Test database connection route
Route::get('/test-db', function () {
    try {
        \DB::connection()->getPdo();
        return 'Database connection is working!';
    } catch (\Exception $e) {
        return 'Could not connect to the database. Please check your configuration. Error: ' . $e->getMessage();
    }
});
