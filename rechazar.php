<?php
    session_start();
    if(!$_SESSION['Usuario']){
        header("Location: login.php");
    }

    include "conexion.php";
    date_default_timezone_set('America/Mexico_city');
    if ($_GET['numero_cotizacion']) {
        $usuario = $_SESSION['Usuario'];
        $session = $cnx->query("SELECT * FROM usuarios WHERE usuario = '$usuario'");
        $verSession = mysqli_fetch_object($session);

        $search = $cnx->query("SELECT numero_cotizacion, estado FROM cotizaciones WHERE numero_cotizacion = ".$_GET['numero_cotizacion']);
        $ver = mysqli_fetch_array($search);

        $fecha = date('Y-m-d H:i:s');
        $num = $ver['numero_cotizacion'];
        $ven = $verSession->nombre;
        $estado_anterior = $ver['estado'];
        $estado_nuevo = '2';
        //Guardamos en la tabla cotizacion_estado como historial
        $historial = $cnx->query("INSERT INTO cotizaciones_estado(estado_nuevo,numero_cotizacion,estado_anterior,quien_autorizo,cuando_autorizo) VALUES('$estado_nuevo','$num','$estado_anterior','$ven','$fecha')");

        if ($ver['estado'] == 1) {
            
            header("Location: cotizador_historial.php?no=error");

        }else{
            //Insertamos el cambio del estado de la cotizacion
            $sql = $cnx->query("UPDATE cotizaciones SET estado = '2' WHERE numero_cotizacion = ".$_GET['numero_cotizacion']);           
            
            header("Location: cotizador_historial.php?si=exito");
        }

    }

?>