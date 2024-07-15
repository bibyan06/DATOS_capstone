<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::redirect(uri:'/', destination: 'login');
Route::view('/terms-of-service', 'terms.show')->name('terms.show');
Route::view('/privacy-policy', 'policy.show')->name('policy.show');


Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::middleware([
   'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/test-db', function() {
    try {
        \DB::connection()->getPdo();
        return 'Database connection is working!';
    } catch (\Exception $e) {
        return 'Could not connect to the database. Please check your configuration. Error: ' . $e->getMessage();
    }
});
