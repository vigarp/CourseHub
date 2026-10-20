<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CourseHub - Platform Belajar Online')</title>

    <!-- Asset Bootstrap Lokal (Sesuai Poin 5 Petunjuk Soal UTS) -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }
        .hero-banner {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
        }
        .course-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border: 1px solid #e2e8f0;
        }
        .course-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08) !important;
        }
        .course-img-wrapper {
            background-color: #0f172a;
            border-top-left-radius: var(--bs-border-radius);
            border-top-right-radius: var(--bs-border-radius);
            overflow: hidden;
            aspect-ratio: 16 / 9;
        }
        .course-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .badge-category {
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
    </style>
    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Header / Navbar -->
    @include('partials.header')

    <!-- Konten Utama -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Asset Bootstrap JS Lokal -->
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>
</html>

