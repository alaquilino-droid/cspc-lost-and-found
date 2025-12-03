<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Campus Lost & Found') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/cspc-theme.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f9fafb;
        }
        :root {
        --bs-primary: #003366;
        --bs-link-color: #003366;
        }
        .navbar {
            background-color: #0d6efd;
        }
        .navbar-brand, .nav-link, .navbar-text {
            color: white !important;
        }
        footer {
            margin-top: 60px;
            padding: 20px;
            background: #f1f1f1;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <img src="{{ asset('images/Camarines_Sur_Polytechnic_Colleges_Logo.png') }}" 
                alt="CSPC Logo" 
                style="height: 40px; margin-right: 10px;">
            <span style="font-weight: 700;">CSPC Lost & Found</span>
        </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('items.myreports') }}">My Reports</a></li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-light mt-1">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @endauth

                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="text-center mt-5 py-4" style="background: #003366; color: white;">
        <div>Camarines Sur Polytechnic Colleges</div>
        <div class="text-light" style="font-size: 14px;">
            Nabua, Camarines Sur • Lost & Found Reporting System
        </div>
        <div style="font-size: 13px; opacity: 0.8;">© {{ date('Y') }} CSPC — All Rights Reserved</div>
    </footer>

    <!-- Bootstrap JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
