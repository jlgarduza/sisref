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
                                    <h2 class="title-1">Configuración</h2>
                                    <!-- <button class="au-btn au-btn-icon au-btn--blue" onclick="location.href='cotizador.php';">
                                        <i class="zmdi zmdi-plus"></i>Nueva Cotización</button> -->
                                </div>
                            </div>
                        </div>
                        <br/>
                        <!-- <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Buscar</span>
                            </div>
                            <input id="FiltrarContenido" type="text" class="form-control" placeholder="Ingresa la cotizacion" aria-label="Alumno" aria-describedby="basic-addon1">
                        </div> -->
                        
                        <div class="">
                        <?php while($verperfil = mysqli_fetch_object($perfil)){ ?>
                            <section class="content">
                            <div class="row">
                            
                            <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="box box-primary">
                                <div class="box-body box-profile">
                                <div id="load_img">
                                <img class="img-responsive" src="<?php echo $verperfil->logo_url ?>" alt="Bussines profile picture">
                                </div>

                                <h3 class="profile-username text-center"><?php echo $verperfil->nombre_empresa ?></h3>

                                <p class="text-muted text-center mail-text"><?php echo $verperfil->email ?></p>

                                

                                
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->

                            
                            </div>
                            <!-- /.col -->
                            <div class="col-md-9">
                            <form class="form-control" method="post" enctype="multipart/form-data" name="profi">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link active" href="#details" data-toggle="tab" aria-expanded="true">Detalles</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#address" data-toggle="tab" aria-expanded="false">Dirección</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="resultados_ajax"></div>
                                <div class="tab-pane active" id="details">
                                    
                                    <div class="form-group">
                                        <label for="name" class="col-sm-3 control-label">Nombre</label>

                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Nombre de la empresa" value="<?php echo $verperfil->nombre_empresa ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="number_id" class="col-sm-3 control-label">Número de registro</label>

                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="number_id" name="number_id" placeholder="Número de registro" value="<?php echo $verperfil->id_perfil ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-3 control-label">Correo electrónico</label>
                                        <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" value="<?php echo $verperfil->email ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="col-sm-3 control-label">Teléfono</label>

                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono" value="<?php echo $verperfil->telefono ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="currency" class="col-sm-3 control-label">Moneda</label>
                                        <div class="col-sm-9">
                                            <select class="form-control select2 select2-hidden-accessible" name="currency" id="currency" tabindex="-1" aria-hidden="true">
                                                <option value="28" selected="">Peso Mexicano</option>
                                            </select>
                                            <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 584px;">
                                                <span class="selection">
                                                    <span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-currency-container">
                                                        <span class="select2-selection__rendered" id="select2-currency-container" title="Peso Mexicano">Peso Mexicano</span>
                                                        <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                                                    </span>
                                                </span>
                                                <span class="dropdown-wrapper" aria-hidden="true"></span>
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="image" class="col-sm-3 control-label">Logo</label>

                                        <div class="col-sm-9">
                                        <input type="file" name="imagefile" id="imagefile" onchange="upload_image();" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                        <button type="button" class="btn btn-primary" onclick="return updateProfile();">Guardar datos</button>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="address">
                                
                                    <div class="form-group">
                                        <label for="address1" class="col-sm-3 control-label">Calle</label>

                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="address1" name="address1" placeholder="Calle" value="<?php echo $verperfil->direccion ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="city" class="col-sm-3 control-label">Ciudad</label>

                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="city" name="city" placeholder="Ciudad" value="<?php echo $verperfil->ciudad ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="state" class="col-sm-3 control-label">Región/Provincia</label>

                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="state" name="state" placeholder="Región/Provincia" value="<?php echo $verperfil->estado ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="postal_code" class="col-sm-3 control-label">Código Postal</label>

                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Código Postal" value="<?php echo $verperfil->codigo_postal ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                        <button type="button" class="btn btn-primary" name="update" onclick="return updateProfile();">Guardar datos</button>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                            </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        
                            </section>
                        
                            <?php } ?>
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
