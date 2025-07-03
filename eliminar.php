<?php
	include 'conexion.php';

	$id = $_GET['id_detalle_cotizacion'];
	if (isset($id)){
		
		$sql = "DELETE FROM detalle_cotizacion WHERE id_detalle_cotizacion = $id";
		$res = mysqli_query($cnx, $sql);
	    
	    if($res){
			header("location: ".$_SERVER['HTTP_REFERER']);
		}else{
			header('location: javascript:history.back(1)');
		}
	}
?>