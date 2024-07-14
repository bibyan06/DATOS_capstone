<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body>
<x-guest-layout>
    <div class="register-container mx-auto p-4 pt-6 md:p-6 lg:p-12">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full md:w-1/2 xl:w-1/2 p-6 bg-blue-400">
                <img src="{{ asset('images/login-image.png') }}" alt="Left Image" class="w-full h-full object-cover">
            </div>
            <div class="w-full md:w-1/2 xl:w-1/2 p-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-container">
                        <h1 class="text-center font-bold text-2xl">CREATE ACCOUNT</h1>
                        <div class="mt-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="last_name" class="last_name block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                </div>
                                <div>
                                    <label for="first_name" class="first_name block mb-2 text-sm font-medium text-gray-900">First Name</label>
                                    <input type="text" id="first_name" name="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="middle_name" class="middle_name block mb-2 text-sm font-medium text-gray-900">Middle Name</label>
                                    <input type="text" id="middle_name" name="middle_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                </div>
                                <div>
                                    <label for="age" class="age block mb-2 text-sm font-medium text-gray-900">Age</label>
                                    <input type="number" id="age" name="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                <label for="gender" class="gender block mb-2 text-sm font-medium text-gray-900">Gender</label>
                                <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                </div>
                                <div>
                                    <label for="phone_number" class="phone_number block mb-2 text-sm font-medium text-gray-900">Phone Number</label>
                                    <input type="tel" id="phone_number" name="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                </div>
                            </div>
                        </div>

                        <div  class="mt-4">
                            <label for="home_address" class="home_address block mb-2 text-sm font-medium text-gray-900">Home Address</label>
                            <input type="text" id="home_address" name="home_address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>

                        <div class="mt-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="employee_id" class="employee_id block mb-2 text-sm font-medium text-gray-900">Employee ID</label>
                                    <input type="text" id="employee_id" name="employee_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required>
                                </div>
                                <div>
                                    <label for="username" class="username block mb-2 text-sm font-medium text-gray-900">Username</label>
                                    <input type="text" id="username" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <label for="email" class="email block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required>
                        </div>

                        <div class="mt-4">
                            <div class="grid grid-cols-2 gap-4">
                            <div class="password-container">
                                <label for="password" class="password block mb-2 text-sm font-medium text-gray-900">Password</label>
                                <div class="input-container">
                                    <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                    <span class="register-show-password" onclick="togglePasswordVisibility()">
                                        <i class="fas fa-eye" id="eye-icon"></i>
                                    </span>
                                </div>
                            </div>
                                <div>
                                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirm Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                </div>
                            </div>
                        </div>
                        
                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <label for="terms" class="block mb-2 text-sm font-medium text-gray-900">
                                    <div class="flex items-center">
                                        <input type="checkbox" id="terms" name="terms" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" required>
                                        <span class="ms-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                            ])!!}
                                        </span>
                                    </div>
                                </label>
                            </div>
                        @endif
                        <div>
                            <button type="submit" class="register-btn inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 disabled:opacity-25 transition ease-in-out duration-150 mx-auto">
                            {{ __('CREATE') }}
                            </button>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <a style="color: #009FEA;" class="hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                {{ __('Back to Login') }}
                            </a> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>

</body>
</html>

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
