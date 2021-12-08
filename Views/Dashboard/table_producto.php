<div class="rounded-p m-5">
    <div class="row">
            <div class="col-12"><h1 class="h2 text-center ">Tabla de Productos</h1></div>
        </div>
        <div class="row acciones">
            <div class="col-12 d-flex buscador">
                <a href="/Dashboard/dashboard?View=6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </a>
                <div class="buscar">
                    <form action="/Dashboard/dashboard?View=5" method="POST">
                        <input type="search" class="input-buscador" name="busqueda" id="input-buscador" placeholder="Busca por nombre o marca...">
                        <input type="submit" value="Buscar">
                    </form>
                </div>
            </div>
        </div>
        <!-- TABLA -->
        <div class="row align-items-center justify-content">
            <div class="col-12">
                <div class="table-responsive text-center ">
                    <table class="table table-hover table-sm ">
                        <thead class="table-info">
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Precio Compra</th>
                                <th>Precio Venta</th>
                                <th>Stock</th>
                                <th>Categoría</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php foreach($allProducts as $products):?>
                                <tr>
                                    <td><?php echo $products['id']?></td>
                                    <td><?php echo $products['nombre_producto']?></td>
                                    <td><?php echo $products['precioCompra_producto']?></td>
                                    <td><?php echo $products['precioVenta_producto']?></td>
                                    <td><?php echo $products['stock_producto']?></td>
                                    <td><?php echo $products['nombre_categoria']?></td>
                                    <td class="acciones-edit">
                                        <a href="/Dashboard/dashboard?View=7&id=<?php echo $products['id'];?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </a>
                                        <form action="/Dashboard/eliminar-producto" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $products['id'];?>">
                                            <button type="submit" class="btn eliminar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <?php
                        if(isset($Errores)){
                            foreach($Errores as $error){
                                ?>
                                    <?php echo $error?>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>