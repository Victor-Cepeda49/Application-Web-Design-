<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Menús - @yield('titulo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .active {
            font-weight: bold;
            color: #0d6efd !important;
            text-decoration: underline !important;
        }
        footer {
            padding: 20px 0;
            background-color: #f8f9fa;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        body {
            padding-bottom: 60px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('inicio') }}">Proyecto Menús</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('inicio') ? 'active' : '' }}" href="{{ route('inicio') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('ingresos') ? 'active' : '' }}" href="{{ route('ingresos') }}">Ingresos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('gastos') ? 'active' : '' }}" href="{{ route('gastos') }}">Gastos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('informes') ? 'active' : '' }}" href="{{ route('informes') }}">Informes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('contenido')
    </div>

    <footer class="text-center">
        <div class="container">
            <p class="mb-0">© 2025 - Proyecto Menús realizado por Victor Cepeda</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>