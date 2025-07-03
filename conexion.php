<?php
$cnx = new mysqli('localhost','sisowebc_sa','S1st3m@s011108*#','sisowebc_sisref');
if($cnx == false){
    echo "Ocurrió algo con la base de datos: ".$cnx->mysqli_error;
}


// Datos de conexión
$host = 'localhost';       // Dirección del servidor
$dbname = 'sisowebc_sisref';  // Nombre de tu base de datos
$user = 'sisowebc_sa';       // Usuario de la base de datos
$password = 'S1st3m@s011108*#'; // Contraseña del usuario

try {
    // Crear una nueva conexión usando PDO
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);

    // Configurar PDO para que muestre errores y excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Opción para usar el modo FETCH_ASSOC, que devolverá los resultados como arrays asociativos
    $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    // Si hay un error en la conexión, muestra un mensaje
    echo "Error de conexión: " . $e->getMessage();
    exit();
}

// $cnx = new mysqli('db5012736443.hosting-data.io','dbu142938','S1st3m@s011108*#','dbs10698956');
// if($cnx == false){
//     echo "Ocurrió algo con la base de datos: ".$cnx->mysqli_error;
// }
?>