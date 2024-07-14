<?php

use Illuminate\Support\Facades\Route;

Route::redirect(uri:'/', destination: 'login');

Route::post('/register', 'RegisterController@store')->name('register');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
