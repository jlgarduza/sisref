<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Consultar los accesos registrados
$sql = "SELECT a.id_acceso, u.usuario, a.fecha_acceso, a.ip_usuario, a.user_agent 
        FROM accesos a 
        JOIN usuarios u ON a.id_usuario = u.idUsuario
        ORDER BY a.fecha_acceso DESC";
$stmt = $conexion->prepare($sql);
$stmt->execute();

// Obtener los resultados
$accesos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accesos Registrados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 50px auto;
            max-width: 900px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
        }

        table thead {
            background-color: #343a40;
            color: #fff;
        }

        table thead th {
            padding: 12px;
            text-align: left;
        }

        table tbody td {
            padding: 12px;
            border-bottom: 1px solid #dee2e6;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tbody tr:hover {
            background-color: #e9ecef;
        }

        td {
            color: #333;
        }

        .container {
            border-radius: 8px;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th, 
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-bordered thead th {
            background-color: #495057;
        }

        th, td {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Accesos Registrados</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Acceso</th>
                    <th>Usuario</th>
                    <th>Fecha de Acceso</th>
                    <th>IP del Usuario</th>
                    <th>User Agent</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accesos as $acceso): ?>
                <tr>
                    <td><?php echo $acceso['id_acceso']; ?></td>
                    <td><?php echo $acceso['usuario']; ?></td>
                    <td><?php echo $acceso['fecha_acceso']; ?></td>
                    <td><?php echo $acceso['ip_usuario']; ?></td>
                    <td><?php echo $acceso['user_agent']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
