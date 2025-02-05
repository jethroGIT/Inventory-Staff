<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <title>@yield('title', 'Daftar Barang')</title>
    <!-- Tambahkan CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan CSS Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        html {
            overflow-y: scroll;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #2274c7;
            padding-top: 20px;
            overflow-y: auto;
        }

        .sidebar h4 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .sidebar .nav-link {
            font-size: 1rem;
            padding: 10px 20px;
        }

        .sidebar .nav-link:hover {
            background-color: #c5cfd86c;
            border-radius: 4px;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .navbar {
            margin-left: 250px;
            border-bottom: 2px solid #e9ecef;
        }
    </style>
</head>

<body>
    <!-- Include Sidebar -->
    @include('sidebar')

    <!-- Include Navbar -->
    @include('navbar')

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>
</body>

</html>
