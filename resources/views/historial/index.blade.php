<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historiales</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>
    <h1>Historial de Estados</h1>

    <table id="historials-table" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Entidad</th>
                <th>ID Entidad</th>
                <th>Estado Anterior</th>
                <th>Estado Nuevo</th>
                <th>Fecha</th>
            </tr>
        </thead>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#historials-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('historials.index') }}",
                columns: [
                    { data: 'id_historial_estado', name: 'id_historial_estado' },
                    { data: 'id_usuario', name: 'id_usuario' },
                    { data: 'entidad_tipo', name: 'entidad_tipo' },
                    { data: 'entidad_id', name: 'entidad_id' },
                    { data: 'estado_anterior', name: 'estado_anterior' },
                    { data: 'estado_nuevo', name: 'estado_nuevo' },
                    { data: 'created_at', name: 'created_at' }
                ]
            });
        });
    </script>
</body>
</html>