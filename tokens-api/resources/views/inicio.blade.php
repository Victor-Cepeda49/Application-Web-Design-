<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tokens de Personajes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Tokens de Personajes</span>
    </div>
</nav>

<div class="container mt-5 text-center">
    <h1 class="mb-4">Bienvenido</h1>
    <p>Gestiona tus personajes y películas o series desde aquí.</p>

    <a href="{{ url('/personajes/create') }}" class="btn btn-primary m-2">Agregar Personaje</a>
    <a href="{{ url('/peliculas/create') }}" class="btn btn-secondary m-2">Agregar Película/Serie</a>
    <a href="{{ route('personajes.index') }}" class="btn btn-info m-2">Ver Personajes</a>
</div>

</body>
</html>
