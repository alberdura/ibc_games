<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Juegos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .card {
            min-height: 400px; /* Altura mínima para las tarjetas */
            width: 600px; /* Ancho de la tarjeta */
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .rating-input {
            margin-top: 10px;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-gray-100 to-blue-100 min-h-screen" class="bg-light">
    <div class="container mt-5 bg-gradient-to-r from-purple-500 to-pink-500 text-white p-4 rounded shadow bg-light bg-light p-4 rounded shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-4 bg-gradient-to-r from-purple-500 to-pink-500 text-white p-4 rounded shadow bg-light">
            <h1 class="text-center flex-grow-1 bg-gradient-to-r from-purple-500 to-pink-500 text-white p-4 rounded shadow">Listado de Juegos</h1>
            <div>
            </div>
        </div>

        <div class="row mt-4 d-flex justify-content-center bg-gradient-to-r from-purple-500 to-pink-500 text-white p-4 rounded shadow bg-light"> <!-- Centrar todas las cartas horizontalmente -->
            @foreach($jocs as $joc)
                <div class="col-md-4 d-flex justify-content-center mb-4 bg-gradient-to-r from-purple-500 to-pink-500 text-white p-4 rounded shadow bg-light"> <!-- Centrar cada carta horizontalmente -->
                    <div class="card text-center bg-gradient-to-r from-purple-500 to-pink-500 text-white p-4 rounded shadow bg-light">
                        <div class="card-body bg-gradient-to-r from-purple-500 to-pink-500 text-white p-4 rounded shadow bg-light">
                            <h5 class="card-title bg-gradient-to-r from-purple-500 to-pink-500 text-white p-4 rounded shadow">{{ $joc->nom }}</h5>

                            <p class="card-text bg-gradient-to-r from-purple-500 to-pink-500 text-white p-4 rounded shadow">
                                @php
                                    // Verificar si el usuario ya ha puntuado este juego
                                    $userJoc = $userJocs->firstWhere('id', $joc->id);
                                    $rating = $userJoc ? $userJoc->pivot->rating : 'Sin puntuar';
                                @endphp
                                <strong>Puntuación: </strong>{{ $rating }}
                            </p>

                            <form class="space-y-4" action="{{ route('jocs.rate', $joc- class="p-4 rounded bg-white shadow-lg space-y-4">id) }}" method="POST" class="rating-input bg-gradient-to-r from-purple-500 to-pink-500 text-white p-4 rounded shadow">
                                @csrf
                                <input class="form-control" type="number" name="rating" min="1" max="5" value="{{ $rating !== 'Sin puntuar' ? $rating : '' }}" class="form-control bg-gradient-to-r from-purple-500 to-pink-500 text-white p-4 rounded shadow form-control border border-primary p-2 form-control border rounded px-3 py-2 shadow-sm" placeholder="Puntuar (1-5)">
                                <button class="btn btn-primary" type="submit" class="btn btn-primary mt-2 bg-gradient-to-r from-purple-500 to-pink-500 text-white p-4 rounded shadow btn btn-success btn btn-outline-primary rounded shadow-sm px-4 py-2">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Botón para volver a la página principal -->
        <div class="mt-4 text-center bg-gradient-to-r from-purple-500 to-pink-500 text-white p-4 rounded shadow bg-light">
            <a href="{{ route('categories.index') }}" class="btn btn-secondary bg-gradient-to-r from-purple-500 to-pink-500 text-white p-4 rounded shadow">Volver a la Página Principal</a>
        </div>
    </div>
</body>
</html>
