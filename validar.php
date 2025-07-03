<?php
session_start();
include 'conexion.php'; // Conexión a la base de datos
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de Usuarios</title>
    <!-- Alertas -->
    <link href="dist/sweetalert2.css" rel="stylesheet">
    <script src="dist/sweetalert2.js"></script>
</head>
<body>
    
<?php
// if (isset($_POST['login'])) {
    $nombre = $_POST['txtNombre'];
    $correo = $_POST['txtCorreo'];
    $usuario = $_POST['txtUsuario'];
    $password = $_POST['txtPassword'];

    // Consultar si el usuario existe
    $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND contrasena = :password";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        // Usuario autenticado
        $usuario = $stmt->fetch();
        $_SESSION['Usuario'] = $usuario['usuario'];

        // Guardar el acceso
        $id_usuario = $usuario['idUsuario'];
        $ip_usuario = $_SERVER['REMOTE_ADDR']; // Obtener IP del usuario
        $user_agent = $_SERVER['HTTP_USER_AGENT']; // Obtener user agent
        $fecha_acceso = date('Y-m-d H:i:s');

        $sql_acceso = "INSERT INTO accesos (nombre, correo, id_usuario, fecha_acceso, ip_usuario, user_agent)
                       VALUES (:nombre, :correo, :id_usuario, :fecha_acceso, :ip_usuario, :user_agent)";
        $stmt_acceso = $conexion->prepare($sql_acceso);
        $stmt_acceso->bindParam(':nombre', $nombre);
        $stmt_acceso->bindParam(':correo', $correo);
        $stmt_acceso->bindParam(':id_usuario', $id_usuario);
        $stmt_acceso->bindParam(':fecha_acceso', $fecha_acceso);
        $stmt_acceso->bindParam(':ip_usuario', $ip_usuario);
        $stmt_acceso->bindParam(':user_agent', $user_agent);
        $stmt_acceso->execute();

        // Redirigir al sistema
        // header("Location: index.php");
        echo "<script>Swal.fire({
                icon: 'success',
                title: 'Bienvenido $nombre',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location = 'index.php';
            })
            </script>";
    } else {
        echo "<script>Swal.fire({
                icon: 'error',
                title: 'Usuario y/o Contraseña incorrecto.',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location = './';
            })
            </script>";
    }
// }
?>
</body>
</html>