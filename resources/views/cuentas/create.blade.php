<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Cuenta</title>
</head>
<body>
    <h1>Crear Cuenta</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cuentas.store') }}" method="POST">
        @csrf
        <label>Usuario:</label>
        <select name="id_usuario" required>
            <option value="">Seleccione</option>
            @foreach($usuarios as $u)
                <option value="{{ $u->id_usuario }}">{{ $u->nombre }}</option>
            @endforeach
        </select><br>

        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" required><br>

        <label>Tipo:</label>
        <input type="text" name="tipo" value="{{ old('tipo') }}" required><br>

        <label>Moneda:</label>
        <input type="text" name="moneda" maxlength="3" value="{{ old('moneda', 'CLP') }}" required><br>

        <label>Saldo Inicial:</label>
        <input type="number" step="0.01" name="saldo_inicial" value="{{ old('saldo_inicial', 0) }}" required><br>

        <label>Visibilidad:</label>
        <input type="text" name="visibilidad" value="{{ old('visibilidad', 'PRIVADO') }}" required><br>

        <label>Estado:</label>
        <input type="text" name="estado" value="{{ old('estado', 'ACTIVO') }}" required><br>

        <button type="submit">Guardar</button>
        <a href="{{ route('cuentas.index') }}">Cancelar</a>
    </form>
</body>
</html>