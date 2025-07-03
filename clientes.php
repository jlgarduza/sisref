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
        <?php include'navbar.php'; ?>

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
                                    <h2 class="title-1"><i class="fa fa-users"></i> Clientes</h2>
                                    <button class="btn btn-primary btn-sm" onclick="location.href='clientes_nuevo.php';">
                                        <i class="zmdi zmdi-plus"></i> Nuevo</button>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Buscar</span>
                            </div>
                            <input id="FiltrarContenido" type="text" class="form-control" placeholder="Ingrese Nombre de Alumno" aria-label="Alumno" aria-describedby="basic-addon1">
                        </div>
                        
                        <div class="table-reponsive">
                            <!-- DATA TABLE-->
                            <?php

                                if(isset($_GET['exito'])){

                                    echo '<div class="alert alert-success alert-dismissible" role="alert">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Exito! </strong> <label>Cliente eliminado!</label>
                                    </div>';
                                }
                                if(isset($_GET['error'])){

                                    echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Error! </strong> <label>Cliente no eliminado!</label>
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
                            
                            include 'conexion.php';
                            
                            $limit = 15;  
                            if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
                            $start_from = ($page-1) * $limit;  
                            
                            $sql = "SELECT * FROM clientes ORDER BY nombre_cliente ASC LIMIT $start_from, $limit ";  
                            $rs_result = $cnx->query($sql);
                            $contador = 0;
                            ?>  
                            <table style="font-size:12px" class="table table-bordered table-striped">  
                                <thead class="table-dark">  
                                    <tr>  
                                        <th>N°</th>
                                        <th>codigo</th>  
                                        <th>Cliente</th>  
                                        <th>Direccion</th>
                                        <th>Contacto</th>
                                        <th colspan=2>Acciones</th>
                                    </tr>  
                                <thead>  
                                <tbody class="BusquedaRapida">  
                                    <?php  
                                    while ($row = mysqli_fetch_assoc($rs_result)) { $contador++;
                                    ?>  
                                    <tr>
                                        <td><?php echo $contador; ?></td>
                                        <td><?php echo $row["codCliente"]; ?></td>
                                        <td><?php echo $row["razon_social"]; ?></td>
                                        <td><?php echo '<i class="fas fa-map-marker"></i> '.$row['calle_cliente'].' '.$row['no_exterior'].' '.$row['colonia_cliente'].' '.$row['estado_cliente'];?><br/><?php echo '<i class="fas fa-phone"></i> '.$row['telefono'] ?><br/><?php echo '<i class="fas fa-inbox"></i> '.$row['correo_electronico'] ?></td>
                                        <td><?php echo $row["nombre_cliente"]; ?></td>
                                        <td><a href="clientes_edicion.php?idCliente=<?php echo $row['idCliente']?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a></td>
                                        <td><a href="delete.php?idCliente=<?php echo $row['idCliente'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
                                    </tr>  
                                    <?php  
                                    };  
                                    ?>  
                                </tbody>  
                            </table>  
                            <?php  
                                $sql = "SELECT COUNT(*) FROM clientes";  
                                $rs_result = $cnx->query($sql);  
                                $row = mysqli_fetch_row($rs_result);  
                                $total_records = $row[0];  
                                $total_pages = ceil($total_records / $limit);  
                                $pagLink = "<div class='pagination'>";  
                                for ($i=1; $i<=$total_pages; $i++) {  
                                            $pagLink .= "<a class='page-link' href='clientes.php?page=".$i."'>".$i."</a>";  
                                };  
                                echo $pagLink . "</div>";  
                            ?>
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
