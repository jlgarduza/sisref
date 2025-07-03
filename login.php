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
    <div class="">
        <div class="">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/logo/logo_horizontal_ofi.png" width="100%">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="validar.php" method="post">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input class="au-input au-input--full" type="text" name="txtNombre" placeholder="Nombre" autofocus required />
                                </div>
                                <div class="form-group">
                                    <label>Correo</label>
                                    <input class="au-input au-input--full" type="email" name="txtCorreo" placeholder="Correo" required />
                                </div>
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <input class="au-input au-input--full" type="text" name="txtUsuario" placeholder="Usuario" required />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="txtPassword" placeholder="Password" required />
                                </div>
                                <div class="login-checkbox">
                                    <?php
                                        if(isset($_GET['acceso'])){

                                            echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Acceso Denegado!</strong>
                                            </div>';
                                        }
                                        if(isset($_GET['clave'])){

                                            echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>Contraseña incorrecta!</strong>
                                                </div>';
                                        }
                                        if(isset($_GET['vaciousr'])){
                    
                                            echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>Campo de usuario vacío!</strong>
                                                </div>';
                                        }
                                        if(isset($_GET['vaciopwd'])){
                    
                                            echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>Campo de contraseña vacío!</strong>
                                                </div>';
                                        }
                                    ?>
                                </div>
                                <button class="btn btn-dark btn-block" type="submit">Iniciar sesión</button>
                            </form>
                        </div>
                        <footer class="text-center">
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <a href="https://wa.me/522291375958?text=Quiero%20probar%20la%20versión%20demo%20SisRef">Solicita el acceso aquí</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="https://sisoweb.com" target="_blank">SiSoWeb.Com</a>
                                </div>
                            </div>
                        </footer>
                    </div>
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

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->