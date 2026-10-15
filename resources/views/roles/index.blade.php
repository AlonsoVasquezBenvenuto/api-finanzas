<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Roles</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>
    <h1>Lista de Roles</h1>
    <a href="{{ route('roles.create') }}">Crear nuevo rol</a>

    <table id="roles-table" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#roles-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('roles.index') }}",
                columns: [
                    { data: 'rol_id', name: 'rol_id' },
                    { data: 'nombre', name: 'nombre' },
                    { data: 'description', name: 'description' },
                    {
                        data: 'rol_id',
                        name: 'acciones',
                        orderable: false,
                        searchable: false,
                        render: function(data) {
                            let editUrl = "{{ route('roles.edit', ':id') }}".replace(':id', data);
                            return `
                                <a href="${editUrl}">Editar</a>
                                <button class="btn-delete" data-id="${data}">Eliminar</button>
                            `;
                        }
                    }
                ]
            });

            $(document).on('click', '.btn-delete', function() {
                if (!confirm('¿Eliminar este rol?')) return;
                let id = $(this).data('id');
                let url = "{{ route('roles.destroy', ':id') }}".replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function() {
                        $('#roles-table').DataTable().ajax.reload();
                    }
                });
            });
        });
    </script>
</body>
</html>