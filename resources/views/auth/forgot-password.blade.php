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
        <div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12 flex flex-wrap">
            <div class="w-full md:w-1/2 xl:w-1/2 p-6">
                <div class="form-container">
                    <h1>RESET PASSWORD</h1>
                    <p style="text-align:center;">Kindly enter your valid email address correctly to receive a recovery link</p>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" required>
                        </div>
                        <button type="submit">Verify</button>
                    </form>
                    <div class="links">
                        <a href="{{ route('login') }}">Back to Login</a>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 xl:w-1/2 p-6 bg-blue-500">
                <img src="{{ asset('images/login-image.png') }}" alt="Right Image" class="w-full h-full object-cover">
            </div>
        </div>
    </x-guest-layout>
</body>
</html>
