<div class="bg-light rounded m-5 usuario">
    <?php if($Errores):?>
      <?php foreach($Errores as $Error):?>
        <div class="text-start alert alert-danger d-flex bd-highlight mx-5" role="alert">
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
    <form class="row" action="/Dashboard/dashboard?View=6" method="POST">
      <!-- NOMBRE-MARCA -->
      <div class="col-12 d-lg-flex">
          <div class="col-12 col-lg-6  p-1 p-lg-3">
              <label class="form-label">Nombre del Producto</label>
              <input class="form-control" name="producto[nombre_proucto]" type="text" value=<?php echo $producto->nombre_producto;?>>
            </div>
            <div class="col-10 col-lg-2 p-1 p-lg-3">
                <label class="form-label">Nombre del Producto</label>
                <select class="form-select" name="usuario[cverol_usuario]">
                    <option selected disabled>...</option>
                    <?php foreach($Rol as $rol):?>
                    <option <?php $usuario->cverol_usuario === $rol->id ? '' : 'selected';?>
                        value="<?php echo $rol->id;?>"><?php echo s($rol->rol);?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <!-- DESCRIPCION-PRECIOS -->
        <div class="col-12 d-lg-flex">
            <div class="col-12 col-lg-7 p-1 p-lg-3">
              <label class="form-label">Descripción</label>
              <textarea class="form-control" name="producto[descripcion_producto]" type="text"  value=<?php echo $producto->descripcion_producto;?>></textarea>
            </div>
            <div class="row">
                <div class="col-4 p-1 p-lg-3">
                  <label class="form-label">Compra</label>
                  <input class="form-control" name="producto[precioCompra_producto]" type="" placeholder="$" value=<?php echo $producto->precioCompra_producto;?>>
                </div>
                <div class="col-4 p-1 p-lg-3">
                  <label class="form-label">Venta</label>
                  <input class="form-control" name="producto[precioVenta_producto]" type="" placeholder="$" value=<?php echo $producto->precioVenta_producto;?>>
                </div>
            </div>
        </div>
      <!-- CORREO -->
        <div class="col-12 d-lg-flex">
            <div class="col-4 p-1 p-lg-3">
                <label class="form-label">Stock</label>
                <input class="form-control" name="producto[stock_producto]" type="number" value=<?php echo $producto->stock_producto;?>>
            </div>
        </div>
        <!-- BOTONES -->
        <div class="row ">
            <div class="col-12 text-center p-3">
                <input class="btn btn-primary" type="submit" value="Registrar">
                <a class="btn btn-secondary" type="button" href="/Dashboard/dashboard?View=5">Volver</a>
            </div>
        </div>
    </form>
</div>