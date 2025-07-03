<?php

include 'conexion.php';

//Consulta usuarios
$usuario = $cnx->query("SELECT * FROM usuarios WHERE usuario = '$_SESSION[Usuario]'");
$verusuario = mysqli_fetch_array($usuario);

//Consulta datos
$clientes = $cnx->query("SELECT COUNT(*) FROM clientes");
$verclientes = mysqli_fetch_row($clientes);

//Consulta inventario
$inventario = $cnx->query("SELECT COUNT(*) FROM productos");
$verinventario = mysqli_fetch_row($inventario);

//Consulta cotizaciones
$cotizaciones = $cnx->query("SELECT COUNT(*) FROM cotizaciones");
$vercotizaciones = mysqli_fetch_row($cotizaciones);

//Consulta productos
$productos = $cnx->query("SELECT * FROM productos");

//Consulta compras
$compras = $cnx->query("SELECT COUNT(*) FROM compras");
$vercompras = mysqli_fetch_row($compras);

//Consulta perfil
$perfil = $cnx->query("SELECT * FROM perfil");
// $verperfil = mysqli_fetch_array($perfil);

?>