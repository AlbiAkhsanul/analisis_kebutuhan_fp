<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Login') }}</title> --}}
        <title>Login</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex justify-center items-center bg-gradient-to-b from-white via-slate-100 to-sky-800 px-48 gap-x-60">
            <div class="hidden md:block w-1/2 h-full">
                <img src="{{ asset('src/construction_stock_1.png') }}" alt="Side Image" class="h-[701px] w-[701px] object-cover">
            </div>
            <div class="w-full max-w-md space-y-12 mr-8 justify-end">
                <div class="flex justify-center">
                    <a href="/">
                        <img src="{{ asset('src/company_logo.png') }}" alt="Company Logo">
                    </a>
                </div>
    
                <div class="px-6 py-4">
                    {{ $slot }}
                </div>
            </div>
        </div>
        <div class="text-center text-xs text-white w-full mt-8 absolute bottom-2">
            ©2025 PT Duta Reka Bumi. Seluruh hak cipta dilindungi.
        </div>
    </body>
</html>
