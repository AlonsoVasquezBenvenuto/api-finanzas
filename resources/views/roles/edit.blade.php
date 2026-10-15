<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Editar Rol</title></head>
<body>
    <h1>Editar Rol</h1>
    @if ($errors->any())
        <ul style="color:red">@foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach</ul>
    @endif

    <form action="{{ route('roles.update', $rol->rol_id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre', $rol->nombre) }}" required><br>

        <label>Descripción:</label>
        <input type="text" name="description" value="{{ old('description', $rol->description) }}" required><br>

        <button type="submit">Actualizar</button>
        <a href="{{ route('roles.index') }}">Cancelar</a>
    </form>
</body>
</html>