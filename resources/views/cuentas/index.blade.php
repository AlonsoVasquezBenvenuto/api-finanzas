<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cuentas</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>
    <h1>Lista de Cuentas</h1>
    <a href="{{ route('cuentas.create') }}">Crear nueva cuenta</a>

    <table id="cuentas-table" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Moneda</th>
                <th>Saldo Actual</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cuentas-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('cuentas.index') }}",
                columns: [
                    { data: 'id_cuenta', name: 'id_cuenta' },
                    { data: 'id_usuario', name: 'id_usuario' },
                    { data: 'nombre', name: 'nombre' },
                    { data: 'tipo', name: 'tipo' },
                    { data: 'moneda', name: 'moneda' },
                    { data: 'saldo_actual', name: 'saldo_actual' },
                    { data: 'estado', name: 'estado' },
                    {
                        data: 'id_cuenta',
                        name: 'acciones',
                        orderable: false,
                        searchable: false,
                        render: function(data) {
                            let editUrl = "{{ route('cuentas.edit', ':id') }}".replace(':id', data);
                            return `
                                <a href="${editUrl}">Editar</a>
                                <button class="btn-delete" data-id="${data}">Eliminar</button>
                            `;
                        }
                    }
                ]
            });

            $(document).on('click', '.btn-delete', function() {
                if (!confirm('¿Eliminar esta cuenta?')) return;
                let id = $(this).data('id');
                let url = "{{ route('cuentas.destroy', ':id') }}".replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function() {
                        $('#cuentas-table').DataTable().ajax.reload();
                    }
                });
            });
        });
    </script>
</body>
</html>