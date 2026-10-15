<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Editar Ítem</title></head>
<body>
    <h1>Editar Ítem de Presupuesto</h1>
    @if ($errors->any())
        <ul style="color:red">@foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach</ul>
    @endif

    <form action="{{ route('presupuesto-items.update', $presupuestoItem->id_presupuesto_item) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Presupuesto:</label>
        <select name="id_presupuesto" required>
            @foreach($presupuestos as $p)
                <option value="{{ $p->id_presupuesto }}" {{ $presupuestoItem->id_presupuesto == $p->id_presupuesto ? 'selected' : '' }}>{{ $p->nombre }}</option>
            @endforeach
        </select><br>

        <label>Categoría:</label>
        <select name="id_categoria" required>
            @foreach($categorias as $c)
                <option value="{{ $c->id_categoria }}" {{ $presupuestoItem->id_categoria == $c->id_categoria ? 'selected' : '' }}>{{ $c->nombre }}</option>
            @endforeach
        </select><br>

        <label>Monto Asignado:</label>
        <input type="number" step="0.01" name="monto_asignado" value="{{ old('monto_asignado', $presupuestoItem->monto_asignado) }}" required><br>

        <label>Monto Ejecutado:</label>
        <input type="number" step="0.01" name="monto_ejecutado" value="{{ old('monto_ejecutado', $presupuestoItem->monto_ejecutado) }}" required><br>

        <button type="submit">Actualizar</button>
        <a href="{{ route('presupuesto-items.index') }}">Cancelar</a>
    </form>
</body>
</html>