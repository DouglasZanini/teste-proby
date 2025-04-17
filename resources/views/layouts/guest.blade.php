<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-gradient-to-br from-emerald-50 to-white flex items-center justify-center">
        <div class="w-full max-w-md bg-white shadow-xl rounded-2xl p-8 sm:p-10">
            <div class="text-center mb-6">
                <a href="/" class="text-2xl font-bold text-emerald-600">{{ config('app.name', 'Laravel') }}</a>
            </div>

            {{ $slot }}
        </div>
    </body>
</html>
