<form action="{{ route('movimientos.store') }}" method="POST">
    @csrf
    <label>Usuario:</label>
    <select name="id_usuario" required>
        @foreach($usuarios as $u) <option value="{{ $u->id_usuario }}">{{ $u->nombre }}</option> @endforeach
    </select><br>

    <label>Cuenta Origen:</label>
    <select name="id_cuenta" required>
        @foreach($cuentas as $c) <option value="{{ $c->id_cuenta }}">{{ $c->nombre }} (Saldo: {{ $c->saldo_actual }})</option> @endforeach
    </select><br>

    <label>Cuenta Destino (solo transferencias):</label>
    <select name="id_cuenta_destino">
        <option value="">Ninguna</option>
        @foreach($cuentas as $c) <option value="{{ $c->id_cuenta }}">{{ $c->nombre }}</option> @endforeach
    </select><br>

    <label>Categoría:</label>
    <select name="id_categoria">
        <option value="">Ninguna</option>
        @foreach($categorias as $cat) <option value="{{ $cat->id_categoria }}">{{ $cat->nombre }}</option> @endforeach
    </select><br>

    <label>Presupuesto:</label>
    <select name="id_presupuesto">
        <option value="">Ninguno</option>
        @foreach($presupuestos as $p) <option value="{{ $p->id_presupuesto }}">{{ $p->nombre }}</option> @endforeach
    </select><br>

    <label>Tipo:</label>
    <select name="tipo" required>
        <option value="INGRESO">INGRESO</option>
        <option value="EGRESO">EGRESO</option>
        <option value="TRANSFERENCIA">TRANSFERENCIA</option>
    </select><br>

    <label>Monto:</label> <input type="number" step="0.01" name="monto" required><br>
    <label>Tasa de Cambio (opcional):</label> <input type="number" step="0.00000001" name="tasa_cambio"><br>
    <label>Fecha:</label> <input type="datetime-local" name="fecha" required><br>
    <label>Descripción:</label> <textarea name="descripcion"></textarea><br>
    <label>Estado:</label> <input type="text" name="estado" value="COMPLETADA" required><br>
    <label>Visibilidad:</label> <input type="text" name="visibilidad" value="PRIVADO" required><br>
    <button type="submit">Guardar</button>
</form>