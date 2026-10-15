<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Auditorías</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>
    <h1>Registro de Auditorías</h1>

    <table id="auditorias-table" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Evento</th>
                <th>Entidad</th>
                <th>ID Entidad</th>
                <th>Fecha</th>
            </tr>
        </thead>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#auditorias-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('auditorias.index') }}",
                columns: [
                    { data: 'id_auditoria', name: 'id_auditoria' },
                    { data: 'id_usuario', name: 'id_usuario' },
                    { data: 'evento', name: 'evento' },
                    { data: 'entidad_tipo', name: 'entidad_tipo' },
                    { data: 'entidad_id', name: 'entidad_id' },
                    { data: 'created_at', name: 'created_at' }
                ]
            });
        });
    </script>
</body>
</html>