<?php
    session_start();
    if(!$_SESSION['Usuario']){
        header("Location: login.php");
    }
    include 'conexion.php';
    include 'consultas.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de control de inventario y cotizador en línea">
    <meta name="author" content="JL Sistemas & Soluciones Web">
    <meta name="keywords" content="Sistemas web, sistemas para refaccionarias, refaccionarias, despachos, aplicaciones web">
    <link rel="shourt icon" type="img/png" href="images/icon/logosmall.png">

    <!-- Title Page-->
    <title>SISREF - Sistema de Refaccionaria</title>

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
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
    
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
                            <!-- <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form> -->
                            <div></div>
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
                                    <h2 class="title-1"><i class="fa fa-file"></i> Cotizaciones</h2>
                                    <button class="btn btn-primary btn-sm" onclick="location.href='cotizador.php';">
                                        <i class="zmdi zmdi-plus"></i> Nueva Cotización</button>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Buscar</span>
                            </div>
                            <input id="FiltrarContenido" type="text" class="form-control" placeholder="Ingresa la cotizacion" aria-label="Alumno" aria-describedby="basic-addon1">
                        </div>
                        
                        <div class="table-responsive">
                            <!-- DATA TABLE-->
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

                                if(isset($_GET['si'])){

                                    echo '<div class="alert alert-success alert-dismissible" role="alert">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Guardado!</strong>
                                    </div>';
                                }
                                if(isset($_GET['no'])){

                                    echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>No guardado!</strong>
                                        </div>';
                                }
                              
                            
                                $sql = mysqli_query($cnx, "SELECT cotizaciones.id_cotizacion, cotizaciones.estado, cotizaciones.numero_cotizacion, cotizaciones.fecha_cotizacion, clientes.razon_social, detalle_cotizacion.id_producto, detalle_cotizacion.cantidad, detalle_cotizacion.precio_venta * detalle_cotizacion.cantidad as precio, detalle_cotizacion.precio_venta*.16 as IVA, cotizaciones.vendedor FROM cotizaciones, detalle_cotizacion, clientes WHERE cotizaciones.numero_cotizacion = detalle_cotizacion.numero_cotizacion AND cotizaciones.atencion = clientes.razon_social GROUP BY cotizaciones.numero_cotizacion");
                                // $sql = $cnx->query("SELECT c.id_cotizacion, c.numero_cotizacion, c.fecha_cotizacion, c.vendedor, c.estado, cl.razon_social, dc.id_producto, dc.cantidad, dc.precio_venta FROM cotizaciones c, detalle_cotizacion dc, clientes cl WHERE c.numero_cotizacion = dc.numero_cotizacion AND c.atencion = cl.razon_social GROUP BY c.numero_cotizacion");
                            ?>  
                            <table class="table table-bordered table-striped">  
                                <thead class="table-dark" style="font-size:12px">  
                                    <tr>
                                        <th width="10%">Cot N°</th>  
                                        <th width="30%">Cliente</th>  
                                        <th width="10%">Fecha</th>
                                        <!-- <th>Vendedor</th> -->
                                        <!-- <th>Neto</th>
                                        <th>IVA</th> -->
                                        <th width="15%">Estado</th>
                                        <th width="10%">Total</th>
                                        <th width="35%" colspan=3 style="text-align:center">Acciones</th>
                                    </tr>  
                                <thead>  
                                <tbody class="BusquedaRapida" style="font-size:10px">  
                                    <?php  
                                        while($row = mysqli_fetch_object($sql)) {
                                    ?>  
                                    <tr>
                                        <td><?php echo $row->numero_cotizacion; ?></td>
                                        <td><?php echo $row->razon_social; ?></td>
                                        <td><?php $date = date_create($row->fecha_cotizacion); echo date_format($date, 'd-m-Y'); ?></td>
                                        <?php $vendedor = $cnx->query("SELECT * FROM usuarios WHERE idUsuario = '".$row->vendedor."'"); $vervendedor = mysqli_fetch_object($vendedor); ?>
                                        <!-- <td><?php echo $vervendedor->nombre; ?></td> -->
                                        <!-- <td>$ <?php echo number_format($neto = $row->precio,2,'.','.'); ?></td>
                                        <td>$ <?php echo number_format($iva = $row->IVA,2,'.','.'); ?></td> -->
                                        <td>
                                            <?php
                                                if ($row->estado==0){echo '<span class="alert alert-warning"><i class="fa fa-exclamation"></i> Pendiente</span>';}
                                                elseif ($row->estado==1){echo '<span class="alert alert-success"><i class="fa fa-check-circle"></i> Autorizada</span>';}
                                                elseif ($row->estado==2){echo '<span class="alert alert-danger"><i class="fa fa-times-circle"></i> Rechazada</span>';}
                                            ?>
                                        </td>
                                        <td>$ <?php echo number_format($neto+$iva,2,'.','.'); ?></td>
                                        <td style="text-align:center">
                                            <?php if ($row->estado == 0){ ?>
                                            <a href="autorizar.php?numero_cotizacion=<?php echo $row->numero_cotizacion ?>" class="btn btn-success btn-sm" title="Autorizada"><i class="fa fa-check-circle"></i></a>
                                            <a href="rechazar.php?numero_cotizacion=<?php echo $row->numero_cotizacion ?>" class="btn btn-danger btn-sm" title="Rechazada"><i class="fa fa-times-circle"></i></a>
                                            <?php }else{} ?>
                                            <a href="editar_cotizacion.php?id_cotizacion=<?php echo $row->id_cotizacion ?>" class="btn btn-info btn-sm" title="Ver Detalles"><i class="fa fa-edit"></i></a>
                                            <!-- <a href="cotizador_detalle_historial.php?numero_cotizacion=<?php echo $row->numero_cotizacion ?>" class="btn btn-info btn-sm" title="Ver Detalles"><i class="fa fa-edit"></i></a> -->
                                            <a href="#" class="btn btn-primary btn-sm" onclick="imprimir_factura('<?php echo $row->id_cotizacion ?>');" title="Imprimir PDF"><i class="fa fa-print"></i></a>
                                        </td>
                                    </tr>  
                                    <?php  
                                        }
                                    ?>  
                                </tbody>  
                            </table>
                            <!-- END DATA TABLE-->
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © <?php echo date('Y') ?> JL Sistemas & Soluciones Web.</p>
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
    
    <script type="text/javascript" src="js/VentanaCentrada.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
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
