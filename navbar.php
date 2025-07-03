<!-- HEADER MOBILE-->
<?php
$perfil = $cnx->query("SELECT * FROM usuarios WHERE usuario = '".$_SESSION['Usuario']."'");
$verperfil = mysqli_fetch_array($perfil);
$grupo = $verperfil['grupo'];
if($grupo == 1){
?>
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="images/logo/logo_horizontal_ofi.png" alt="Logos SISREF" width="50%" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub">
                    <a href="index.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="productos.php">
                        <i class="fas fa-th-large"></i> Productos</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-user"></i> Contactos <i class='fas fa-angle-down'></i></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="clientes.php"><i class="fas fa-user"></i> clientes</a>
                        </li>
                        <li>
                            <a href="proveedores.php"><i class="fas fa-briefcase"></i> Proveedores</a>
                        </li>
                        <li>
                            <a href="fabricantes.php"><i class="fas fa-tag"></i> Fabricantes</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-usd"></i> Cotizador <i class='fas fa-angle-down'></i></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="cotizador.php"><i class="fas fa-cart-plus"></i> Nueva Cotización</a>
                        </li>
                        <li>
                            <a href="cotizaciones.php"><i class="fas fa-list-alt"></i> Cotizaciones</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-cubes"></i> Inventario <i class='fas fa-angle-down'></i></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="conteo_inventario.php"><i class="fas fa-boxes"></i> Conteos</a>
                        </li>
                        <li>
                            <a href="movimientos.php"><i class="fas fa-exchange-alt"></i> Movimientos</a>
                        </li>
                        <li>
                            <a href="configuracion_inventario.php"><i class="fas fa-exchange-alt"></i> Configuración</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#"><i class="fas fa-unlock-alt"></i> Administración <i class='fas fa-angle-down'></i></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="empleados.php"><i class="fas fa-users"></i>Empleados</a>
                        </li>
                        <li>
                            <a href="grupos.php"><i class="fas fa-list-alt"></i> Grupos</a>
                        </li>
                        <li>
                            <a href="usuarios.php"><i class="fas fa-user"></i>Usuarios</a>
                        </li>
                        <!-- <li>
                            <a href="departamentos.php"><i class="fas fa-building"></i>Departamentos</a>
                        </li>
                        <li>
                            <a href="puestos.php"><i class="fas fa-job"></i>Puestos</a>
                        </li> -->
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="./">
            <img src="images/logo/logo_horizontal_ofi.png" alt="Logo SISREF"  width="90%" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="has-sub">
                    <a href="index.php">
                        <i class="fas fa-tachometer-alt"></i> Dashboard <i class='fas fa-angle-double-right'></i></a>
                </li>
                <!-- <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-truck"></i> Compras <i class='fas fa-angle-down'></i></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="compra_nueva.php"><i class="fas fa-shopping-cart"></i> Nueva Compra</a>
                        </li>
                        <li>
                            <a href="compra_historial.php"><i class="fas fa-tasks"></i> Historial de Compras</a>
                        </li>
                    </ul>
                </li> -->
                <li>
                    <a href="productos.php">
                        <i class="fas fa-th-large"></i> Productos <i class='fas fa-angle-double-right'></i></a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-user"></i> Contactos <i class='fas fa-angle-down'></i></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="clientes.php"><i class="fas fa-user"></i> clientes</a>
                        </li>
                        <li>
                            <a href="proveedores.php"><i class="fas fa-briefcase"></i> Proveedores</a>
                        </li>
                        <li>
                            <a href="fabricantes.php"><i class="fas fa-tag"></i> Fabricantes</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-shopping-cart"></i> Cotizador <i class='fas fa-angle-down'></i></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="cotizador.php"><i class="fas fa-cart-plus"></i> Nueva Cotización</a>
                        </li>
                        <li>
                            <a href="cotizaciones.php"><i class="fas fa-list-alt"></i> Cotizaciones</a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-usd"></i> Facturación <i class='fas fa-angle-down'></i></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="nueva_factura.php"><i class="fas fa-cart-plus"></i> Nueva Factura</a>
                        </li>
                        <li>
                            <a href="facturas.php"><i class="fas fa-list-alt"></i> Administrar Facturas</a>
                        </li>
                    </ul>
                </li> -->
                <!-- <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-signal"></i> Reportes <i class='fas fa-angle-down'></i></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="#"><i class="fas fa-bar-chart-o"></i> Ventas</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-bar-chart-o"></i> Compras</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-bar-chart-o"></i> Inventario</a>
                        </li>
                    </ul>
                </li> -->
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-cubes"></i> Inventario <i class='fas fa-angle-down'></i></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <!-- <li>
                            <a href="entrada_inventario.php"><i class="far fa-hand-point-left"></i> Entrada</a>
                        </li>
                        <li>
                            <a href="salida_inventario.php"><i class="far fa-hand-point-right"></i> Salida</a>
                        </li> -->
                        <li>
                            <a href="conteo_inventario.php"><i class="fas fa-boxes"></i> Conteos</a>
                        </li>
                        <li>
                            <a href="movimientos.php"><i class="fas fa-exchange-alt"></i> Movimientos</a>
                        </li>
                        <li>
                            <a href="configuracion_inventario.php"><i class="fas fa-cogs"></i> Configuración</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#"><i class="fas fa-unlock-alt"></i> Administración <i class='fas fa-angle-down'></i></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="grupos.php"><i class="fas fa-list-alt"></i> Grupos</a>
                        </li>
                        <li>
                            <a href="usuarios.php"><i class="fas fa-user"></i>Usuarios</a>
                        </li>
                        <!-- <li>
                            <a href="departamentos.php"><i class="fas fa-building"></i>Departamentos</a>
                        </li>
                        <li>
                            <a href="puestos.php"><i class="fas fa-briefcase"></i>Puestos</a>
                        </li> -->
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
<?php }else{ ?>

<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="images/logo/logo_horizontal_ofi.png" alt="Logo SISREF" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub">
                    <a href="index.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="productos.php"><i class="fas fa-th-large"></i> Productos</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#"><i class="fas fa-user"></i> Contactos <i class='fas fa-angle-down'></i></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="clientes.php"><i class="fas fa-user"></i> clientes</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-usd"></i> Cotizador <i class='fas fa-angle-down'></i></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="cotizador.php"><i class="fas fa-cart-plus"></i> Nueva Cotización</a>
                        </li>
                        <li>
                            <a href="cotizaciones.php"><i class="fas fa-list-alt"></i> Cotizaciones</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/logo/logo_horizontal_ofi.png" alt="Logo SISREF" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a href="index.php">
                                <i class="fas fa-tachometer-alt"></i> Dashboard <i class='fas fa-angle-double-right'></i></a>
                        </li>
                        <li>
                            <a href="productos.php">
                                <i class="fas fa-th-large"></i> Productos <i class='fas fa-angle-double-right'></i></a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i> Contactos <i class='fas fa-angle-down'></i></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="clientes.php"><i class="fas fa-user"></i> clientes</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-usd"></i> Cotizador <i class='fas fa-angle-down'></i></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="cotizador.php"><i class="fas fa-cart-plus"></i> Nueva Cotización</a>
                                </li>
                                <li>
                                    <a href="cotizaciones.php"><i class="fas fa-list-alt"></i> Administrar Cotizaciones</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
<?php } ?>