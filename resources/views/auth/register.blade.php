<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<x-guest-layout>
    <div class="register-container mx-auto p-4">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full md:w-1/2 xl:w-1/2 p-6 bg-blue-400">
                <img src="{{ asset('images/login-image.png') }}" alt="Left Image" class="w-full h-full object-cover">
            </div>
            <div class="registerForm w-full md:w-1/2 xl:w-1/2 p-4">
                <!-- <div id="responseMessage" class="response-message"></div> Response Message Div -->
                <form method="POST" id="registerForm">
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

                        <div class="mt-3">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="middle_name" class="middle_name block mb-2 text-sm font-medium text-gray-900">Middle Name</label>
                                    <input type="text" id="middle_name" name="middle_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                </div>
                                <div>
                                    <label for="age" class="age block mb-2 text-sm font-medium text-gray-900">Age</label>
                                    <input type="number" id="age" name="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                    <div id="age-error" class="text-red-500 text-sm mt-1"></div>
                                </div>
                        </div>

                        <div class="mt-3">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="gender" class="gender block mb-2 text-sm font-medium text-gray-900">Gender</label>
                                    <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div>
                                <label for="phone_number" class="phone_number block mb-2 text-sm font-medium text-gray-900">Phone Number</label>
                                    <input type="tel" id="phone_number" name="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                                    pattern="\d{11}" 
                                    title="Phone number must be exactly 11 digits" 
                                    required>     
                                </div>
                                <div id="phone_number_error" class="text-red-500 text-sm mt-1"></div>
                            </div>
                        </div>

                        <div class="mt-1">
                            <label for="home_address" class="home_address block mb-2 text-sm font-medium text-gray-900">Home Address</label>
                            <input type="text" id="home_address" name="home_address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>

                        <div class="mt-3">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="employee_id" class="employee_id block mb-2 text-sm font-medium text-gray-900">Employee ID</label>
                                    <input type="text" id="employee_id" name="employee_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                    <div id="employee-id-error" class="text-red-500 text-sm mt-1"></div>
                                </div>
                                <div>
                                    <label for="username" class="username block mb-2 text-sm font-medium text-gray-900">Username</label>
                                    <input type="text" id="username" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <label for="email" class="email block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            <div id="email_error" class="text-red-500 text-sm mt-1"></div>
                        </div>

                        <div class="mt-3">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="password-container">
                                    <label for="password" class="password block mb-2 text-sm font-medium text-gray-900">Password</label>
                                    <div class="input-container">
                                        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                        <span class="register-show-password" onclick="togglePasswordVisibility()">
                                            <i class="fas fa-eye-slash" id="eye-icon"></i>
                                        </span>
                                    </div>
                                    <div id="password-error" class="text-red-500 text-sm mt-1"></div> 
                                </div>
                                <div>
                                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirm Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required> 
                                </div>
                                <div id="password-error" class="text-red-500 text-sm mt-1"></div>
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
                                            ]) !!}
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

    window.onload = function() {
        @if(session('status'))
            alert("{{ session('status') }}");
        @endif
    }

    $(document).ready(function() {
    $('#registerForm').on('submit', function(event) {
        event.preventDefault();

        // Clear previous messages
        $('#responseMessage').html('');
        $('#password-error').html('');
        $('#age-error').html('');

        // Custom client-side validation
        if (!validateAge() || !validatePassword()) {
            return false;
        }

        var formData = $(this).serialize();

        $.ajax({
            url: '{{ route('register') }}',
            type: 'POST',
            data: formData,
            success: function(response) {
                alert('Registration successful! Please login to verify your email.');
                window.location.href = "{{ route('login') }}";
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors || {};
                var errorMessages = '';

                console.log(xhr.responseJSON); // Add this line to log the response

                // Password errors
                if (errors.password) {
                    errorMessages += '<ul>';
                    $.each(errors.password, function(_, value) {
                        errorMessages += '<li>' + value + '</li>';
                    });
                    errorMessages += '</ul>';
                    $('#password-error').html(errorMessages);
                }

                // Age errors
                if (errors.age) {
                    errorMessages += '<ul>';
                    $.each(errors.age, function(_, value) {
                        errorMessages += '<li>' + value + '</li>';
                    });
                    errorMessages += '</ul>';
                    $('#age-error').html(errorMessages);
                }
                
                //Employee ID error
                if (errors.employee_id) {
                        $('#employee-id-error').text(errors.employee_id[0]);
                    }

                // General errors
                if (Object.keys(errors).length) {
                    errorMessages += '<ul>';
                    $.each(errors, function(key, value) {
                        if (key !== 'password' && key !== 'age') {
                            errorMessages += '<li>' + value[0] + '</li>';
                        }
                    });
                    errorMessages += '</ul>';
                    $('#responseMessage').html(errorMessages);
                } else {
                    $('#responseMessage').html('<p>' + xhr.responseJSON.message + '</p>');
                }
                $('#responseMessage').css('color', 'red');
            }
        });
    });

    function validateAge() {
        const age = document.getElementById('age').value;
        const ageError = document.getElementById('age-error');

        if (age < 18) {
            ageError.textContent = 'Age must be at least 18.';
            return false;
        }

        ageError.textContent = '';
        return true;
    }

    function validatePassword() {
        const password = document.getElementById('password').value;
        const passwordError = document.getElementById('password-error');
        const regex = /^(?=.*[a-z])(?=.*[A-Z]).{8,18}$/;

        if (!regex.test(password)) {
            passwordError.textContent = 'Password must be 8-18 characters long, contain both uppercase and lowercase letters.';
            return false;
        }

        passwordError.textContent = '';
        return true;
    }

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

    window.onload = function() {
        @if(session('status'))
            alert("{{ session('status') }}");
        @endif
    }
});

</script>
</body>
</html>
