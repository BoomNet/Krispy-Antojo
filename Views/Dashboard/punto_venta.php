<div class="bg-light  m-5">
    <div class="">
        <div class="row justify-content-center mb-5 pt-5">
        <!-- CATEGORIA-PRODUCTO-CANTIDAD -->
            <div class="col-12 col-md-5 col-lg-4 fs-5 bg-warning rounded  py-5 mb-5">
                <div class="row fs-5">
                    <div class="col justify-content-center align-items-center d-flex">
                        <p class="pe-2 pt-3">Categoría:</p>
                        <select name="" disabled="disabled" style="width: 50%;">
                            <option selected>Selecione una categoría</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col justify-content-center align-items-center d-flex">
                        <p class="pe-3 pt-3">Producto:</p>
                        <select name="" disabled="disabled" style="width: 50%;">
                            <option selected>Selecione un producto</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col justify-content-center align-items-center d-flex">
                        <p class="pe-2 pt-3">Cantidad:</p>
                        <input type="number" disabled style="width: 50%;">
                    </div>
                </div>
                <div class="col text-center pt-5">
                    <button type="button" class="btn btn-light text-center">Agregar</button>
                </div>
            </div>
        <!-- TABLA -->
            <div class="col-12 col-md-6 col-lg-7 fs-5 bg-white border rounded ms-3">
                <div class="col">
                    <div class="table-resposive text-center">
                        <table class="table table-hover table-sm">
                            <thead class="table-info">
                                <th>Producto</th>
                                <th>Descripción del Producto</th>
                                <th>Precio Unitario</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="submit" class="btn eliminar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row bg-secondary align-items-center  py-3 mx-5 mb-2">
            <div class="col-12 col-lg-7 text-center fs-5 d-lg-flex">
                <div class="col text-white">
                    Cantidad<br>
                    <input type="number" >
                </div>
                <div class="col text-white">
                    Cambio<br>
                    <input type="number" disabled>
                </div>
                <div class="col text-white">
                    Total<br>
                    <input type="number" disabled>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-5 text-center d-flex">
                <div class="col">
                    <button type="button" class="btn btn-lg btn-danger">Cancelar Venta</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-lg btn-success">Finalizar Venta</button>
                </div>
            </div>
        </div>

    </div>
</div>