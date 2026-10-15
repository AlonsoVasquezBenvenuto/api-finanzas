<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Crear Ítem</title></head>
<body>
    <h1>Crear Ítem de Presupuesto</h1>
    @if ($errors->any())
        <ul style="color:red">@foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach</ul>
    @endif

    <form action="{{ route('presupuesto-items.store') }}" method="POST">
        @csrf
        <label>Presupuesto:</label>
        <select name="id_presupuesto" required>
            <option value="">Seleccione</option>
            @foreach($presupuestos as $p) <option value="{{ $p->id_presupuesto }}">{{ $p->nombre }}</option> @endforeach
        </select><br>

        <label>Categoría:</label>
        <select name="id_categoria" required>
            <option value="">Seleccione</option>
            @foreach($categorias as $c) <option value="{{ $c->id_categoria }}">{{ $c->nombre }}</option> @endforeach
        </select><br>

        <label>Monto Asignado:</label>
        <input type="number" step="0.01" name="monto_asignado" value="{{ old('monto_asignado', 0) }}" required><br>

        <label>Monto Ejecutado:</label>
        <input type="number" step="0.01" name="monto_ejecutado" value="{{ old('monto_ejecutado', 0) }}" required><br>

        <button type="submit">Guardar</button>
        <a href="{{ route('presupuesto-items.index') }}">Cancelar</a>
    </form>
</body>
</html>