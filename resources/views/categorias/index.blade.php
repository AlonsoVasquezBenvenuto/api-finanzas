<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Categorías</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>

<h1>Lista de Categorías</h1>
<a href="{{ route('categorias.create') }}">Crear nueva categoría</a>

<table id="categorias-table" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Acciones</th> <!-- Nueva columna -->
        </tr>
    </thead>
</table>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- JS de DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#categorias-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('categorias.index') }}",
            columns: [
                { data: 'id_categoria', name: 'id_categoria' },
                { data: 'nombre', name: 'nombre' },
                { data: 'tipo', name: 'tipo' },
                {
                    data: 'id_categoria',
                    name: 'acciones',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        // Botones de Editar y Eliminar
                        let editUrl = "{{ route('categorias.edit', ':id') }}".replace(':id', data);
                        return `
                            <a href="${editUrl}" class="btn btn-sm btn-warning">Editar</a>
                            <button class="btn btn-sm btn-danger btn-delete" data-id="${data}">Eliminar</button>
                        `;
                    }
                }
            ]
        });

        // Lógica para eliminar con AJAX
        $(document).on('click', '.btn-delete', function() {
            if (!confirm('¿Estás seguro de eliminar esta categoría?')) return;

            let id = $(this).data('id');
            let url = "{{ route('categorias.destroy', ':id') }}".replace(':id', id);

            $.ajax({
                url: url,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    alert(response.success);
                    $('#categorias-table').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    alert('Error al eliminar la categoría.');
                }
            });
        });
    });
</script>

</body>
</html>