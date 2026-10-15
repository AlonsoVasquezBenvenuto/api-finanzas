<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.update', $usuario->id_usuario) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Rol:</label>
        <select name="rol_id" required>
            @foreach($roles as $rol)
                <option value="{{ $rol->rol_id }}" {{ $usuario->rol_id == $rol->rol_id ? 'selected' : '' }}>
                    {{ $rol->nombre }}
                </option>
            @endforeach
        </select><br>

        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre', $usuario->nombre) }}" required><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $usuario->email) }}" required><br>

        <label>Password (dejar vacío para no cambiar):</label>
        <input type="password" name="password"><br>

        <label>Estado:</label>
        <input type="text" name="estado" value="{{ old('estado', $usuario->estado) }}" required><br>

        <button type="submit">Actualizar</button>
        <a href="{{ route('usuarios.index') }}">Cancelar</a>
    </form>
</body>
</html>