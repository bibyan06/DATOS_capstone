<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="{{ asset('css/forgot-password.css') }}">
</head>
<body>
<x-guest-layout>
    <div class="reset-pass-container mx-auto p-4 pt-6 md:p-6 lg:p-12 flex flex-wrap">
        <div class="w-full md:w-1/2 xl:w-1/2 p-6">
            <x-validation-errors class="mb-4" />
            <div class="reset-form-container">
                <h1>CHANGE PASSWORD</h1>
                <p style="text-align:center;">Enter a new password below to change your password</p>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="form-group">
                        <div class="mb-4">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                        </div>

                        <div class="mb-4">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>

                        <div class="mb-4">
                            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>
                    </div>
                    <x-button> {{ __('Change') }} </x-button>
                </form>
                <div class="links">
                    <a href="{{ route('login') }}">Back to Login</a>
                </div>
            </div>
        </div>
        <div class="bg-blue-500 w-full md:w-1/2 xl:w-1/2 p-6">
            <img src="{{ asset('images/login-image.png') }}" alt="Right Image" class="w-full h-full object-cover">
        </div>
    </div>
</x-guest-layout>
</body>
</html>
