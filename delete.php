<?php

if (isset($_GET['idFabricante'])){
	include('database.php');
	$fab = new Database();
    $id=intval($_GET['idFabricante']);
    $res = $fab->deletef($id);
    
    if($res){
		header('location: ./fabricantes.php?exito=guardado');
	}else{
		//echo "Error al eliminar el registro";
		header('location: ./fabricantes.php?error=noguardado');
	}
}

if (isset($_GET['idProducto'])){
	include('database.php');
	$prod = new Database();
    $id=intval($_GET['idProducto']);
    $res = $prod->deletep($id);
    
    if($res){
		header('location: ./productos.php?exito=guardado');
	}else{
		//echo "Error al eliminar el registro";
		header('location: ./productos.php?error=noguardado');
	}
}

if (isset($_GET['idCliente'])){
	include('database.php');
	$prod = new Database();
    $id=intval($_GET['idCliente']);
    $res = $prod->deletec($id);
    
    if($res){
		header('location: ./clientes.php?exito=guardado');
	}else{
		//echo "Error al eliminar el registro";
		header('location: ./clientes.php?error=noguardado');
	}
}

if (isset($_GET['idUsuario'])){
	include('database.php');
	$prod = new Database();
    $id=intval($_GET['idUsuario']);
    $res = $prod->deleteUsr($id);
    
    if($res){
		header('location: ./usuarios.php?exito=guardado');
	}else{
		//echo "Error al eliminar el registro";
		header('location: ./usuarios.php?error=noguardado');
	}
}

if (isset($_GET['numero_cotizacion'])){
	include('database.php');
	$cotizacion = new Database();
    $id=intval($_GET['numero_cotizacion']);
    $res = $cotizacion->deletecot($id);
    
    if($res){
		header('location: ./cotizador_historial.php?exito=guardado');
	}else{
		header('location: ./cotizador_historial.php?error=noguardado');
	}
}

?>