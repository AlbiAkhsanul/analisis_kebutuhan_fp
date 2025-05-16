<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Optional: Custom CSS -->
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')

    <div class="flex-fill d-flex flex-column" style="background: linear-gradient(to bottom, #5CA3FF, #112A4A);">
        <div class="row g-0 flex-fill pb-6">
            @include('layouts.sidebar')
            @yield('content')
        </div>

        <footer class="text-center text-xs text-white w-100 mt-auto py-2">
            <small>©2025 PT Duta Reka Bumi. Seluruh hak cipta dilindungi.</small>
        </footer>
    </div>
</body>
</html>