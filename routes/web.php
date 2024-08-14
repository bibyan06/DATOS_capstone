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
use App\Http\Controllers\DocumentController;
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


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('home.admin');
    Route::get('/home/office_staff', [HomeController::class, 'officeStaffHome'])->name('home.office_staff');
    Route::get('/home/dean', [HomeController::class, 'deanHome'])->name('home.dean');
});
//Office staff
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
Route::get('/office_staff/os_notification', [OfficeStaffController::class, 'os_notification'])->name('office_staff.os_notification');
Route::get('/office_staff/documents/memorandum', [OfficeStaffController::class, 'memorandum'])->name('office_staff.documents.memorandum');


// Route for admin side 
Route::get('/admin/admin_dashboard', [AdminController::class, 'dashboard'])->name('admin.admin_dashboard');
Route::get('/admin/admin_account', [AdminController::class, 'admin_account'])->name('admin.admin_account');
Route::get('/admin/admin_upload_document', [AdminController::class, 'upload_document'])->name('admin.admin_upload_document');
Route::get('/admin/admin_view_document', [AdminController::class, 'view_document'])->name('admin.admin_view_document');
Route::get('/admin/college_dean', [AdminController::class, 'college_dean'])->name('admin.college_dean');
Route::get('/admin/office_staff', [AdminController::class, 'office_staff'])->name('admin.office_staff');

Route::get('/admin/documents/review_docs', [AdminController::class, 'review_docs'])->name('admin.documents.review_docs');
Route::get('/admin/documents/approved_docs', [AdminController::class, 'approved_docs'])->name('admin.documents.approved_docs');
Route::get('/admin/documents/edit_docs', [AdminController::class, 'edit_docs'])->name('admin.documents.edit_docs');
Route::get('/admin/documents/memorandum', [AdminController::class, 'memorandum'])->name('admin.documents.memorandum');
Route::get('/admin/documents/request_docs', [AdminController::class, 'request_docs'])->name('admin.documents.request_docs');
Route::get('/admin/documents/sent_docs', [AdminController::class, 'sent_docs'])->name('admin.documents.sent_docs');
Route::get('/admin/documents/view_docs', [AdminController::class, 'view_docs'])->name('admin.documents.view_docs');
Route::get('/admin/documents/all_docs', [AdminController::class, 'all_docs'])->name('admin.documents.all_docs');



// Route for dean side 
Route::get('/dean/dean_dashboard', [DeanController::class, 'dashboard'])->name('dean.dean_dashboard');
Route::get('/dean/dean_account', [DeanController::class, 'dean_account'])->name('dean.dean_account');
Route::get('/dean/dean_upload_document', [DeanController::class, 'upload_document'])->name('dean.dean_upload_document');

// Route for Profile 
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

//Route for admin approved documents 
// Route::get('/admin/documents/approved_docs', [AdminController::class, 'showApprovedDocs'])->name('admin.documents.approved_docs');
// Route::post('/admin/documents/{id}/review', [AdminController::class, 'reviewDocument'])->name('admin.review_document');


Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('documents/review', [DocumentController::class, 'showReviewDocs'])->name('documents.review_docs');
    Route::get('documents/approved', [DocumentController::class, 'showApprovedDocs'])->name('documents.approved_docs');
    Route::post('documents/review/{id}', [DocumentController::class, 'reviewDocument'])->name('documents.review');
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

//Route for Uploading documents 
// Route::post('/upload-document', [OfficeStaffController::class, 'uploadDocument'])->name('office_staff.upload_document');
Route::post('/upload-document', [DocumentController::class, 'uploadDocument'])->name('office_staff.upload_document');

// For displaying the upload form
Route::get('/upload-document', [DocumentController::class, 'showUploadForm'])->name('admin.documents.showUploadForm');

// For handling the form submission
Route::post('/upload-document', [DocumentController::class, 'store'])->name('admin.documents.store');

// Test database connection route
Route::get('/test-db', function () {
    try {
        \DB::connection()->getPdo();
        return 'Database connection is working!';
    } catch (\Exception $e) {
        return 'Could not connect to the database. Please check your configuration. Error: ' . $e->getMessage();
    }
});
