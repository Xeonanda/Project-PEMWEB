<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'My Laravel App')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            background: url('{{ asset('/images/background.jpg') }}') no-repeat fixed;
        }

        #app {
            display: flex;
            min-height: 100vh;
        }
        nav {
            flex: 0 0 200px;
            background-color: #343a40;
            color: white;
        }
        .nav-link {
            color: white;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }
        .nav-link:hover {
            background-color: #495057;
            color: white;
            transform: scale(1.1);
        }
        .content {
            flex: 1;
        }
        .card {
            margin-bottom: 20px;
        }
        .form-control {
            margin-bottom: 10px;
        }
        .btn-custom {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="d-flex flex-column bg-secondary">
            <!-- Sidebar -->
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('konfigurasi.index') }}">Konfigurasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pemilik.index') }}">Pemilik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pasar.index') }}">Pasar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tenants.index') }}">Tenant</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('riwayat_pemilikan.index') }}">Riwayat Pemilikan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('riwayat_iuran.index') }}">Riwayat Iuran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pengelola.index') }}">Pengelola</a>
                </li>
            </ul>
        </nav>

        <div class="content p-4">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
