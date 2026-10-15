<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Categoría</title>
</head>
<body>
    <h1>Editar Categoría</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categorias.update', $categoria->id_categoria) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre', $categoria->nombre) }}" required>
        <br>

        <label>Tipo:</label>
        <input type="text" name="tipo" value="{{ old('tipo', $categoria->tipo) }}" required>
        <br>

        <label>Visibilidad:</label>
        <input type="text" name="visibilidad" value="{{ old('visibilidad', $categoria->visibilidad) }}" required>
        <br>

        <button type="submit">Actualizar</button>
        <a href="{{ route('categorias.index') }}">Cancelar</a>
    </form>
</body>
</html>