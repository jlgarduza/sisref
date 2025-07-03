<?php
    include 'conexion.php';
    
    if($_POST['guardarEdicion']){
        $id = $_POST["id"];
        $descripcion = $_POST["descripcion"];
        $precioCompra = $_POST["precioCompra"];
        $precioVenta = $_POST["precioVenta"];
        //$existencia = $_POST['existencia'];
                                            
        $sentencia = $cnx->query("UPDATE productos SET descripcion = $descripcion, precio_compra = $precioCompra, precio_venta = $precioVenta, WHERE idProducto = $id");

        if(!$sentencia){
            header("Location: ./productos.php?no=error");
        }else{
            header("Location: ./productos.php?si=guardado");
            exit;
        }
    }
?>