<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reportes</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>
    <h1>Reportes Guardados</h1>

    <table id="reportes-table" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Visibilidad</th>
                <th>Fecha</th>
            </tr>
        </thead>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#reportes-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('reportes.index') }}",
                columns: [
                    { data: 'id_reporte_guardado', name: 'id_reporte_guardado' },
                    { data: 'id_usuario', name: 'id_usuario' },
                    { data: 'nombre', name: 'nombre' },
                    { data: 'tipo', name: 'tipo' },
                    { data: 'visibilidad', name: 'visibilidad' },
                    { data: 'created_at', name: 'created_at' }
                ]
            });
        });
    </script>
</body>
</html>
