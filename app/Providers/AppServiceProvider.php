<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\Models\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('employee_id', function($attribute, $value, $parameters, $validator) {
            // Custom validation logic for employee_id
            return true; // or false if validation fails
        });

        View::composer('layouts.admin_layout', function ($view) {
            $pendingCount = Document::pending()->count(); // Retrieve the count of pending documents
            $view->with('pendingCount', $pendingCount);
        });

        DB::listen(function ($query) {
            Log::info('SQL Query: ' . $query->sql, $query->bindings);
        });
    
    }
}
