
<!DOCTYPE html>
<lang="en">
<head>
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="dashboard-title spacer grid items-center font-semibold text-xl text-gray-800 leading-tight grid">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <h1 style="margin-top:20rem;">
        WELCOME ADMIN
    </h1>
</x-app-layout>
</body>
</html>
