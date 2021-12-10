<?php  
    if(!isset($_SESSION)){
      session_start();
    }
    $idSession = $_SESSION['id'] ?? false;
    $nombreSesion = $_SESSION['usuario'] ?? false;
    $rolSesion = $_SESSION['rol'] ?? false;
    $Autenticado = $_SESSION['login'] ?? false;  
?>
<div class="sidebar d-none d-md-block">
    <div class="logo-details">
        <a class="logo_name" href="/Dashboard/dashboard?View=1">Krispy Antojo</a>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list" id="Navegacion">
      <div class="<?php echo $rolSesion == "3" ? 'admin' : 'user';?>">
        <li>
          <a href="#">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Dashboard</span>
          </a>
          <span class="tooltip">Dashboard</span>
        </li>
        <li>
        <a href="/Dashboard/dashboard?View=2">
          <i class='bx bx-user usuario' ></i>
          <span class="links_name">Usuario</span>
        </a>
        <span class="tooltip">Usuario</span>
        </li>
        <li>
          <a href="/Dashboard/dashboard?View=5">
            <i class='bx bx-pie-chart-alt-2 productos' ></i>
            <span class="links_name">Productos</span>
          </a>
          <span class="tooltip">Productos</span>
        </li>
        <li>
          <a href="/Dashboard/dashboard?View=8&id=<?php echo $idSession;?>">
            <i class='bx bx-folder gastos'></i>
            <span class="links_name">Gasto</span>
          </a>
          <span class="tooltip">Gasto</span>
        </li>
      </div>
     <li>
       <a href="/Dashboard/dashboard?View=9&id=<?php echo $idSession;?>">
         <i class='bx bx-cart-alt ventas' ></i>
         <span class="links_name">Ventas</span>
       </a>
       <span class="tooltip">Ventas</span>
     </li>
     <li class="profile">
       <?php if($Autenticado):?>
          <a class="cerrar-sesion" id="logout">
            <div class="profile-details">
              <img src="/build/img/Fondo.png" alt="profileImg">
              <div class="name_job">
                <div class="name"><?php echo $nombreSesion;?></div>
                <div class="job"><?php echo $rolSesion === "3" ? 'Administrador' : 'Empleado';?></div>
              </div>
            </div>
            <div>
              <i class='bx bx-log-out logout' id="log_out" ></i>
            </div>
        </a>   
       <?php endif;?>
     </li>
    </ul>
  </div>
  
<!-- RESPONSIVE -->
<nav class="navbar navbar-light bg-login d-block d-md-none fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#"><h1>Krispy Antojo</h1></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <div class="<?php echo $rolSesion == "3" ? 'admin' : 'user';?>">
        <div class="d-grid gap-2 col-6 mx-auto">
          <button type="button" class="btn btn-lg btn-dark">
            <a class="link-light " href="/Dashboard/dashboard?View=1">
              <i class='bx bx-grid-alt ' ></i>
              <span class="links_name">Dashboard</span>
            </a>
          </button>
          <button type="button" class="btn btn-lg btn-dark">
            <a class="link-light " href="/Dashboard/dashboard?View=2">
              <i class='bx bx-user usuario' ></i>
              <span class="links_name">Usuario</span>
            </a>
          </button>
          <button type="button" class="btn btn-lg btn-dark">
            <a class="link-light " href="/Dashboard/dashboard?View=5">
              <i class='bx bx-pie-chart-alt-2 productos' ></i>
              <span class="links_name">Productos</span>
            </a>
          </button>
          <button type="button" class="btn btn-lg btn-dark">
            <a class="link-light " href="/Dashboard/dashboard?View=8&id=<?php echo $idSession;?>">
              <i class='bx bx-folder gastos'></i>
              <span class="links_name">Gasto</span>
            </a>
          </button>
          <button class="btn btn-lg btn-dark">
            <a class="link-light " href="/Dashboard/dashboard?View=9">
              <i class='bx bx-cart-alt ventas' ></i>
              <span class="links_name">Ventas</span>
            </a>
          </button>
        </div>
        <div class="profile">
       <?php if($Autenticado):?>
        <div class="row pt-3">
          <a class="link-light cerrar-sesion" id="logout">
            <div class="col-12">
              <div class="profile-details d-flex align-items-center bd-highlight">
                <img src="/build/img/Fondo.png" width="15%" alt="profileImg">
                <div class="name_job ps-3">
                  <div class="name "><?php echo $nombreSesion;?></div>
                  <div class="job "><?php echo $rolSesion === "3" ? 'Administrador' : 'Empleado';?></div>
                </div>
                <div class="ms-auto bd-highlight pe-3">
                  <i class='bx bx-log-out logout ' id="log_out" ></i>
                </div>
              </div>
            </div>
          </a>   
       </div>
       <?php endif;?> 
    
    </div>
  </div>
</nav>
<main class="home-section section-main main">
  <?php 
    if(isset($View)){
      switch($View){
        case 1: 
          include __DIR__ . "/fondo_dashboard.php";
          break;
        case 2:
          include __DIR__ . "/table_usuario.php";
          break;
        case 3:
          ?>
            <h1 class="text-center pt-5 mt-5">Agregar Usuario</h1>
          <?php
            include __DIR__ . "/section_usuario.php";
          break;
        case 4:
          ?>
            <h1 class="text-center pt-5 mt-5">Editar Usuario</h1>
          <?php
            include __DIR__ . "/section_usuario.php";
          break;
        case 5:
          include __DIR__ . "/table_producto.php";
          break;
        case 6: 
          ?>
            <h1 class="text-center pt-5 mt-5">Agregar Producto</h1>
          <?php
            include __DIR__ . "/section_producto.php";
          break;
        case 7:
          ?>
            <h1 class="text-center pt-5 mt-5">Editar Producto</h1>
          <?php 
            include __DIR__ . "/section_producto.php";
          break;
        case 8:
          ?> 
            <h1 class="text-center pt-5 mt-5">Tabla de Gastos</h1>
          <?php 
            include __DIR__ . "/table_gasto.php";
          break;
        case 9:
          include __DIR__ . "/punto_venta.php";
          break;
        default:
          break;
      }
    }
  ?>
</main>