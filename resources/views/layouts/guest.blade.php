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
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-blue-100 via-indigo-100 to-pink-100 transition-all duration-500">
            <div class="mb-4 flex flex-col items-center">
                <!-- Illustration SVG moderne -->
                <svg width="64" height="64" fill="none" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="32" cy="32" r="32" fill="#6366F1" fill-opacity="0.15"/>
                  <path d="M32 16C24.268 16 18 22.268 18 30C18 37.732 24.268 44 32 44C39.732 44 46 37.732 46 30C46 22.268 39.732 16 32 16ZM32 40C26.477 40 22 35.523 22 30C22 24.477 26.477 20 32 20C37.523 20 42 24.477 42 30C42 35.523 37.523 40 32 40Z" fill="#6366F1"/>
                </svg>
                <a href="/">
                    <x-application-logo class="w-16 h-16 fill-current text-indigo-500 mt-2" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
