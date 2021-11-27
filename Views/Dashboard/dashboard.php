<?php  
    if(!isset($_SESSION)){
      session_start();
    }
    $nombreSesion = $_SESSION['usuario'] ?? false;
    $rolSesion = $_SESSION['rol'] ?? false;
    $Autenticado = $_SESSION['login'] ?? false;  
?>
<div class="sidebar">
    <div class="logo-details">
        <a class="logo_name" href="/Dashboard/dashboard?View=1">Krispy Antojo</a>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list" id="Navegacion">
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
       <a href="/Dashboard/dashboard?View=8">
         <i class='bx bx-folder gastos'></i>
         <span class="links_name">Gasto</span>
       </a>
       <span class="tooltip">Gasto</span>
     </li>
     <li>
       <a href="#">
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
            <h1 class="text-center pt-5">Agregar Usuario</h1>
          <?php
            include __DIR__ . "/section_usuario.php";
          break;
        case 4:
          ?>
            <h1 class="text-center pt-5">Editar Usuario</h1>
          <?php
            include __DIR__ . "/section_usuario.php";
          break;
        case 5:
          include __DIR__ . "/table_producto.php";
          break;
        case 6: 
          ?>
            <h1 class="text-center pt-5">Agregar Producto</h1>
          <?php
            include __DIR__ . "/section_producto.php";
          break;
        case 7:
          ?>
            <h1 class="text-center pt-5">Editar Producto</h1>
          <?php 
            include __DIR__ . "/section_producto.php";
          break;
        case 8:
          ?> 
            <h1 class="text-center pt-5">Tabla de Gastos</h1>
          <?php 
            include __DIR__ . "/table_gasto.php";
          break;
        default:
          break;
      }
    }
  ?>
</main>