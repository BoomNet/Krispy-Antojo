<div class="bg-light rounded m-5 ">
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
    <h1 class="text-center">Agregar Categoría</h1>
    <form class="row px-2 px-md-0 ps-md-5 pb-3" action="/Dashboard/dashboard?View=<?php echo $View;?><?php echo isset($id) ? '&id=' . $id : ''?>" method="POST">
        <div class="col-12 col-md-9 col-lg-5">
            <legend>Nombre: </legend>
            <input class="form-control" name="categoria[nombre_categoria]" type="text" value=<?php echo s($categoria->nombre_categoria) ?>>
        </div> 
        <div class="row">
            <div class="col-12 col-md-11 col-lg-7">
                <legend>Descripción: </label>
                <textarea class="form-control" name="categoria[descripcion_categoria]" type="text"><?php echo s($categoria->descripcion_categoria) ?> </textarea>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-12 text-center ">
                <input class="btn btn-primary" type="submit" value="Registrar">
                <a class="btn btn-secondary" type="button" href="/Dashboard/dashboard?-">Volver</a>
            </div>
        </div>
    </form>

</div>