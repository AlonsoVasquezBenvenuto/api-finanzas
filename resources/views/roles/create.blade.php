<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Crear Rol</title></head>
<body>
    <h1>Crear Rol</h1>
    @if ($errors->any())
        <ul style="color:red">@foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach</ul>
    @endif

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" required><br>

        <label>Descripción:</label>
        <input type="text" name="description" value="{{ old('description') }}" required><br>

        <button type="submit">Guardar</button>
        <a href="{{ route('roles.index') }}">Cancelar</a>
    </form>
</body>
</html>