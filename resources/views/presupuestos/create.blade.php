<form action="{{ route('presupuestos.store') }}" method="POST">
    @csrf
    <label>Usuario:</label>
    <select name="id_usuario" required>
        @foreach($usuarios as $u) <option value="{{ $u->id_usuario }}">{{ $u->nombre }}</option> @endforeach
    </select><br>
    <label>Nombre:</label> <input type="text" name="nombre" required><br>
    <label>Descripción:</label> <textarea name="descripcion"></textarea><br>
    <label>Monto Total:</label> <input type="number" step="0.01" name="monto_total" required><br>
    <label>Fecha Inicio:</label> <input type="date" name="fecha_inicio" required><br>
    <label>Fecha Fin:</label> <input type="date" name="fecha_fin" required><br>
    <label>Estado:</label> <input type="text" name="estado" value="ACTIVO" required><br>
    <label>Visibilidad:</label> <input type="text" name="visibilidad" value="PRIVADO" required><br>
    <button type="submit">Guardar</button>
</form>