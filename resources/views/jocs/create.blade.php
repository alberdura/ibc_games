<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Juego</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Crear un Nuevo Juego</h1>
        <form action="{{ route('jocs.store') }}" method="POST">
            @csrf <!-- Token CSRF obligatorio -->
            
            <div class="mb-3">
                <label for="nom" class="form-label">Nombre del Juego</label>
                <input type="text" id="nom" name="nom" class="form-control" required>
</div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Categoría</label>
                <select id="category_id" name="category_id" class="form-select" required>
                    <option value="" disabled selected>Seleccione una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nom }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('admin.jocs') }}" class="btn btn-danger">Volver atrás</a>
        </form>
    </div>
</body>
</html>
