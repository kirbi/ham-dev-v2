<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="antialiased bg-gray-100 font-sans">
    <div class="min-h-screen flex flex-col items-center justify-center py-12 px-4">
        <!-- Logo / App Name -->
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold text-gray-800">{{ config('app.name', 'HAM') }}</h1>
            <p class="text-sm text-gray-500 mt-1">Sistem Informasi HIV/AIDS</p>
        </div>

        <!-- Card Wrapper -->
        <div class="w-full max-w-md bg-white rounded-2xl shadow-md p-8">
            {{ $slot }}
        </div>
    </div>

    @livewireScripts
</body>
</html>
