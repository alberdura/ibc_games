<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Juegos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Administrar Juegos</h1>
        <a href="{{ route('jocs.create') }}" class="btn btn-success mb-3">Crear Nuevo Juego</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jocs as $joc)
                    <tr>
                        <td>{{ $joc->id }}</td>
                        <td>{{ $joc->nom }}</td>
                        <td>{{ $joc->category->nom ?? 'Sin Categoría' }}</td>
                        <td>
                        <a href="{{ route('jocs.edit', $joc->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('jocs.destroy', $joc->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
