<?php
    session_start();
    if(!$_SESSION['Usuario']){
        header("Location: login.php");
    }
    include 'consultas.php';
    if (isset($_GET['idCliente'])){
        $id=intval($_GET['idCliente']);
    } else {
        header("location:clientes.php");
    }
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
                                    <h5 class=""><a href="./clientes.php" style="text-decoration: none; color: black;"><i class="fa fa-users"></i> Clientes</a> / Edición Cliente</h5>
                                    <!-- <button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>Nuevo</button> -->
                                </div>
                            </div>
                        </div>
                        <br />
                        <?php
                            include 'database.php';
                            $clientes= new Database();
                            if(isset($_POST) && !empty($_POST)){
                                // $codCliente = $clientes->sanitize($_POST['codcliente']);
                                $nombre = $clientes->sanitize($_POST['nombre']);
                                $direccion = $clientes->sanitize($_POST['direccion']);
                                $numExt = $clientes->sanitize($_POST['numExt']);
                                $numInt = $clientes->sanitize($_POST['numInt']);
                                $pais = $clientes->sanitize($_POST['pais']);
                                $estado = $clientes->sanitize($_POST['estado']);
                                $municipio = $clientes->sanitize($_POST['municipio']);
                                $colonia = $clientes->sanitize($_POST['colonia']);
                                $codigopostal = $clientes->sanitize($_POST['cp']);
                                $telefono = $clientes->sanitize($_POST['telefono']);					
                                $correo_electronico = $clientes->sanitize($_POST['correo_electronico']);
                                $rfc = $clientes->sanitize($_POST['rfc']);
                                $razonsocial = $clientes->sanitize($_POST['rs']);
                                $usocfdi = $clientes->sanitize($_POST['usoCFDI']);
                                $id = intval($_POST['idcliente']);
                                
                                $res = $clientes->updatec($nombre,$direccion,$numInt,$numExt,$pais,$estado,$municipio,$colonia,$codigopostal,$telefono,$correo_electronico,$rfc,$razonsocial,$usocfdi,$id);
                                if($res){
                                    $message= "<script>Swal.fire({
                                                    icon: 'success',
                                                    title: 'Cliente dado de alta con éxito',
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                }).then(function() {
                                                    window.location = 'clientes.php';
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
                                                    window.location = 'clientes.php';
                                                })
                                                </script>";
                                    $class="alert alert-danger";
                                }                               
                        ?>
                                    <div><?php echo $message;?></div>
                                <?php
                                    }
                                    $datos_clientes = $clientes->single_recordc($id);
                                ?>
                        <div class="">
                            <div class="card">
                                    <div class="card-header">
                                        Edición <strong>Cliente</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="form-horizontal" id="">
                                        <fieldset>
                                            <legend>Datos de Contacto</legend>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">N° de Cliente:</label>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input type="text" name="codcliente" id="codcliente" class="form-control" value="<?php echo $datos_clientes->codCliente ?>" readonly>
                                                    <input type="hidden" name="idcliente" id="idcliente" class="form-control" value="<?php echo $datos_clientes->idCliente ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Nombre de contacto:</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <input type="text" name="nombre" id="nombre" class='form-control'value="<?php echo $datos_clientes->nombre_cliente ?>" >
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">N° de Teléfono:</label>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                <input type="text" name="telefono" id="telefono" class='form-control' value="<?php echo $datos_clientes->telefono ?>" >
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Correo Electrónico:</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                <input type="email" name="correo_electronico" id="correo_electronico" class='form-control' value="<?php echo $datos_clientes->correo_electronico ?>">
                                                </div>
                                            </div>
                                        </fieldset>
                                        <br />
                                        <fieldset>
                                            <legend>Datos de Empresa</legend>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">RFC:</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                <input type="text" name="rfc" id="rfc" class='form-control' value="<?php echo $datos_clientes->rfc ?>" >
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Razón Social:</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                <input type="text" name="rs" id="rs" class='form-control' value="<?php echo $datos_clientes->razon_social ?>" >
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Uso CFDI:</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                <select name="usoCFDI" id="usoCFDI" class="form-control" required>
                                                    <option value="<?php echo $datos_clientes->uso_cfdi ?>"><?php echo $datos_clientes->uso_cfdi ?></option>
                                                    <optgroup>
                                                    <?php 
                                                        $uso = $cnx->query("SELECT * FROM usocfdi"); 
                                                        while($vuso = mysqli_fetch_array($uso)){
                                                    ?>
                                                        <option value="<?php echo $vuso['codigo']; ?>"><?php echo $vuso['codigo'].' '.$vuso['descripcion']; ?></option>
                                                    </optgroup>
                                                    <?php } ?>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Dirección:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="direccion" id="direccion" class='form-control' value="<?php echo $datos_clientes->calle_cliente ?>" >
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">N° Exterior:</label>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <input type="text" name="numExt" id="numExt" class='form-control'  value="<?php echo $datos_clientes->no_exterior ?>" >
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">N° Interior:</label>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <input type="text" name="numInt" id="numInt" class='form-control' value="<?php echo $datos_clientes->no_interior ?>" >
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">País:</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <input type="text" name="pais" id="pais" class='form-control' value="<?php echo $datos_clientes->pais_cliente ?>" >
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Estado:</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <input type="text" name="estado" id="estado" class='form-control' value="<?php echo $datos_clientes->estado_cliente ?>" >
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Municipio:</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <input type="text" name="municipio" id="municipio" class='form-control' value="<?php echo $datos_clientes->municipio_cliente ?>" >
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Colonia:</label>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <input type="text" name="colonia" id="colonia" class='form-control' value="<?php echo $datos_clientes->colonia_cliente ?>" >
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Código Postal:</label>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <input type="text" name="cp" id="cp" class='form-control' value="<?php echo $datos_clientes->codigo_postal ?>" >
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Guardar
                                        </button>
                                        <a href="clientes.php" class="btn btn-danger btn-sm add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
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
