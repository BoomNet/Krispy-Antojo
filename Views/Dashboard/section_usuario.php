<div class="modal fade" id="agg_usuario_modal" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
      <?php if($Errores):?>
        <?php foreach($Errores as $Error):?>
          <div class="text-start alert alert-danger d-flex bd-highlight " role="alert">
          <div class="flex-grow-1 bd-highlight">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-exclamation-diamond" viewBox="0 0 16 16">
              <path d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.482 1.482 0 0 1 0-2.098L6.95.435zm1.4.7a.495.495 0 0 0-.7 0L1.134 7.65a.495.495 0 0 0 0 .7l6.516 6.516a.495.495 0 0 0 .7 0l6.516-6.516a.495.495 0 0 0 0-.7L8.35 1.134z"/>
              <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
            </svg>
            <?php echo $Error;?>
          </div>
          <div class="bd-highlight">
            <button type="button " class="btn-close text-end" data-bs-dismiss="alert"></button>                                    
          </div>
        </div>
        <?php endforeach;?>
      <?php endif;?>
      <form class="row " action="/Dashboard/dashboard?View=2" method="POST">
          <!-- CLAVE-ROL -->
          <div class="col-12 d-flex px-4">
            <div class="col-12 col-lg-2">
              <select class="form-select" name="usuario[cverol_usuario]">
                <option selected disabled>Seleccione Rol</option>
                <?php foreach($Rol as $rol):?>
                  <option <?php $usuario->cverol_usuario === $rol->id ? '' : 'selected';?>
                    value="<?php echo $rol->id;?>"><?php echo s($rol->rol);?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
          <!-- NOMBRE-APELLIDOS -->
          <div class="col-12 d-lg-flex">
            <div class="col-12 col-lg-4 p-1 p-lg-3">
              <label class="">Nombre</label>
              <input class="form-ctrl" name="usuario[nombre_usuario]" type="text" value=<?php echo $usuario->nombre_usuario;?>>
            </div>
            <div class="col-12 col-lg-4 p-1 p-lg-3">
              <label class="">Apellido Paterno</label>
              <input class="form-ctrl" name="usuario[apellidopa_usuario]" type="text" value=<?php echo $usuario->apellidopa_usuario;?>>
            </div>
            <div class="col-12 col-lg-4 p-1 p-lg-3">
              <label class="">Apellido Materno</label>
              <input class="form-ctrl" name="usuario[apellidoma_usuario]" type="text" value=<?php echo $usuario->apellidoma_usuario;?>>
            </div>
          </div>
          <!-- USUARIO-CORREO -->
          <div class="col-12 d-lg-flex">
            <div class="col-12 col-lg-4 p-1 p-lg-3">
              <label class="">Nombre de Usuario</label>
              <input class="form-ctrl" name="usuario[usuario_usuario]" type="text" placeholder="@" value=<?php echo $usuario->usuario_usuario;?>>
            </div>
            <div class="col-12 col-lg-4 p-1 p-lg-3">
              <label class="">Correo</label>
              <input class="form-ctrl" name="usuario[correo_usuario]" type="email" value=<?php echo $usuario->correo_usuario;?>>
            </div>
            <div class="col-12 col-lg-4 p-1 p-lg-3">
              <label class="">Telefono:</label>
              <input class="form-ctrl" name="usuario[telefono_usuario]" type="text" value=<?php echo $usuario->usuario_usuario;?>>
            </div>
          </div>
          <!-- CORREO -->
          <div class="col-12 d-lg-flex">
            <div class="col-12 col-lg-6 p-1 p-lg-3">
              <label class="">Contraseña</label>
              <input class="form-ctrl" name="usuario[contrasenia_usuario]" type="password" >
            </div>
            <div class="col-12 col-lg-6 p-1 p-lg-3">
              <label class="">Confirmar Contraseña</label>
              <input class="form-ctrl" name="usuario[confirm_contrasenia]" type="password">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <input class="btn btn-primary" type="submit" value="Registrar">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>