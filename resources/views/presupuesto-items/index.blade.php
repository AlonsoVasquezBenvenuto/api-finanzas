<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ítems de Presupuesto</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>
    <h1>Lista de Ítems de Presupuesto</h1>
    <a href="{{ route('presupuesto-items.create') }}">Crear nuevo ítem</a>

    <table id="items-table" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Presupuesto</th>
                <th>Categoría</th>
                <th>Monto Asignado</th>
                <th>Monto Ejecutado</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#items-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('presupuesto-items.index') }}",
                columns: [
                    { data: 'id_presupuesto_item', name: 'id_presupuesto_item' },
                    { data: 'id_presupuesto', name: 'id_presupuesto' },
                    { data: 'id_categoria', name: 'id_categoria' },
                    { data: 'monto_asignado', name: 'monto_asignado' },
                    { data: 'monto_ejecutado', name: 'monto_ejecutado' },
                    {
                        data: 'id_presupuesto_item',
                        name: 'acciones',
                        orderable: false,
                        searchable: false,
                        render: function(data) {
                            let editUrl = "{{ route('presupuesto-items.edit', ':id') }}".replace(':id', data);
                            return `
                                <a href="${editUrl}">Editar</a>
                                <button class="btn-delete" data-id="${data}">Eliminar</button>
                            `;
                        }
                    }
                ]
            });

            $(document).on('click', '.btn-delete', function() {
                if (!confirm('¿Eliminar este ítem?')) return;
                let id = $(this).data('id');
                let url = "{{ route('presupuesto-items.destroy', ':id') }}".replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function() {
                        $('#items-table').DataTable().ajax.reload();
                    }
                });
            });
        });
    </script>
</body>
</html>