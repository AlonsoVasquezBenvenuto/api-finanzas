<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cuenta</title>
</head>
<body>
    <h1>Editar Cuenta</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cuentas.update', $cuenta->id_cuenta) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Usuario:</label>
        <select name="id_usuario" required>
            @foreach($usuarios as $u)
                <option value="{{ $u->id_usuario }}" {{ $cuenta->id_usuario == $u->id_usuario ? 'selected' : '' }}>
                    {{ $u->nombre }}
                </option>
            @endforeach
        </select><br>

        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre', $cuenta->nombre) }}" required><br>

        <label>Tipo:</label>
        <input type="text" name="tipo" value="{{ old('tipo', $cuenta->tipo) }}" required><br>

        <label>Moneda:</label>
        <input type="text" name="moneda" maxlength="3" value="{{ old('moneda', $cuenta->moneda) }}" required><br>

        <label>Saldo Inicial:</label>
        <input type="number" step="0.01" name="saldo_inicial" value="{{ old('saldo_inicial', $cuenta->saldo_inicial) }}" required><br>

        <label>Visibilidad:</label>
        <input type="text" name="visibilidad" value="{{ old('visibilidad', $cuenta->visibilidad) }}" required><br>

        <label>Estado:</label>
        <input type="text" name="estado" value="{{ old('estado', $cuenta->estado) }}" required><br>

        <button type="submit">Actualizar</button>
        <a href="{{ route('cuentas.index') }}">Cancelar</a>
    </form>
</body>
</html>