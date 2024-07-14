<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<x-guest-layout>
    <div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12 flex flex-wrap">
        <div class="w-full md:w-1/2 xl:w-1/2 p-6 bg-white">
            <h1 class="welcome-header">WELCOME TO</h1>
            <div class="logo"><img src="{{ asset('images/logo.png') }}" alt="DATOS Logo"></div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="employee-id">
                    <label for="employee_id" class="block text-sm font-bold mb-2">Employee ID</label>
                    <input type="text" id="employee_id" name="employee_id" class="w-full pl-10 text-sm text-gray-700" required autofocus>
                </div>
                <div class="password-input">
                    <label for="password" class="block text-sm font-bold mb-2">Password</label>
                    <input type="password" id="password" name="password">
                    <span class="show-password" onclick="togglePasswordVisibility()">
                        <i class="fas fa-eye-slash" id="eye-icon"></i>
                    </span>
                </div>
                <div style="margin-bottom: 2rem;" class="flex items-center justify-between mb-4">
                    <label for="remember" class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="mr-2">
                        <span class="text-sm text-gray-600">Remember me</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="text-sm text-gray-500 hover:text-gray-900">Forgot Password?</a>
                </div>
                <button type="submit" class=" text-white font-bold py-2 px-4 rounded w-full">Log In</button>
                <div class="account-link">Don't have an account? <a href="{{ route('register') }}"class="text-blue-500 hover:text-blue-700">Create Account</a></div>
            </form>
        </div>
        <div class="w-full md:w-1/2 xl:w-1/2 p-6 bg-blue-500">
            <img src="{{ asset('images/login-image.png') }}" alt="" class="w-full h-full object-cover">
        </div>
    </div>
</x-guest-layout>

<script>
  function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eye-icon');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.add('fa-eye');
        eyeIcon.classList.remove('fa-eye-slash');
       
    } else {
        passwordInput.type = 'password';
        eyeIcon.classList.add('fa-eye-slash');
        eyeIcon.classList.remove('fa-eye');
        
    }
 }
</script>

