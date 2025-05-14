<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Optional: Custom CSS -->
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <div class="row g-0 min-h-screen" style="background: linear-gradient(to bottom, #5CA3FF, #112A4A);">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content -->
        @yield('content')
        <!-- Footer -->
        <footer class="text-center text-xs text-white w-full mt-8 absolute bottom-2">
            <small>©2025 PT Duta Reka Bumi. Seluruh hak cipta dilindungi.</small>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>