<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Presupuesto</title>
</head>
<body>
    <h1>Editar Presupuesto</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('presupuestos.update', $presupuesto->id_presupuesto) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Usuario:</label>
        <select name="id_usuario" required>
            @foreach($usuarios as $u)
                <option value="{{ $u->id_usuario }}" {{ $presupuesto->id_usuario == $u->id_usuario ? 'selected' : '' }}>
                    {{ $u->nombre }}
                </option>
            @endforeach
        </select><br>

        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre', $presupuesto->nombre) }}" required><br>

        <label>Descripción:</label>
        <textarea name="descripcion">{{ old('descripcion', $presupuesto->descripcion) }}</textarea><br>

        <label>Monto Total:</label>
        <input type="number" step="0.01" name="monto_total" value="{{ old('monto_total', $presupuesto->monto_total) }}" required><br>

        <label>Fecha Inicio:</label>
        <input type="date" name="fecha_inicio" value="{{ old('fecha_inicio', $presupuesto->fecha_inicio) }}" required><br>

        <label>Fecha Fin:</label>
        <input type="date" name="fecha_fin" value="{{ old('fecha_fin', $presupuesto->fecha_fin) }}" required><br>

        <label>Estado:</label>
        <input type="text" name="estado" value="{{ old('estado', $presupuesto->estado) }}" required><br>

        <label>Visibilidad:</label>
        <input type="text" name="visibilidad" value="{{ old('visibilidad', $presupuesto->visibilidad) }}" required><br>

        <button type="submit">Actualizar</button>
        <a href="{{ route('presupuestos.index') }}">Cancelar</a>
    </form>
</body>
</html>