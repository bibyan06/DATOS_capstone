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
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\SentDocumentController;
use App\Http\Controllers\NotificationController;
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
// Route::get('/home/admin', function () {
//     return view('home.admin');
// })->name('home.admin');

Route::middleware(['auth'])->group(function () {
    Route::get('/home/admin', [HomeController::class, 'adminHome'])->name('home.admin');
    Route::get('/home/office_staff', [HomeController::class, 'officeStaffHome'])->name('home.office_staff');
    Route::get('/home/dean', [HomeController::class, 'deanHome'])->name('home.dean');
});



// Routes for office staff side
Route::prefix('office_staff')->name('office_staff.')->middleware('auth')->group(function () {
    Route::get('/profile', [OfficeStaffController::class, 'showProfile'])->name('os_account');
    Route::get('/os_dashboard', [OfficeStaffController::class, 'dashboard'])->name('os_dashboard');
    Route::get('/os_account', [OfficeStaffController::class, 'os_account'])->name('os_account');
    Route::get('/os_upload_document', [OfficeStaffController::class, 'os_upload_document'])->name('os_upload_document');
    Route::get('/os_notification', [OfficeStaffController::class, 'os_notification'])->name('os_notification');

    // Document routes for office staff
    Route::prefix('documents')->name('documents.')->group(function () {
        Route::get('/memorandum', [OfficeStaffController::class, 'memorandum'])->name('memorandum');
        Route::get('/os_view_docs', [OfficeStaffController::class, 'os_view_docs'])->name('os_view_docs');
        Route::get('/edit_docs', [OfficeStaffController::class, 'edit_docs'])->name('edit_docs');
    });
});

// Routes for admin side
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/profile', [AdminController::class, 'showProfile'])->name('admin_account');
    Route::get('/admin_dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
    Route::get('/admin_account', [AdminController::class, 'admin_account'])->name('admin_account');
    Route::get('/admin_upload_document', [AdminController::class, 'admin_upload_document'])->name('admin_upload_document');
    Route::get('/admin_view_document', [AdminController::class, 'view_document'])->name('admin_view_document');
    Route::get('/college_dean', [AdminController::class, 'college_dean'])->name('college_dean');
    Route::get('/office_staff', [AdminController::class, 'office_staff'])->name('office_staff');
    Route::get('/admin_notification', [AdminController::class, 'notification'])->name('admin_notification');

    // Document routes for admin
    Route::prefix('documents')->name('documents.')->group(function () {
        Route::get('/review_docs', [AdminController::class, 'review_docs'])->name('review_docs');
        Route::get('/approved_docs', [AdminController::class, 'approved_docs'])->name('approved_docs');
        Route::get('/declined_docs', [AdminController::class, 'declined_docs'])->name('declined_docs');
        Route::get('/memorandum', [AdminController::class, 'memorandum'])->name('memorandum');
        Route::get('/admin_order', [AdminController::class, 'admin_order'])->name('admin_order');
        Route::get('/mrsp', [AdminController::class, 'mrsp'])->name('mrsp');
        Route::get('/cms', [AdminController::class, 'cms'])->name('cms');
        Route::get('/audited_dv', [AdminController::class, 'audited_dv'])->name('audited_dv');
        Route::get('/request_docs', [AdminController::class, 'request_docs'])->name('request_docs');
        Route::get('/view_docs', [AdminController::class, 'view_docs'])->name('view_docs');
        Route::get('/all_docs', [AdminController::class, 'all_docs'])->name('all_docs');
    });
});

// Route for layout
Route::get('/layouts/admin_layout', [AdminController::class, 'showPendings'])->name('layouts.admin_layouts');


// Routes for dean side
Route::prefix('dean')->name('dean.')->middleware('auth')->group(function () {
    Route::get('/dean_dashboard', [DeanController::class, 'dashboard'])->name('dean_dashboard');
    Route::get('/dean_account', [DeanController::class, 'dean_account'])->name('dean_account');
    Route::get('/dean_upload_document', [DeanController::class, 'upload_document'])->name('dean_upload_document');
    Route::get('/dean_account', [DeanController::class, 'showDeanProfile'])->name('dean_account');

    // Document routes for dean
    Route::prefix('documents')->name('documents.')->group(function () {
        Route::get('/dean_edit_docs', [DeanController::class, 'edit_docs'])->name('dean_edit_docs');
        Route::get('/dean_notification', [DeanController::class, 'notification'])->name('dean_notification');
        Route::get('/dean_request', [DeanController::class, 'request'])->name('dean_request');
        Route::get('/dean_search', [DeanController::class, 'search'])->name('dean_search');
        Route::get('/dean_view_docs', [DeanController::class, 'view_docs'])->name('dean_view_docs');
        Route::get('/memorandum', [DeanController::class, 'memorandum'])->name('memorandum');
        Route::get('/admin_order', [DeanController::class, 'admin_order'])->name('admin_order');
        Route::get('/mrsp', [DeanController::class, 'mrsp'])->name('mrsp');
        Route::get('/cms', [DeanController::class, 'cms'])->name('cms');
        Route::get('/audited_dv', [DeanController::class, 'audited_dv'])->name('audited_dv');
    });

    // Route for adding dean account
    Route::post('/add-dean-account', [DeanController::class, 'storeDeanAccount'])->name('store');
});

// Routes related to college and dean management by admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/college_dean', [DeanController::class, 'deanList'])->name('college_dean');
    Route::get('/college_dean', [CollegeController::class, 'showCollegeDeanForm'])->name('college_dean');
    Route::post('/add-college', [CollegeController::class, 'store'])->name('add-college');
});


// Route for Profile 
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

// Route to update profile 
Route::post('/update-profile', [ProfileController::class, 'updateDeanProfile']);
Route::post('/update-profile', [ProfileController::class, 'updateAdminProfile'])->name('profile.update');
Route::post('/update-profile', [ProfileController::class, 'updateOfficeStaffProfile'])->name('profile.update');


//Route for recent documents 
Route::get('/recent-documents', [DocumentController::class, 'showRecentDocuments'])->name('recent-documents');
Route::get('/home/office_staff', [OfficeStaffController::class, 'showHomePage'])->name('home.office_staff');
Route::get('/home/dean', [DeanController::class, 'showHomePage'])->name('home.dean');


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
Route::get('/office_staff/documents/os_search', [OfficeStaffController::class, 'showApprovedDocuments'])->name('office_staff.documents.os_search');
Route::get('/dean/documents/dean_search', [DeanController::class, 'showApprovedDocuments'])->name('dean.documents.dean_search');

// Route::get('/home/office_staff/documents-overview', [DocumentController::class, 'showOfficeStaffDocumentsOverview'])->name('home.office_staff.documents_overview');
route::get('/home/admin', [AdminController::class, 'adminHome'])->name('home.admin');

// Route to decline a document
Route::post('/admin/documents/declined_docs/{id}', [DocumentController::class, 'decline'])->name('admin.documents.decline');

// Route to serve documents
Route::get('/documents/{filename}', function ($filename) {
    $path = public_path('storage/documents/' . $filename);

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

//Route for Filtering documents 
Route::get('/office_staff/documents/os_search', [OfficeStaffController::class, 'showAllDocs'])->name('office_staff.documents.os_search');
Route::get('/home/dean', [DeanController::class, 'showDeanHome'])->name('home.dean');

//Route for Digitized Documents 
Route::get('/admin/documents/memorandum', [AdminController::class, 'showMemorandums'])->name('admin.documents.memorandum');
// Route::get('/admin/documents/admin_order', [AdminController::class, 'showAdminOrders'])->name('admin.documents.admin_order');
Route::get('/admin/documents/mrsp', [AdminController::class, 'showMrsp'])->name('admin.documents.mrsp');
Route::get('/admin/documents/cms', [AdminController::class, 'showCms'])->name('admin.documents.cms');
Route::get('/admin/documents/audited_dv', [AdminController::class, 'showAuditedDV'])->name('admin.documents.audited_dv');

Route::get('/office_staff/documents/memorandum', [OfficeStaffController::class, 'showMemorandums'])->name('office_staff.documents.memorandum');
Route::get('/office_staff/documents/mrsp', [OfficeStaffController::class, 'showMrsp'])->name('office_staff.documents.mrsp');
Route::get('/office_staff/documents/cms', [OfficeStaffController::class, 'showCms'])->name('office_staff.documents.cms');
Route::get('/office_staff/documents/audtied_dv', [OfficeStaffController::class, 'showAuditedDV'])->name('office_staff.documents.audited_dv');

//Route for Search function
Route::get('/office_staff/documents/os_search', [OfficeStaffController::class, 'searchDocuments'])->name('office_staff.documents.os_search');
Route::get('/admin/admin_search', [AdminController::class, 'searchDocuments'])->name('admin.admin_search');
Route::get('/search-documents', [DocumentController::class, 'searchDocuments'])->name('search.documents');

//Route for Forward function

Route::get('/employees/exclude-current', [AdminController::class, 'getEmployee']);
Route::post('/documents/forward', [AdminController::class, 'forwardDocument']);
Route::get('/employees/exclude-current', [OfficeStaffController::class, 'getEmployee']);
Route::post('/documents/forward', [OfficeStaffController::class, 'forwardDocument']);
Route::post('/documents/forward', [DocumentController::class, 'forwardDocument'])->name('documents.forward');

//Route for Sent/Forwarded Documents
Route::middleware(['auth'])->group(function () {
    
    // Route for sent and forwarded documents for admins
    Route::get('/admin/documents/sent_docs', [SentDocumentController::class, 'index'])
        ->name('admin.documents.sent_docs')
        ->defaults('viewName', 'admin.documents.sent_docs');

    // Route for sent and forwarded documents for office staff
    Route::get('/office_staff/documents/sent_docs', [SentDocumentController::class, 'index'])
        ->name('office_staff.documents.sent_docs')
        ->defaults('viewName', 'office_staff.documents.sent_docs');
    
});

//Route for Notification  
// Admin Notification Route
Route::get('/admin/admin_notifications', [NotificationController::class, 'index'])
    ->name('admin.admin_notification')
    ->middleware('auth')
    ->defaults('viewName', 'admin.admin_notification');

// Office Staff Notification Route
Route::get('/office_staff/os_notification', [NotificationController::class, 'index'])
    ->name('office_staff.os_notification')
    ->middleware('auth')
    ->defaults('viewName', 'office_staff.os_notification');

// Dean Notification Route
Route::get('/dean/documents/dean_notification', [NotificationController::class, 'index'])
    ->name('dean.documents.dean_notification')
    ->middleware('auth')
    ->defaults('viewName', 'dean.documents.dean_notification');

Route::get('/get-document-details/{id}', [DocumentController::class, 'getDocumentDetails']);
Route::patch('/forwarded-documents/{forwardedDocumentId}/update-status', [DocumentController::class, 'updateStatus'])->name('forwardedDocuments.updateStatus');

Route::get('/documents/{id}', [DocumentController::class, 'show'])->name('documents.show');

Route::get('/notification/count', [NotificationController::class, 'getNotificationCount'])->name('notification.count');

// Route for Archive and Trash 
Route::get('/admin/archive_notif', [AdminController::class, 'archiveNotif'])->name('admin.archive_notif');
Route::get('/admin/archive_docs', [AdminController::class, 'archiveDocs'])->name('admin.archive_docs');
Route::get('/admin/trash', [AdminController::class, 'trash'])->name('admin.trash');
Route::get('/office_staff/os_archive', [OfficeStaffController::class, 'archiveDocs'])->name('office_staff.os_archive');
Route::get('/office_staff/os_trash', [OfficeStaffController::class, 'trash'])->name('office_staff.os_trash');
Route::get('/dean/dean_archive', [DeanController::class, 'archiveDocs'])->name('dean.dean_archive');
Route::get('/dean/dean_trash', [DeanController::class, 'trash'])->name('dean.dean_trash');



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
