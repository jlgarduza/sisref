<?php
session_start();
if(!$_SESSION['Usuario']){
    header("Location: login.php");
}
include 'consultas.php';
    // function generarCodigo($longitud) {
    //     $key = 'PRO0';
    //     //$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    //     $pattern = '1234567890';
    //     $max = strlen($pattern)-1;
    //     for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    //     return $key;
    // }
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
                                    <h5 class=""><a href="./proveedores.php" style="text-decoration: none; color: black;"><i class="fa fa-user"></i> Proveedores</a> / Nuevo Proveedor</h3>
                                    <!-- <button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>Nuevo</button> -->
                                </div>
                            </div>
                        </div>
                        <br />
                        <?php
                            include 'database.php';
                            $proveedor= new Database();
                            if(isset($_POST) && !empty($_POST)){
                                $codProveedor = $proveedor->sanitize($_POST['codproveedor']);
                                $nombre_empresa = $proveedor->sanitize($_POST['nombre_empresa']);
                                $calle_empresa = $proveedor->sanitize($_POST['calle_empresa']);
                                $colonia_empresa = $proveedor->sanitize($_POST['colonia_empresa']);
                                $municipio_empresa = $proveedor->sanitize($_POST['municipio_empresa']);
                                $ciudad_empresa = $proveedor->sanitize($_POST['ciudad_empresa']);
                                $pais_empresa = $proveedor->sanitize($_POST['pais_empresa']);
                                $cp_emprea = $proveedor->sanitize($_POST['cp_empresa']);
                                $telefono_empresa = $proveedor->sanitize($_POST['telefono_empresa']);
                                $sitioweb_empresa = $proveedor->sanitize($_POST['sitioweb_empresa']);
                                $nombre_contacto = $proveedor->sanitize($_POST['nombre_contacto']);
                                $apellido_contacto = $proveedor->sanitize($_POST['apellido_contacto']);
                                $correo_contacto = $proveedor->sanitize($_POST['correo_contacto']);
                                $telefono_contacto = $proveedor->sanitize($_POST['telefono_contacto']);
                                $agregado = $proveedor->sanitize(date('Y-m-d H:i:s'));
                                
                                $res = $proveedor->createprov($codProveedor,$nombre_empresa,$calle_empresa,$colonia_empresa,$municipio_empresa,$ciudad_empresa,$pais_empresa,$cp_emprea,$telefono_empresa,$sitioweb_empresa,$nombre_contacto,$apellido_contacto,$correo_contacto,$telefono_contacto,$agregado);
                                if($res){
                                    $message= "Datos insertados con éxito";
                                    $class="alert alert-success";
                                }else{
                                    $message="No se pudieron insertar los datos";
                                    $class="alert alert-danger";
                                }
                                
                        ?>
                            <div class="<?php echo $class?>">
                                <?php echo $message;?>
                            </div>	
                                <?php }	?>
                        <div class="">
                            <div class="card">
                                    <div class="card-header">
                                        Nuevo <strong>Proveedor</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="form-horizontal" id="">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">N° de Proveedor:</label>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input type="text" name="codproveedor" id="codproveedor" class='form-control' />
                                                </div>
                                            </div>
                                        <fieldset>
                                            <legend>Datos de Contacto</legend>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-1">
                                                    <label for="hf-email" class=" form-control-label">Nombre:</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" name="nombre_contacto" id="nombre_contacto" class='form-control' required >
                                                </div>
                                                <div class="col col-md-1">
                                                    <label for="hf-email" class=" form-control-label">Apellido:</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" name="apellido_contacto" id="apellido_contacto" class='form-control' required >
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="hf-email" class=" form-control-label">N° de Teléfono:</label>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input type="text" name="telefono_contacto" id="telefono_contacto" class='form-control' required >
                                                </div>
                                                <div class="col col-md-1">
                                                    <label for="hf-email" class=" form-control-label">Correo:</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="email" name="correo_contacto" id="correo_contacto" class='form-control' required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                
                                            </div>
                                        </fieldset>
                                        
                                        <fieldset>
                                            <legend>Datos de Empresa</legend>
                                            <div class="row form-group">
                                                <div class="col col-md-1">
                                                    <label for="hf-email" class=" form-control-label">Nombre:</label>
                                                </div>
                                                <div class="col-12 col-md-10">
                                                    <input type="text" name="nombre_empresa" id="nombre_empresa" class='form-control' required >
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-1">
                                                    <label for="hf-email" class=" form-control-label">Calle:</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <input type="text" name="calle_empresa" id="calle_empresa" class='form-control' required >
                                                </div>
                                                <div class="col col-md-1">
                                                    <label for="hf-email" class=" form-control-label">Colonia:</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" name="colonia_empresa" id="colonia_empresa" class='form-control' required >
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-1">
                                                    <label for="hf-email" class=" form-control-label">Municipio:</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <input type="text" name="municipio_empresa" id="municipio_empresa" class='form-control' required >
                                                </div>
                                                <div class="col col-md-1">
                                                    <label for="hf-email" class=" form-control-label">Ciudad:</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" name="ciudad_empresa" id="ciudad_empresa" class='form-control' required >
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-1">
                                                    <label for="hf-email" class=" form-control-label">País:</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <select name="pais_empresa" id="pais_empresa" class="form-control" required>
                                                        <option value=""></option>
                                                        <?php 
                                                            $pais = $cnx->query("SELECT * FROM paises"); 
                                                            while($vpais = mysqli_fetch_array($pais)){
                                                        ?>
                                                        <option value="<?php echo $vpais['nombre']; ?>"><?php echo utf8_encode($vpais['nombre']); ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col col-md-1">
                                                    <label for="hf-email" class=" form-control-label">Codigo Postal:</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" name="cp_empresa" id="cp_empresa" class='form-control'required >
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-1">
                                                    <label for="hf-email" class=" form-control-label">Telefono:</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <input type="text" name="telefono_empresa" id="telefono_empresa" class='form-control' required >
                                                </div>
                                                <div class="col col-md-1">
                                                    <label for="hf-email" class=" form-control-label">Sitio Web:</label>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="text" name="sitioweb_empresa" id="sitioweb_empresa" class='form-control' required >
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Guardar
                                        </button>
                                        <a href="proveedores.php" class="btn btn-danger btn-sm add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                                    </div>
                                        </form>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-lg-6">
                                <div class="au-card recent-report">
                                    <div class="au-card-inner">
                                        <h3 class="title-2">recent reports</h3>
                                        <div class="chart-info">
                                            <div class="chart-info__left">
                                                <div class="chart-note">
                                                    <span class="dot dot--blue"></span>
                                                    <span>products</span>
                                                </div>
                                                <div class="chart-note mr-0">
                                                    <span class="dot dot--green"></span>
                                                    <span>services</span>
                                                </div>
                                            </div>
                                            <div class="chart-info__right">
                                                <div class="chart-statis">
                                                    <span class="index incre">
                                                        <i class="zmdi zmdi-long-arrow-up"></i>25%</span>
                                                    <span class="label">products</span>
                                                </div>
                                                <div class="chart-statis mr-0">
                                                    <span class="index decre">
                                                        <i class="zmdi zmdi-long-arrow-down"></i>10%</span>
                                                    <span class="label">services</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="recent-report__chart">
                                            <canvas id="recent-rep-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card chart-percent-card">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 tm-b-5">char by %</h3>
                                        <div class="row no-gutters">
                                            <div class="col-xl-6">
                                                <div class="chart-note-wrap">
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--blue"></span>
                                                        <span>products</span>
                                                    </div>
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--red"></span>
                                                        <span>services</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="percent-chart">
                                                    <canvas id="percent-chart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        
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
