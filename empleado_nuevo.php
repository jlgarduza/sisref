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
    <title>SISREF - Sistema para Refaccionaria</title>

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
                            <div class="col-md-6">
                                <div class="overview-wrap">
                                    <h2 class="title-1"><a href="empleados.php">Empleados</a> -> Nuevo Empleado</h2>
                                </div>
                                <!-- <button class="btn btn-primary btn-sm" onclick="location.href='producto_nuevo.php';"><i class="zmdi zmdi-plus"></i> Nuevo</button> -->
                                <!-- <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#miModal"><i class="fa fa-upload"></i> Importar</button> -->
                            </div>
                        </div>
                        <br/>
                        <?php
                            include 'database.php';
                            $usr = new Database();
                            date_default_timezone_set('America/Mexico_city');
                            if(isset($_POST) && !empty($_POST)){
                                $nombre = $usr->sanitize($_POST['nombre']);
                                $usuario = $usr->sanitize($_POST['usuario']);
                                $correo = $usr->sanitize($_POST['email']);
                                $grupo = $usr->sanitize($_POST['grupo']);
                                $estado = $usr->sanitize($_POST['estado']);
                                $contrasena = $usr->sanitize($_POST['contrasena']);
                                $fecha = $usr->sanitize(date('Y-m-d H:i:s'));
                                
                                $res = $usr->createUsr($nombre,$usuario,$correo,$grupo,$estado,$contrasena,$fecha);
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
                                <?php } ?>
                        <div class="table-responsive">
                            <div class="card">
                                    <div class="card-header">
                                        Nuevo <strong>Empleado</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="form-horizontal" id="">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Nombre:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="nombre" name="nombre" placeholder="ingresa nombre" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Apellido Paterno:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="usuarios" name="usuario" placeholder="ingresa usuario" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Apellido Materno:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="email" name="email" placeholder="ingresa email" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Grupo de Permisos:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="grupo" id="grupo" class="form-control" required>
                                                        <option value=""></option>
                                                        <?php 
                                                            $grupo = $cnx->query("SELECT * FROM grupos"); 
                                                            while($vergrupo = mysqli_fetch_array($grupo)){
                                                        ?>
                                                        <option value="<?php echo $vergrupo['idGrupo']; ?>"><?php echo utf8_encode($vergrupo
                                                            ['nombre']); ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hr-estado" class="form-control-label">Estado:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" name="estado" id="estado" required>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hr-estado" class="form-control-label">Contraseña:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="contrasena" name="contrasena" placeholder="*******" class="form-control" required>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Guardar
                                        </button>
                                        <a href="usuarios.php" class="btn btn-danger btn-sm add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                                    </div>
                                        </form>
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
