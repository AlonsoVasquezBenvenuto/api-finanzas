<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>
    <h1>Lista de Usuarios</h1>
    <a href="{{ route('usuarios.create') }}">Crear nuevo usuario</a>

    <table id="usuarios-table" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Rol</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#usuarios-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('usuarios.index') }}",
                columns: [
                    { data: 'id_usuario', name: 'id_usuario' },
                    { data: 'rol_id', name: 'rol_id' },
                    { data: 'nombre', name: 'nombre' },
                    { data: 'email', name: 'email' },
                    { data: 'estado', name: 'estado' },
                    {
                        data: 'id_usuario',
                        name: 'acciones',
                        orderable: false,
                        searchable: false,
                        render: function(data) {
                            let editUrl = "{{ route('usuarios.edit', ':id') }}".replace(':id', data);
                            return `
                                <a href="${editUrl}">Editar</a>
                                <button class="btn-delete" data-id="${data}">Eliminar</button>
                            `;
                        }
                    }
                ]
            });

            $(document).on('click', '.btn-delete', function() {
                if (!confirm('¿Eliminar este usuario?')) return;
                let id = $(this).data('id');
                let url = "{{ route('usuarios.destroy', ':id') }}".replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function() {
                        $('#usuarios-table').DataTable().ajax.reload();
                    }
                });
            });
        });
    </script>
</body>
</html>