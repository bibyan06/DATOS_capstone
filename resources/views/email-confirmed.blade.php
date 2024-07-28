<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <link rel="stylesheet" href="{{ asset('css/verify-email.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="verify-email-container">
        <div class="verify-email-card">
            <h2 class="verify-email-title">SUCCESS!</h2>
            <div class="mb-4 text-sm text-gray-600 verify-email-message">
                {{ __('Your email has been verified. You can now proceed.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                </div>
            @endif

            <div class="mt-4 flex items-center justify-between emailconfirmed-buttons" style="text-decoration:none">
                @auth
                    @php
                        $user = Auth::user();
                        $employeeId = $user->employee_id;
                        
                        // Redirect based on employee_id
                        if (substr($employeeId, 0, 2) === '03') {
                            $dashboardRoute = 'home.dean';
                        } elseif (substr($employeeId, 0, 2) === '01') {
                            $dashboardRoute = 'home.admin';
                        } elseif (substr($employeeId, 0, 2) === '02') {
                            $dashboardRoute = 'home.office_staff';
                        } else {
                            // Handle unknown employee_id cases
                            $dashboardRoute = 'home'; // Or redirect to an error page or a default route
                        }
                    @endphp
                    <a href="{{ route($dashboardRoute) }}" class="emailconfirmed-button verify-email-button--secondary ms-2">
                        {{ __('Proceed') }}
                    </a>
                @else
                    <a href="{{ route('login') }}" class="emailconfirmed-button verify-email-button--secondary ms-2">
                        {{ __('Proceed to Login') }}
                    </a>
                @endauth
            </div>
        </div>
    </div>
</body>
</html>
