<div class="rounded-p m-5 mt-5">
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Gastos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="errores-modal">

                    </div>
                    <form method="POST" id="modal-gasto">
<<<<<<< HEAD
                        <input type="hidden" id="idmodal" name="cveusuario_gasto" value="<?php echo $id;?>">
                        <input type="hidden" id="idgasto">
=======
                        <input type="hidden" id="idmodal" name="id" value="">
>>>>>>> dev
                        <div class="mb-3">
                            <label class="form-label required">Descripción</label>
                            <textarea cols="30" rows="5" class="form-control" name="descripcion_gasto" id="descripcion"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Previsto</label>
                            <input type="number" class="form-control" name="previsto_gasto" id="previsto">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Gasto real</label>
                            <input type="number" class="form-control" name="real_gasto" id="real">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="rounded-p m-5">
    <div class="gastos">
<<<<<<< HEAD
        <h2>Previsto: $<?php echo $Previsto;?></h2>
        <h2>Real: $<?php echo $Total;?></h2>
=======
        <h2>Previsto: </h2>
        <h2>Real: </h2>
>>>>>>> dev
    </div>
    <!-- TABLA -->
    <div class="row align-items-center justify-content">
        <div class="col-12">
            <div class="table-responsive text-center ">
                <table class="table table-hover table-sm ">
                    <thead class="table-info">
                        <tr>
                            <th>Descripción</th>
                            <th>Previsto</th>
                            <th>Gasto Real</th>
                            <th>Diferencia</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php foreach($allSpending as $spending):?>        
                            <tr>
                                <td><?php echo $spending['descripcion_gasto'];?></td>
                                <td>$<?php echo $spending['previsto_gasto'];?></td>
                                <td>$<?php echo $spending['real_gasto'];?></td>
                                <td id="diferenteTable"><?php echo $spending['diferente_gasto'];?></td>
                                <td><?php echo $spending['nombre_usuario'] . " " . $spending['apellidopa_usuario'] . " " . $spending['apellidoma_usuario'];?></td>
                                <td class="acciones-edit">
                                    <button type="button" class="btn actualizar btn-gasto" data-bs-toggle="modal" data-bs-target="#myModal" id="<?php echo $spending['id'];?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" class="svg">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </button>
                                    <form method="POST" id="btn-eliminar">
                                        <input type="hidden" id="eliminar-gasto" name="id" value="<?php echo $spending['id'];?>">
                                        <button type="submit" class="btn eliminar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash svg" viewBox="0 0 16 16">
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
            </div>
        </div>
    </div>
    <a type="button" class="btn btn-success btn-gasto mt-5" data-bs-toggle="modal" data-bs-target="#myModal">Agregar Gasto</a>
</div>

