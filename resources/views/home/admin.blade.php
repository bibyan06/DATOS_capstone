<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Admin Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/os_landing_page.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/main.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- <script src='main.js'></script> -->
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