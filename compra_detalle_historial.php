<?php
session_start();
setlocale(LC_MONETARY, 'en_US.UTF-8');
if(!$_SESSION['Usuario']){
    header("Location: login.php");
}
include 'consultas.php';
if (isset($_GET['num_orden'])){
    $id=intval($_GET['num_orden']);
} else {
    header("location:compra_historial.php");
}
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

<body class="animsition">
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
                                    <h2 class="title-1">Detalle de la compra #: <?php echo $id ?></h2>
                                    <!-- <button class="au-btn au-btn-icon au-btn--blue" onclick="location.href='producto_nuevo.php';">
                                        <i class="zmdi zmdi-plus"></i>Nuevo</button> -->
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="input-group mb-3">
                            <!-- <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Proveedor: </span>
                            </div>
                            <?php
                                $proveedor = $cnx->query("SELECT proveedores.nombre_empresa
                                FROM detalle_compras, proveedores, compras
                                WHERE detalle_compras.num_orden = $id AND compras.proveedor = proveedores.codProveedor
                                GROUP BY compras.num_orden");
                                $verproveedor = mysqli_fetch_array($proveedor);
                            ?>
                            <span class="input-group-text alert-info" id="basic-addon1"><?php echo $verproveedor['nombre_empresa']?></span> -->
                        </div>
                        <div class="row m-t-25">
                            <div class="table-responsive">
                                <table style="font-size:12px" class="table">
                                    <thead>
                                        <tr>
                                            <th>CODIGO</th>
                                            <th class="text-center">CANT.</th>
                                            <th>DESCRIPCION</th>
                                            <th><span class="pull-right">PRECIO UNIT.</span></th>
                                            <th><span class="pull-right">PRECIO TOTAL</span></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                            // $sumador_total=0;
                                            $sql = $cnx->query("SELECT compras.proveedor, productos.codigo, productos.descripcion, detalle_compras.num_orden, detalle_compras.cantidad, detalle_compras.precio_venta, detalle_compras.precio_venta as total
                                            FROM detalle_compras, productos, compras
                                            WHERE detalle_compras.num_orden = $id AND detalle_compras.id_producto = productos.idProducto 
                                            GROUP BY detalle_compras.id_producto");
                                            while($row = mysqli_fetch_array($sql)){ 
                                                $id = $row["num_orden"];
                                                $cantidad = $row["cantidad"];
                                                $descripcion = $row['descripcion'];
                                                $proveedor = $row['proveedor'];

                                                $precio_venta=$row['precio_venta'];
                                                $precio_subtotal=$precio_venta*$cantidad;
                                                @$precio_neto+=$precio_subtotal;
                                                $precio_neto_f=number_format($precio_neto,2);//Precio total formateado
                                                // $precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
                                                // $sumador_total+=$precio_total_r;//Sumador
                                        ?>

                                        <tr>
                                            <td><?php echo $id; ?></td>
                                            <td class="text-center"><?php echo $cantidad; ?></td>
                                            <td><?php echo $descripcion; ?></td>
                                            <td><span class="pull-right"><?php echo $precio_venta; ?></span></td>
                                            <td id="precio_subtotal"><span class="pull-right"><?php echo $precio_subtotal; ?></span></td>
                                            <td><span class="pull-right"><a href="#" onclick="eliminar('2566')"><i class="fas fa-trash"></i></a></span></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <td colspan="4"><span class="pull-right"><b>NETO $</b></span></td>
                                            <td id="precio_neto"><span class="pull-right"><?php echo number_format($precio_neto,2); ?></span></td>
                                        </tr>
                                        <!-- <tr>
                                            <td colspan="4" class="text-right">
                                                <select name="tasa" id="tasa" onchange="Calcular()">
                                                    <option value="1.16">IVA 16%</option>
                                                    <option value="0.00" selected="">IVA 0%</option>			
                                                </select>
                                            </td>
                                            <td class="pull-right"><div id="iva"></div></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"><span class="pull-right">TOTAL $</span></td>
                                            <td><span class="pull-right"><div id="respuesta"></div></span></td>
                                            <td></td>
                                        </tr> -->
                                    </tbody>
                                </table>
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

</body>

</html>
<!-- end document-->
