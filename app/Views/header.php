<?php
$user_session = session();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>POS</title>
  <!-- Favicon -->
  <link rel="icon" href="<?php echo base_url(); ?>/public/assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/assets/css/argon.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/assets/css/icofont/icofont.min.css">
  <!-- dataTables -->
  <link href="<?php echo base_url(); ?>/public/assets/css/jquery-ui.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>/public/assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="<?php echo base_url();?>/precios">
          <img src="<?php echo base_url();?>/public/assets/img/brand/color.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="examples/dashboard.html">
                <i class="ni ni-tv-2 text-pink"></i>
                <span class="nav-link-text text-pink">Dashboard</span>
              </a>
              <hr class="my-1">

            </li>
            <li class="nav-item">
              <a class="nav-link" href=" <?php echo base_url() . '/ventas/venta'; ?>">
              <i class="fas fa-store text-primary"></i>
                <span class="nav-link-text text-primary">Vender</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() . '/ventas'; ?>">
              <i class="fas fa-store"></i>
              <span class="nav-link-text">Ventas</span>
              </a>
              <hr class="my-1">
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() . '/compras/nuevo'; ?>">
              <i class="fas fa-shopping-cart text-yellow"></i>
                <span class="nav-link-text text-yellow">Comprar</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() . '/compras'; ?>">
              <i class="fas fa-shopping-cart"></i>
                <span class="nav-link-text">Compras</span>
              </a>
              <hr class="my-1">

            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() . '/proveedores'; ?>">
              <i class="fas fa-user-tie text-pink"></i>
                <span class="nav-link-text text-pink">Proveedores</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() . '/clientes'; ?>">
              <i class="fas fa-user-alt text-pink"></i>
                <span class="nav-link-text text-pink">Clientes</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() . '/productos'; ?>">
              <i class="icofont-bricks text-pink"></i>
                <span class="nav-link-text text-pink">Productos</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() . '/unidades'; ?>">
              <i class="icofont-measure text-pink"></i>
                <span class="nav-link-text text-pink">Producto|Unidad</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Documentación</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="#" target="_blank">
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Reportes</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() . '/usuarios'; ?>">
                <i class="ni ni-palette"></i>
                <span class="nav-link-text">Usuarios</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active active-pro" href="<?php echo base_url() . '/configuracion'; ?>">
              <i class="fas fa-cog"></i>
                <span class="nav-link-text">Configuración</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              
            </li>
            
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="<?php echo $user_session->nombre; ?>" src="<?php echo base_url();?>/public/assets/img/theme/Jose.jpg">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"> <?php echo $user_session->nombre; ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Bienvenido!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Mi Perfil</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?php echo base_url() . '/usuarios/logout'; ?>" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>