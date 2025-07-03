<?php

include 'conexion.php';

if ($_POST['limpiarBDExistencia']) {
	$borrar = $cnx->query("UPDATE productos SET existencia = 0");
	header("Location: configuracion_inventario.php?si=exito");
}else{
	header("Localtion: configuracion_inventario.php?no=error");
}

if ($_POST['limpiarBDProductos']) {
	$borrar = $cnx->query("TRUNCATE TABLE productos");
	header("Location: configuracion_inventario.php?si=exito");
}else{
	header("Localtion: configuracion_inventario.php?no=error");
}

if ($_POST['limpiarBDEntradas']) {
	$borrar = $cnx->query("UPDATE productos SET entrada = 0");
	header("Location: configuracion_inventario.php?si=exito");
}else{
	header("Localtion: configuracion_inventario.php?no=error");
}

if ($_POST['limpiarBDSalidas']) {
	$borrar = $cnx->query("UPDATE productos SET salida = 0");
	header("Location: configuracion_inventario.php?si=exito");
}else{
	header("Localtion: configuracion_inventario.php?no=error");
}

?>