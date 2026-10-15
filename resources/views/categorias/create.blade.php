<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Categoría</title>
</head>
<body>
    <h1>Crear Nueva Categoría</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf

        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" required>
        <br>

        <label>Tipo:</label>
        <input type="text" name="tipo" value="{{ old('tipo') }}" required>
        <br>

        <label>Visibilidad:</label>
        <input type="text" name="visibilidad" value="{{ old('visibilidad') }}" required>
        <br>

        <button type="submit">Guardar</button>
        <a href="{{ route('categorias.index') }}">Cancelar</a>
    </form>
</body>
</html>