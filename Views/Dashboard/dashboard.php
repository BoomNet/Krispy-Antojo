<div class="sidebar">
    <div class="logo-details">
        <a class="logo_name" href="/Dashboard/dashboard?View=1">Krispy Antojo</a>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list" id="Navegacion">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li>
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
       <a href="#">
         <i class='bx bx-chat roles'></i>
         <span class="links_name">Roles</span>
       </a>
       <span class="tooltip">Roles</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-pie-chart-alt-2 productos' ></i>
         <span class="links_name">Productos</span>
       </a>
       <span class="tooltip">Productos</span>
     </li>
     <li>
       <a href="#">
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
         <div class="profile-details">
           <img src="https://avatars.githubusercontent.com/u/46621591?v=4" alt="profileImg">
           <div class="name_job">
             <div class="name">Test</div>
             <div class="job">Web designer</div>
           </div>
         </div>
         <div>
           <i class='bx bx-log-out logout' id="log_out" ></i>
         </div>
     </li>
    </ul>
  </div>
<section class="home-section section-main">
  <?php 
    if(isset($View)){
      switch($View){
        case 1: 
          include __DIR__ . "/fondo_dashboard.php";
          break;
        case 2:
          include __DIR__ . "/section_usuario.php";
          break;
        default:
          break;
      }
    }
  ?>
</section>