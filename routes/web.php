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
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
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

// Route for role management
Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
Route::post('roles/assign/{id}', [RoleController::class, 'assign'])->name('roles.assign');
Route::post('roles/remove/{id}', [RoleController::class, 'remove'])->name('roles.remove');

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
    Route::get('/home/admin', [HomeController::class, 'adminHome'])->name('home.admin');
    Route::get('/home/office_staff', [HomeController::class, 'officeStaffHome'])->name('home.office_staff');
    Route::get('/home/dean', [HomeController::class, 'deanHome'])->name('home.dean');
});

// Office staff
Route::get('/home/office_staff', function () {
    return view('home.office_staff');
})->name('home.office_staff');

Route::get('/home/dean', function () {
    return view('home.dean');
})->name('home.dean');

// Route for office staff side 
Route::get('/office_staff/os_dashboard', [OfficeStaffController::class, 'dashboard'])->name('office_staff.os_dashboard');
Route::get('/office_staff/os_account', [OfficeStaffController::class, 'os_account'])->name('office_staff.os_account');
Route::get('/office_staff/os_upload_document', [OfficeStaffController::class, 'os_upload_document'])->name('office_staff.os_upload_document');
Route::get('/office_staff/os_notification', [OfficeStaffController::class, 'os_notification'])->name('office_staff.os_notification');
Route::get('/office_staff/documents/memorandum', [OfficeStaffController::class, 'memorandum'])->name('office_staff.documents.memorandum');
Route::get('/office_staff/documents/os_all_docs', [OfficeStaffController::class, 'os_all_docs'])->name('office_staff.documents.os_all_docs');
Route::get('/office_staff/documents/os_view_docs', [OfficeStaffController::class, 'os_view_docs'])->name('office_staff.documents.os_view_docs');
Route::get('/office_staff/documents/edit_docs', [OfficeStaffController::class, 'edit_docs'])->name('office_staff.documents.edit_docs');


// Route for admin side 
Route::get('/admin/admin_dashboard', [AdminController::class, 'dashboard'])->name('admin.admin_dashboard');
Route::get('/admin/admin_account', [AdminController::class, 'admin_account'])->name('admin.admin_account');
Route::get('/admin/admin_upload_document', [AdminController::class, 'admin_upload_document'])->name('admin.admin_upload_document');
Route::get('/admin/admin_view_document', [AdminController::class, 'view_document'])->name('admin.admin_view_document');
Route::get('/admin/college_dean', [AdminController::class, 'college_dean'])->name('admin.college_dean');
Route::get('/admin/office_staff', [AdminController::class, 'office_staff'])->name('admin.office_staff');

Route::get('/admin/documents/review_docs', [AdminController::class, 'review_docs'])->name('admin.documents.review_docs');
Route::get('/admin/documents/approved_docs', [AdminController::class, 'approved_docs'])->name('admin.documents.approved_docs');
Route::get('/admin/documents/declined_docs', [AdminController::class, 'declined_docs'])->name('admin.documents.declined_docs');
// Route::get('/admin/documents/edit_docs', [AdminController::class, 'edit_docs'])->name('admin.documents.edit_docs');
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

//Route for recent documents 
Route::get('/recent-documents', [DocumentController::class, 'showRecentDocuments'])->name('recent-documents');
Route::get('/home/office_staff', [OfficeStaffController::class, 'showHomePage'])->name('home.office_staff');


// Route for document upload
// Route to display the upload form
Route::get('/office_staff/os_upload_document', [DocumentController::class, 'create'])->name('office_staff.os_upload_document');

// Route to handle the form submission (uploading the document)
Route::post('/office_staff/os_upload_document', [DocumentController::class, 'store']);

Route::get('/admin/admin_upload_document', [DocumentController::class, 'create_admin'])->name('admin.admin_upload_document');

// Route to handle the form submission (uploading the document)
Route::post('/admin/admin_upload_document', [DocumentController::class, 'store']);



// Route to approve a document
Route::post('/admin/documents/approve_docs/{id}', [DocumentController::class, 'approve'])->name('admin.documents.approve');
Route::get('/admin/documents/approved_docs', [DocumentController::class, 'showApprovedDocuments'])->name('admin.documents.approved_docs');
// Route::get('/home/office_staff/documents-overview', [DocumentController::class, 'showOfficeStaffDocumentsOverview'])->name('home.office_staff.documents_overview');
route::get('/home/admin', [AdminController::class, 'adminHome'])->name('home.admin');

// Route to decline a document
Route::post('/admin/documents/declined_docs/{id}', [DocumentController::class, 'decline'])->name('admin.documents.decline');

// Route to serve documents
Route::get('/document/{filename}', function ($filename) {
    $path = storage_path('app/documents/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->name('document.serve');

//Route to view document
Route::get('/admin/documents/view_docs/{document_id}', [AdminController::class, 'view'])->name('admin.documents.view_docs');
Route::get('/office_staff/documents/os_view_docs/{document_id}', [OfficeStaffController::class, 'view'])->name('office_staff.documents.os_view_docs');


//Route to update document
Route::get('/admin/documents/edit_docs/{document_id}', [AdminController::class, 'edit'])->name('admin.documents.edit_docs');
Route::put('/admin/documents/update/{document_id}', [AdminController::class, 'update'])->name('admin.documents.update');

Route::get('/office_staff/documents/edit_docs/{document_id}', [OfficeStaffController::class, 'edit'])->name('office_staff.documents.edit_docs');
Route::put('/office_staff/documents/update/{document_id}', [OfficeStaffController::class, 'update'])->name('office_staff.documents.update');


//Route to count the total documents and employees
Route::get('/admin/admin_dashboard', [AdminController::class, 'adminDashboard'])->name('admin.admin_dashboard');
Route::get('/admin/admin_dashboard', [AdminController::class, 'category_count'])->name('admin.admin_dashboard');
Route::get('/admin/admin_dashboard', [AdminController::class, 'display_uploaded_docs'])->name('admin.admin_dashboard');
Route::get('/office_staff/os_dashboard', [OfficeStaffController::class, 'display_uploaded_docs'])->name('office_staff.os_dashboard');
Route::get('/office_staff/os_dashboard', [OfficeStaffController::class, 'category_count'])->name('office_staff.os_dashboard');


Route::get('/admin/office_staff', [AdminController::class, 'showOfficeStaff'])->name('admin.office_staff');


// Route for logout
Route::post('/logout', [AuthLoginController::class, 'logout'])->name('logout');

// Test database connection route
Route::get('/test-db', function () {
    try {
        \DB::connection()->getPdo();
        return 'Database connection is working!';
    } catch (\Exception $e) {
        return 'Could not connect to the database. Please check your configuration. Error: ' . $e->getMessage();
    }
});
