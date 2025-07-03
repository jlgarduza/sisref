<?php
session_start();
setlocale(LC_MONETARY, 'en_US.UTF-8');
if(!$_SESSION['Usuario']){
    header("Location: login.php");
}
include 'consultas.php';
if (isset($_GET['numero_cotizacion'])){
    $id=intval($_GET['numero_cotizacion']);
} else {
    header("location:cotizador_historial.php");
}
?>
<?php
                                            // $sumador_total=0;
                                            // $sql = $cnx->query("SELECT c.numero_cotizacion, dc.cantidad, p.codigo, p.descripcion, dc.precio_venta
                                            // FROM productos p, cotizaciones c, detalle_cotizacion dc 
                                            // WHERE dc.numero_cotizacion = $id AND dc.id_producto = p.idProducto
                                            // GROUP BY dc.numero_cotizacion ORDER BY dc.numero_cotizacion ASC");
// $sql = $cnx->query("SELECT dc.id_detalle_cotizacion, dc.numero_cotizacion, p.codigo, p.descripcion, dc.cantidad, dc.precio_venta FROM detalle_cotizacion dc, productos p WHERE numero_cotizacion = $id AND p.idProducto = dc.id_producto");
$sql = $cnx->query("SELECT dc.id_detalle_cotizacion, cl.nombre_cliente, cl.telefono, cl.correo_electronico, 
dc.numero_cotizacion, p.codigo, p.descripcion, dc.cantidad, dc.precio_venta, co.condiciones, co.fecha_cotizacion
FROM detalle_cotizacion dc, productos p, cotizaciones co, clientes cl
WHERE dc.numero_cotizacion = $id AND p.idProducto = dc.id_producto AND co.atencion = cl.nombre_cliente");
    while($row = mysqli_fetch_array($sql)){ 
        $id_detalle_cotizacion = $row['id_detalle_cotizacion'];
        $nombre_cliente = $row['nombre_cliente'];
        $telefono_cliente = $row['telefono'];
        $email_cliente = $row['correo_electronico'];
        $codProducto = $row["codigo"];
        $cantidad = $row["cantidad"];
        $descripcion = $row['descripcion'];
        $fecha_cotizacion = $row['fecha_cotizacion'];
        $condiciones = $row['condiciones'];
        $precio_venta=$row['precio_venta'];
        $precio_subtotal=$precio_venta*$cantidad;
        @$precio_neto+=$precio_subtotal;
        $precio_neto_f=number_format($precio_neto,2);//Precio total formateado
        // $precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
        // $sumador_total+=$precio_total_r;//Sumador
}
$detalle = "SELECT * FROM cotizaciones";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <link rel="shourt icon" type="img/png" href="images/icon/logosmall.png">

    <!-- Title Page-->
    <title>SISREF v2</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

    <script src="http://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script language="JavaScript">
        function confirmar(mensaje) {
            return confirm('mensaje');
        }
    </script>
    
</head>

<body class="">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include 'navbar.php'; ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/892795.png" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $verusuario['nombre']?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/892795.png" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $verusuario['nombre']?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $verusuario['correo']?></span>
                                                </div>
                                            </div>
                                            <!-- <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div> -->
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Cerrar Sesión</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Detalle de la cotizacion #: <?php echo $id ?></h2>
                                    <!-- <button class="au-btn au-btn-icon au-btn--blue" onclick="location.href='producto_nuevo.php';">
                                        <i class="zmdi zmdi-plus"></i>Nuevo</button> -->
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="input-group mb-3">
                            <?php
                                if(isset($_GET['exito'])){

                                    echo '<div class="alert alert-success alert-dismissible" role="alert">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong> <label>Cotización eliminada!</label></strong>
                                    </div>';
                                }
                                if(isset($_GET['error'])){

                                    echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Error! </strong> <label>cotizacion no eliminado!</label>
                                    </div>';
                                }
                            ?>
                        </div>
                        <div class="row m-t-25">
                            <div class="table-responsive">
                            <form class="form-horizontal" role="form" id="datos_factura">
                                <div class="form-group row">
                                <label for="nombre_cliente" class="col-md-1 control-label">Cliente</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control input-sm" id="nombre_cliente" placeholder="Selecciona un cliente" required value="<?php echo $nombre_cliente;?>">
                                    <input id="id_cliente" name="id_cliente" type='hidden' value="<?php echo $id_cliente;?>">	
                                </div>
                                <label for="tel1" class="col-md-1 control-label">Teléfono</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control input-sm" id="tel1" placeholder="Teléfono" value="<?php echo $telefono_cliente;?>" readonly>
                                            </div>
                                    <label for="mail" class="col-md-1 control-label">Email</label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control input-sm" id="mail" placeholder="Email" readonly value="<?php echo $email_cliente;?>">
                                            </div>
                                </div>
                                <div class="form-group row">
                                <label for="empresa" class="col-md-1 control-label">Vendedor</label>
                                <div class="col-md-3">
                                    <select class="form-control input-sm" id="id_vendedor" name="id_vendedor">
                                        <?php
                                            $sql_vendedor=mysqli_query($cnx,"SELECT * FROM usuarios ORDER BY nombre");
                                            while ($rw=mysqli_fetch_array($sql_vendedor)){
                                                $id_vendedor=$rw["idUsuario"];
                                                $nombre_vendedor=$rw["nombre"];
                                                if ($id_vendedor==$id_vendedor_db){
                                                    $selected="selected";
                                                } else {
                                                    $selected="";
                                                }
                                                ?>
                                                <option value="<?php echo $id_vendedor?>" <?php echo $selected;?>><?php echo $nombre_vendedor?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                    <label for="tel2" class="col-md-1 control-label">Fecha</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control input-sm" id="fecha" value="<?php echo $fecha_cotizacion;?>" readonly>
                                    </div>
                                    <label for="email" class="col-md-1 control-label">Pago</label>
                                    <div class="col-md-3">
                                        <select class='form-control input-sm ' id="condiciones" name="condiciones">
                                            <option value="1" <?php if ($condiciones==1){echo "selected";}?>>Efectivo</option>
                                            <option value="2" <?php if ($condiciones==2){echo "selected";}?>>Cheque</option>
                                            <option value="3" <?php if ($condiciones==3){echo "selected";}?>>Transferencia bancaria</option>
                                            <option value="4" <?php if ($condiciones==4){echo "selected";}?>>Crédito</option>
                                        </select>
                                    </div>
                                    <!-- <div class="col-md-2">
                                        <select class='form-control input-sm ' id="estado_factura" name="estado_factura">
                                            <option value="1" <?php if ($estado_factura==1){echo "selected";}?>>Pagado</option>
                                            <option value="2" <?php if ($estado_factura==2){echo "selected";}?>>Pendiente</option>
                                        </select>
                                    </div> -->
                                </div>
				                    <div class="col-md-12">
                                        <div class="pull-right">
                                            <button type="submit" class="btn btn-default">
                                                <span class="glyphicon glyphicon-refresh"></span> Actualizar datos
                                            </button>
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoProducto">
                                                <span class="glyphicon glyphicon-plus"></span> Nuevo producto
                                            </button>
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">
                                                <span class="glyphicon glyphicon-user"></span> Nuevo cliente
                                            </button>
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                                                <span class="glyphicon glyphicon-search"></span> Agregar productos
                                            </button>
                                            <button type="button" class="btn btn-default" onclick="imprimir_factura('<?php echo $id_factura;?>')">
                                                <span class="glyphicon glyphicon-print"></span> Imprimir
                                            </button>
                                        </div>	
                                    </div>
                                </form>	
                                <div class="clearfix"></div>
                                <div class="editar_factura" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->	
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 JL Sistemas.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
    <script>
        function Calcular () {
            
            var cantidad = $('#tasa').val();  //Capturamos los valores por el id
            var precio = $('#precio_neto').text();
            //$("#iva").val(cantidad);
            var importe = precio*cantidad;
            // $('#respuesta').html(importe.toFixed(2));
            
            var iva = importe-precio;
            
            // $('#iva').html(iva.toFixed(2));
            
            if (iva > 0.00) {
                $('#respuesta').html(importe.toFixed(2));
                $('#iva').html(iva.toFixed(2));
            }else{
                $('#respuesta').html(precio.toFixed(2));
            }
            //$('#respuesta').html(parseFloat(importe));
        }
        
    </script>
    
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/vendor/popper.min.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <script src="js/editar_factura.js"></script>

</body>

</html>
<!-- end document-->
