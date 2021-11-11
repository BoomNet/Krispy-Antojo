<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">Krispy Antojo</div>
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
       <a href="#">
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
  <img src="/build/img/Fondo.png" alt="Logo Krispy Antojo" class="logo_krispy activo">
  <div class="bg-light rounded m-5 usuario ocultar">
    <h1 class="text-center">Usuario</h1>
    <form class="row" action="" method="post">
      <!-- CLAVE-ROL -->
      <div class="col-12 d-flex px-4">
        <div class="col-12 col-lg-1 pe-3">
          <input class="form-control" type="tel" id="cve_usuario" placeholder="Clave">
        </div>
        <div class="col-12 col-lg-2">
          <select class="form-select" id="rol">
            <option selected>Rol</option>
            <option value="1">Vendedor</option>
            <option value="2">Administrador</option>
          </select>
        </div>
      </div>
      <!-- NOMBRE-APELLIDOS -->
      <div class="col-12 d-lg-flex">
        <div class="col-12 col-lg-4 p-1 p-lg-3">
          <label class="form-label">Nombre</label>
          <input class="form-control" id="nombre_usuario" type="text">
        </div>
        <div class="col-12 col-lg-4 p-1 p-lg-3">
          <label class="form-label">Apellido Paterno</label>
          <input class="form-control" id="apellidopa_usuario" type="text">
        </div>
        <div class="col-12 col-lg-4 p-1 p-lg-3">
          <label class="form-label">Apellido Materno</label>
          <input class="form-control" id="apellidoma_usuario" type="text">
        </div>
      </div>
      <!-- USUARIO-CORREO -->
      <div class="col-12 d-lg-flex">
        <div class="col-12 col-lg-4 p-1 p-lg-3">
          <label class="form-label">Nombre de Usuario</label>
          <div class="input-group">
            <div class="input-group-text">@</div>
            <input class="form-control" id="usuario_usuario" type="text">
          </div>
        </div>
        <div class="col-12 col-lg-8 p-1 p-lg-3">
          <label class="form-label">Correo</label>
          <input class="form-control" id="correo" type="email">
        </div>
      </div>
      <!-- CORREO -->
      <div class="col-12 d-lg-flex">
        <div class="col-12 col-lg-6 p-1 p-lg-3">
          <label class="form-label">Contraseña</label>
          <input class="form-control" id="contrasenia" type="password" >
        </div>
        <div class="col-12 col-lg-6 p-1 p-lg-3">
          <label class="form-label">Confirmar Contraseña</label>
          <input class="form-control" id="confirm_contrasenia" type="password">
        </div>
      </div>
    </form>
    <div class="row ">
      <div class="col-12 text-center p-3">
        <button class="btn btn-primary" type="button">Registrar</button>
        <button class="btn btn-secondary" type="button">Cancelar</button>
      </div>
    </div>
  </div>
</section>