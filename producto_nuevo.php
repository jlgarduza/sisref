<?php
session_start();
if(!$_SESSION['Usuario']){
    header("Location: login.php");
}
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

    <!-- Alertas -->
    <link href="dist/sweetalert2.css" rel="stylesheet">
    <script src="dist/sweetalert2.js"></script>

</head>

<body class="">
    <div class="page-wrapper">
        <?php include 'navbar.php'; ?>

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
                                    <h5 class=""><a href="./productos.php" style="text-decoration: none; color: black;"><i class="fa fa-cubes"></i> Productos</a> / Nuevo Producto</h5>
                                    <!-- <button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>Nuevo</button> -->
                                </div>
                            </div>
                        </div>
                        <br />
                        <?php
                            include 'database.php';
                            $producto= new Database();
                            date_default_timezone_set('America/Mexico_city');
                            if(isset($_POST) && !empty($_POST)){
                                $codigo = $producto->sanitize($_POST['codigo']);
                                $fabricante = $producto->sanitize($_POST['fabricante']);
                                $descripcion = $producto->sanitize($_POST['descripcion']);
                                $precio_compra = $producto->sanitize($_POST['precioCompra']);
                                $precio_venta = $producto->sanitize($_POST['precioVenta']);
                                $existencia = $producto->sanitize($_POST['existencia']);
                                $creacion = $producto->sanitize(date('Y-m-d H:i:s'));
                                
                                $res = $producto->createp($codigo,$fabricante,$descripcion,$precio_compra,$precio_venta,$existencia,$creacion);
                                if($res){
                                    $message= "<script>Swal.fire({
                                                    icon: 'success',
                                                    title: 'Producto dado de alta con éxito',
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                }).then(function() {
                                                    window.location = 'productos.php';
                                                })
                                                </script>";
                                    $class="alert alert-success";
                                }else{
                                    $message="<script>Swal.fire({
                                                    icon: 'error',
                                                    title: 'Error al capturar los datos',
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                }).then(function() {
                                                    window.location = 'productos.php';
                                                })
                                                </script>";
                                    $class="alert alert-danger";
                                }
                                
                        ?>
                                    <div><?php echo $message;?></div>	
                                <?php }	?>
                        <div class="">
                            <div class="card">
                                    <div class="card-header">
                                        Nuevo <strong>Producto</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="form-horizontal" id="">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Código:</label>
                                                        <input type="text" name="codigo" id="codigo" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="row col-md-12">
                                                    <div class="col-md-4">
                                                        <label for="hf-password" class="form-control-label">Fabricante</label>
                                                        <select name="fabricante" id="fabricante" class="form-control" required>
                                                            <option value=""></option>
                                                            <?php 
                                                                $fab = $cnx->query("SELECT * FROM fabricante"); 
                                                                while($vfab = mysqli_fetch_array($fab)){
                                                            ?>
                                                            <option value="<?php echo $vfab['fabricante']; ?>"><?php echo $vfab['fabricante']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="hf-email" class=" form-control-label">Nombre del prodcuto</label>
                                                        <input type="text" name="descripcion" id="descripcion" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="row col-md-12">
                                                    <div class="col-md-4">
                                                        <label for="hf-email" class=" form-control-label">Precio Compra</label>
                                                        <input type="text" id="precioCompra" name="precioCompra" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="hf-email" class=" form-control-label">Precio Venta</label>
                                                        <input type="text" id="precioVenta" name="precioVenta" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="hf-email" class=" form-control-label">Stock Inicial</label>
                                                        <input type="text" id="existencia" name="existencia" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-save"></i> Guardar Producto
                                        </button>
                                        <a href="productos.php" class="btn btn-danger btn-sm add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                                    </div>
                                        </form>
                            </div>
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

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
