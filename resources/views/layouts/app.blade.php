<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Penjualan')</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <style>
        /* Mengatur agar halaman menggunakan layout flex */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        /* Sidebar tetap di samping */
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: #366a9e;
            color: white;
            padding-top: 20px;
            position: fixed;
        }
        .sidebar a {
            color: black;
            text-decoration: none;
            display: block;
            padding: 10px;
        }
        .sidebar a:hover {
            background: #95b2d0;
        }

        /* Konten utama memiliki margin untuk menyesuaikan dengan sidebar */
        .content {
            flex: 1;
            margin-left: 260px;
            padding: 20px;
        }

        /* Footer tetap di bagian bawah */
        footer {
            margin-left: 260px;
            width: calc(100% - 260px);
            background: #f8f9fa;
            text-align: center;
            padding: 10px;
            position: relative;
            bottom: 0;
        }
    </style>
</head>
<body>

    @include('layouts.sidebar') <!-- Sidebar di sebelah kiri -->
    
    <div class="content">
        @include('layouts.header') <!-- Header di dalam content -->
        
        <main class="container mt-4">
            @yield('content') <!-- Konten utama halaman -->
        </main>
    </div>

    <!-- Tambahkan Footer -->
    @include('layouts.footer')

</body>
</html>
