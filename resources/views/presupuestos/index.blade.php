<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Presupuestos</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>
    <h1>Lista de Presupuestos</h1>
    <a href="{{ route('presupuestos.create') }}">Crear nuevo presupuesto</a>

    <table id="presupuestos-table" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Monto Total</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#presupuestos-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('presupuestos.index') }}",
                columns: [
                    { data: 'id_presupuesto', name: 'id_presupuesto' },
                    { data: 'id_usuario', name: 'id_usuario' },
                    { data: 'nombre', name: 'nombre' },
                    { data: 'monto_total', name: 'monto_total' },
                    { data: 'fecha_inicio', name: 'fecha_inicio' },
                    { data: 'fecha_fin', name: 'fecha_fin' },
                    { data: 'estado', name: 'estado' },
                    {
                        data: 'id_presupuesto',
                        name: 'acciones',
                        orderable: false,
                        searchable: false,
                        render: function(data) {
                            let editUrl = "{{ route('presupuestos.edit', ':id') }}".replace(':id', data);
                            return `
                                <a href="${editUrl}">Editar</a>
                                <button class="btn-delete" data-id="${data}">Eliminar</button>
                            `;
                        }
                    }
                ]
            });

            $(document).on('click', '.btn-delete', function() {
                if (!confirm('¿Eliminar este presupuesto?')) return;
                let id = $(this).data('id');
                let url = "{{ route('presupuestos.destroy', ':id') }}".replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function() {
                        $('#presupuestos-table').DataTable().ajax.reload();
                    }
                });
            });
        });
    </script>
</body>
</html>