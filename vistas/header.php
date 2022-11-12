<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JH Adm solutions | Valentina</title>
  <link rel="icon" href="../vistas/img/plantilla/icono-negro.png">

  <!-- ===========================
    PLUGINS DE CSS
    ==============================-->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">   
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/dist/css/adminlte.css">
    <link rel="stylesheet" href="../public/dist/css/responsive.bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- ===========================
    PLUGINS DE JAVASCRIPT
    ==============================-->
    <!-- jQuery -->
    <script src="../public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="../public/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../public/dist/js/adminlte.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../public/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../public/plugins/jszip/jszip.min.js"></script>
    <script src="../public/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../public/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../public/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="../public/plugins/sweetalert2/sweetalert2.all.js"></script>

    <!-- REQUIRED SCRIPTS -->
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-yellow navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-warning elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="../vistas/img/plantilla/logo.png" alt="JH Adm Logo" class="brand-image elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">System</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../<?php echo $_SESSION['imagen'];?>" class="img-circle elevation-2" alt="<?php echo $_SESSION['nombre'];?>">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['login'];?></a>
          <a href="../ajax/usuario.ajax.php?op=salir" class="btn btn-xs btn-dark">Cerrar Sesión</a>
        </div>
      </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <?php
          if($_SESSION['escritorio'] == 1){
            echo '<li class="nav-item">
                    <a href="inicio" class="nav-link">
                      <i class="nav-icon fa fa-tasks"></i>
                      <p>Escritorio</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fa fa-search"></i>
                      <p>
                        Consultas
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                  </li>';
          }
        ?>

        <?php
          if($_SESSION['corte_caja'] == 1){
            echo '<ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="gastos.php" class="nav-link">
                        <i class="far fa fa-credit-card nav-icon"></i>
                        <p>Gastos</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="depositos.php" class="nav-link">
                        <i class="fas fa-chart-line nav-icon"></i>
                        <p>Depósitos</p>
                      </a>
                    </li>
                  </ul>';
          }
        ?>

        <?php
          if($_SESSION['acceso'] == 1){
            echo '<li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-user"></i>
                      <p>
                        Acceso
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="usuario.php" class="nav-link">
                          <i class="far fa fa-users nav-icon"></i>
                          <p>Usuarios</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="permiso.php" class="nav-link">
                          <i class="far fas fa-check-circle nav-icon"></i>
                          <p>Permisos</p>
                        </a>
                      </li>
                    </ul>
                  </li>';
          }
        ?>
        
        <?php
          if($_SESSION['corte_caja'] == 1){
            echo '<li class="nav-item">
                    <a href="#" class="nav-link activate">
                      <i class="nav-icon fas fa-book"></i>
                      <p>
                        Corte de caja
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="resumen.php" class="nav-link">
                          <i class="far fas fa-th-large nav-icon"></i>
                          <p>Resumen</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="depositos.php" class="nav-link">
                          <i class="far fas fa-money-bill nav-icon"></i>
                          <p>Depósitos</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="gastos.php" class="nav-link">
                          <i class="far fas fa-credit-card nav-icon"></i>
                          <p>Gastos</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="" class="nav-link">
                          <i class="far fas fa-sticky-note nav-icon"></i>
                          <p>Registro de notas</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="" class="nav-link">
                          <i class="far fas fa-handshake nav-icon"></i>
                          <p>Liquidaciones</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="" class="nav-link">
                          <i class="far fas fa-user-tie nav-icon"></i>
                          <p>Pago a Proveedores</p>
                        </a>
                      </li>
                    </ul>
                  </li>';
          }
        ?>
        
        <?php
          if($_SESSION['nomina'] == 1){
            echo '<li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-receipt"></i>
                      <p>
                        Nómina
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="empleados.php" class="nav-link">
                          <i class="far fas fa-user-tag nav-icon"></i>
                          <p>Alta de Empelados</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="prestamos.php" class="nav-link">
                          <i class="fas fa-money-check-alt nav-icon"></i>
                          <p>Préstamos</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="" class="nav-link">
                          <i class="far fas fa-file-invoice-dollar nav-icon"></i>
                          <p>Adelantos de nómina</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="" class="nav-link">
                          <i class="fas fa-money-check nav-icon"></i>
                          <p>Abonos</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="" class="nav-link">
                          <i class="far fas fa-envelope-open nav-icon"></i>
                          <p>Prenómina</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="" class="nav-link">
                          <i class="far fas fa-archive nav-icon"></i>
                          <p>Nómina General</p>
                        </a>
                      </li>
                    </ul>
                  </li>';
          }
        ?>        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>