<?php
session_start();
if(!$_SESSION['Usuario']){
    header("Location: login.php");
}
include 'consultas.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de control de inventario y cotizador en línea">
    <meta name="author" content="Jorge garduza">
    <meta name="keywords" content="Sistemas web, sistemas para refaccionarias, refaccionarias, despachos, aplicaciones web">
    <link rel="shourt icon" type="img/png" href="images/icon/logosmall.png">

    <!-- Title Page-->
    <title>SISINV - Sistema de Inventario</title>

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
    <script type="text/javascript">
    $(document).ready(function () {
    (function($) {
        $('#FiltrarContenido').keyup(function () {
                var ValorBusqueda = new RegExp($(this).val(), 'i');
                $('.BusquedaRapida tr').hide();
                $('.BusquedaRapida tr').filter(function () {
                    return ValorBusqueda.test($(this).text());
                }).show();
                    })
        }(jQuery));
    });
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
                                <!-- <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button> -->
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
                            <div class="col-md-5">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Entrada Inventario</h2>
                                </div>
                                <!-- <button class="btn btn-primary btn-sm" onclick="location.href='producto_nuevo.php';"><i class="zmdi zmdi-plus"></i> Nuevo</button>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#miModal"><i class="fa fa-upload"></i> Importar</button> -->
                            </div>
                        </div>
                        
                        <div class="row">
                            <form  method="POST" class="form-horizontal" action="">
                                <div class="form-group">    
                                    <label for="codigo">Codigo del Producto</label>
                                    <input type="text" class="form-control" name="codigo" autofocus >
                                   
                                    <label for="entrada">Cant. Entrada</label>
                                    <input type="text" class="form-control" name="entrada" >
                                </div>
                                <input type="submit" name="ingresar" value="Ingresar Entrada" class="btn btn-primary">
                            </form>
                        </div>

                        <?php
                                include 'conexion.php';
                                date_default_timezone_set('America/Mexico_city');
                                if (@$_POST['ingresar']) {
                                    $tblProductos = "productos";
                                    $tblMovimientos = "movimientos";
                                    $colname = "codigo";
                                    $postcodigo = $_POST['codigo'];
                                    $postentrada = $_POST['entrada'];
                                    $operacion = "entrada";
                                    $fecha = date('Y-m-d H:i:s');
                                    $usuario = $verusuario['nombre'];
                                    $creado = $usuario;

                                    //Insertamos el registro en la tabla movimientos
                                    $insertarMovimiento = $cnx->query("INSERT INTO movimientos(idCodigoProducto,Cantidad,TipoOperacion,Creado,FechaCreado) VALUES('$postcodigo','$postentrada','$operacion','$creado','$fecha')");
                                    
                                    //Seleccionamos el ultimo movimiento
                                    $Movimientos = $cnx->query("SELECT * FROM movimientos ORDER BY idMovimiento DESC LIMIT 1");
                                    $verMovimientos = mysqli_fetch_array($Movimientos);
                                    $cantidad = $verMovimientos['Cantidad'];
                                    
                                    //Seleccionamos la existencia real del listado de productos
                                    $productos = $cnx->query("SELECT * FROM $tblProductos WHERE $colname = $postcodigo ");
                                    $vproductos = mysqli_fetch_array($productos);
                                    $ExistenciaProducto = $vproductos['existencia'];

                                    $total_existencia = $cantidad+$ExistenciaProducto;
                                    
                                    $actualizarEntrada = $cnx->query("UPDATE ".$tblProductos." SET existencia = ".$total_existencia." WHERE ".$colname." = ".$postcodigo."");
                                    if ($actualizarEntrada) {
                                        echo '<label class="alert alert-success"><strong>Exito!</strong> Entrada registrada!!!</label>';
                                    }else{
                                        echo '<label class="alert alert-danger"><strong>Error!</strong> Entrada no registrada!!!</label>';
                                    }
                                }
                            ?>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 JL Sistemas & Soluciones Web.</p>
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

    <!-- The Modal -->
    <div class="modal" id="miModal">
        <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Importar productos</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <form action="productos_importar.php" class="form-horizontal" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="file" name="file" id="file" accept=".xls,.xlsx" class="form-control">
                        </div>
                        <div class="col-md-12 pull-right">
                            <hr>
                            <button type="submit" id="submit" name="import" class="btn btn-success btn-sm">Importar Registros</button>
                        </div>
                    </div>
                </form>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <div align="left"><a href="layout_productos.xlsx" style="text-decoration:none;"><i class="fa fa-file-excel-o"></i> Descarga layout de productos</a></div>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
            
        </div>
        </div>
    </div>

    <!-- <div class="modal" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Importar productos</h4>
                </div>
                <div class="modal-body">
                    <form action="productos_importar.php" class="form-horizontal" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" accept=".xls,.xlsx" class="form-control-file">
                            </div>
                            <div class="col-md-12 pull-right">
                                <hr>
                                <button type="submit" id="submit" name="import" class="btn-success">Importar Registros</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div align="right"><a href="layout_productos.xlsx" style="text-decoration:none;"><i class="fa fa-file-excel-o"></i> Descarga layout de productos</a></div>
                </div>
            </div>
        </div>
    </div> -->

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

</body>

</html>
<!-- end document-->
