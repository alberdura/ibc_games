<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .card {
            min-height: 100px; /* Altura mínima para que las cartas sean uniformes */
            width: 500px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-center flex-grow-1">Listado de Categorías</h1>
            <div>
                <a href="{{ route('register') }}" class="btn btn-info me-2">Registrarse</a> <!-- Botón de registro -->
                <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
            </div>
        </div>
        <div class="row mt-4 d-flex justify-content-center"> <!-- Centrar todas las cartas horizontalmente -->
            @forelse ($categories as $category)
                <div class="col-md-4 d-flex justify-content-center"> <!-- Centrar cada carta horizontalmente -->
                    <div class="card mb-3 text-center"> <!-- Centrar el contenido dentro de cada carta -->
                        <div class="card-body d-flex flex-column justify-content-center"> <!-- Centrar contenido dentro -->
                            <h5 class="card-title">{{ $category->nom }}</h5>
                            <a href="{{ route('categories.jocs', $category->id) }}" class="btn btn-success mt-3">
                                Ver Juegos
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">No hay categorías disponibles.</p>
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>
