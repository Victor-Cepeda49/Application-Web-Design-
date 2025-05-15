<!-- resources/views/inicio.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Notas Personales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">NotasApp</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/notas">Ver Notas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="d-flex align-items-center justify-content-center" style="height: 90vh;">
        <div class="text-center">
            <h1 class="display-4 mb-4">Bienvenido a NotasApp</h1>
            <p class="lead mb-5">Organiza tus ideas, tareas y pensamientos de manera simple y rápida.</p>
            <a href="/notas" class="btn btn-primary btn-lg">Ver tus notas</a>
        </div>
    </section>

</body>
</html>
