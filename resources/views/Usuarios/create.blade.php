<form action="{{ route('usuarios.store') }}" method="POST">
    @csrf
    <label>Rol:</label>
    <select name="rol_id" required>
        <option value="">Seleccione un rol</option>
        @foreach($roles as $rol)
            <option value="{{ $rol->rol_id }}">{{ $rol->nombre }}</option>
        @endforeach
    </select><br>

    <label>Nombre:</label>
    <input type="text" name="nombre" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <label>Estado:</label>
    <input type="text" name="estado" value="ACTIVO" required><br>

    <button type="submit">Guardar</button>
    <a href="{{ route('usuarios.index') }}">Cancelar</a>
</form>