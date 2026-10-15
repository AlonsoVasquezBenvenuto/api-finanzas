<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Movimiento</title>
</head>
<body>
    <h1>Editar Movimiento</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('movimientos.update', $movimiento->id_movimiento) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Usuario:</label>
        <select name="id_usuario" required>
            @foreach($usuarios as $u)
                <option value="{{ $u->id_usuario }}" {{ $movimiento->id_usuario == $u->id_usuario ? 'selected' : '' }}>{{ $u->nombre }}</option>
            @endforeach
        </select><br>

        <label>Cuenta Origen:</label>
        <select name="id_cuenta" required>
            @foreach($cuentas as $c)
                <option value="{{ $c->id_cuenta }}" {{ $movimiento->id_cuenta == $c->id_cuenta ? 'selected' : '' }}>{{ $c->nombre }}</option>
            @endforeach
        </select><br>

        <label>Cuenta Destino:</label>
        <select name="id_cuenta_destino">
            <option value="">Ninguna</option>
            @foreach($cuentas as $c)
                <option value="{{ $c->id_cuenta }}" {{ $movimiento->id_cuenta_destino == $c->id_cuenta ? 'selected' : '' }}>{{ $c->nombre }}</option>
            @endforeach
        </select><br>

        <label>Categoría:</label>
        <select name="id_categoria">
            <option value="">Ninguna</option>
            @foreach($categorias as $cat)
                <option value="{{ $cat->id_categoria }}" {{ $movimiento->id_categoria == $cat->id_categoria ? 'selected' : '' }}>{{ $cat->nombre }}</option>
            @endforeach
        </select><br>

        <label>Presupuesto:</label>
        <select name="id_presupuesto">
            <option value="">Ninguno</option>
            @foreach($presupuestos as $p)
                <option value="{{ $p->id_presupuesto }}" {{ $movimiento->id_presupuesto == $p->id_presupuesto ? 'selected' : '' }}>{{ $p->nombre }}</option>
            @endforeach
        </select><br>

        <label>Tipo:</label>
        <select name="tipo" required>
            <option value="INGRESO" {{ $movimiento->tipo == 'INGRESO' ? 'selected' : '' }}>INGRESO</option>
            <option value="EGRESO" {{ $movimiento->tipo == 'EGRESO' ? 'selected' : '' }}>EGRESO</option>
            <option value="TRANSFERENCIA" {{ $movimiento->tipo == 'TRANSFERENCIA' ? 'selected' : '' }}>TRANSFERENCIA</option>
        </select><br>

        <label>Monto:</label>
        <input type="number" step="0.01" name="monto" value="{{ old('monto', $movimiento->monto) }}" required><br>

        <label>Tasa de Cambio:</label>
        <input type="number" step="0.00000001" name="tasa_cambio" value="{{ old('tasa_cambio', $movimiento->tasa_cambio) }}"><br>

        <label>Fecha:</label>
        <input type="datetime-local" name="fecha" value="{{ old('fecha', date('Y-m-d\TH:i', strtotime($movimiento->fecha))) }}" required><br>

        <label>Descripción:</label>
        <textarea name="descripcion">{{ old('descripcion', $movimiento->descripcion) }}</textarea><br>

        <label>Estado:</label>
        <input type="text" name="estado" value="{{ old('estado', $movimiento->estado) }}" required><br>

        <label>Visibilidad:</label>
        <input type="text" name="visibilidad" value="{{ old('visibilidad', $movimiento->visibilidad) }}" required><br>

        <button type="submit">Actualizar</button>
        <a href="{{ route('movimientos.index') }}">Cancelar</a>
    </form>
</body>
</html>