<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Movimientos</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>
    <h1>Lista de Movimientos</h1>
    <a href="{{ route('movimientos.create') }}">Crear nuevo movimiento</a>

    <table id="movimientos-table" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Monto</th>
                <th>Cuenta</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#movimientos-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('movimientos.index') }}",
                columns: [
                    { data: 'id_movimiento', name: 'id_movimiento' },
                    { data: 'tipo', name: 'tipo' },
                    { data: 'monto', name: 'monto' },
                    { data: 'id_cuenta', name: 'id_cuenta' },
                    { data: 'fecha', name: 'fecha' },
                    { data: 'estado', name: 'estado' },
                    {
                        data: 'id_movimiento',
                        name: 'acciones',
                        orderable: false,
                        searchable: false,
                        render: function(data) {
                            let editUrl = "{{ route('movimientos.edit', ':id') }}".replace(':id', data);
                            return `
                                <a href="${editUrl}">Editar</a>
                                <button class="btn-delete" data-id="${data}">Eliminar</button>
                            `;
                        }
                    }
                ]
            });

            $(document).on('click', '.btn-delete', function() {
                if (!confirm('¿Eliminar este movimiento?')) return;
                let id = $(this).data('id');
                let url = "{{ route('movimientos.destroy', ':id') }}".replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function() {
                        $('#movimientos-table').DataTable().ajax.reload();
                    }
                });
            });
        });
    </script>
</body>
</html>