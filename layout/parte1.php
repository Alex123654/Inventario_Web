<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de ventas</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo $URL;?>/public/templeates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $URL;?>/public/templeates/AdminLTE-3.2.0/dist/css/adminlte.min.css">

    <!-- Libreria Sweetallert2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo $URL;?>/public/templeates/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $URL;?>/public/templeates/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $URL;?>/public/templeates/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- jQuery -->
    <script src="<?php echo $URL;?>/public/templeates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>

</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">SISTEMA DE VENTAS </a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?php echo $URL;?>" class="brand-link">
            <img src="<?php echo $URL;?>/public/images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">MAG</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php echo $URL;?>/public/templeates/AdminLTE-3.2.0/dist/img/master.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">
                        <?php echo $nombres_sesion;?>
                        <?php echo $apellidos_sesion;?></a>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->



                    <li class="nav-item ">
                        <a href="#" class="nav-link active bg-success">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Mantenimiento
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/almacen/gestionProductos.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Gestion de productos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/almacen/create.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Creación de productos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/proveedores/mantenimientoProveedores.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Proveedores</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/categorias/mantenimientoCategorias.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Categorias</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item ">
                        <a href="#" class="nav-link active bg-success">
                            <i class="nav-icon fas fa-cart-plus"></i>
                            <p>
                                Procesos
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/compras/create.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Creación de compra</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/ventas/create.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Realizar ventas</p>
                                </a>
                            </li>                            
                        </ul>
                    </li>

                    <li class="nav-item ">
                        <a href="#" class="nav-link active bg-success">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                Consultas
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/compras/consultaCompras.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado de compras</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/ventas/consultaVentas.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado de ventas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/almacen/consultaProductos.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado de productos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/categorias/consultaCategorias.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado de categorías</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/proveedores/consultaProveedores.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado de proveedores</p>
                                </a>
                            </li>
                        </ul>
                    </li>



                    <li class="nav-item ">
                        <a href="#" class="nav-link active bg-success">
                            <i class="nav-icon fas fa-car"></i>
                            <p>
                                Reportes
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/compras/reporteCompras.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Compras</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/ventas/reporteVentas.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ventas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/almacen/reporteProductos.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Poductos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/categorias/reporteCategorias.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Categorías</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/proveedores/reporteProveedores.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Proveedores</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item ">
                        <a href="#" class="nav-link active bg-success">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Administracion
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/usuarios" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado de usuarios</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/usuarios/create.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Creación de usuario</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/roles" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado de roles</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/roles/create.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Creación de rol</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <!-- <li class="nav-item ">
                        <a href="#" class="nav-link active bg-success">
                            <i class="nav-icon fas fa-address-card"></i>
                            <p>
                                Roles
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/roles" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado de roles</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/roles/create.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Creación de rol</p>
                                </a>
                            </li>
                        </ul>
                    </li> -->


                    <li class="nav-item">
                        <a href="<?php echo $URL;?>/app/controllers/login/cerrar_sesion.php" class="nav-link" style="background-color: #ca0a0b">
                            <i class="nav-icon fas fa-door-closed"></i>
                            <p>
                                Cerrar Sesión
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
