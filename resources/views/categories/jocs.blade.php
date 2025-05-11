<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos de {{ $category->nom }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Aumentar el tamaño de las cartas */
        .card {
            min-height: 125px; /* Aumentar la altura mínima de las cartas */
            width: 450px; /* Ancho de la tarjeta */
            margin: 10px; /* Margen alrededor de las cartas */
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center; /* Centrar el contenido verticalmente */
            padding: 20px; /* Agregar espacio interior a las cartas */
        }

        .card-title {
            font-size: 1.5rem; /* Aumentar el tamaño del título */
            font-weight: bold; /* Hacer el título más grueso */
        }

        .card-text {
            font-size: 1.2rem; /* Aumentar el tamaño del texto */
        }

        .btn {
            font-size: 1rem; /* Aumentar el tamaño de los botones */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Juegos en la Categoría: {{ $category->nom }}</h1>
        <div class="row mt-4 d-flex justify-content-center">
            @foreach($category->jocs as $joc)
                <div class="col-md-4 d-flex justify-content-center mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">{{ $joc->nom }}</h5>

                            <!-- Mostrar la media de las puntuaciones -->
                            <p class="card-text">
                                <strong>Puntuación media: </strong>{{ $joc->avg_rating ?? 'Sin puntuaciones' }}
                            </p>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <form action="{{ route('logout') }}" method="GET">
    <button type="submit" class="btn btn-danger">Volver a la Página Principal</button>
</form>

    </div>
</body>
</html>
