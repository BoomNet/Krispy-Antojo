<div class="bg-light  m-5">
    <form method="POST" id="finalizarVenta">
        <!-- CATEGORIA-PRODUCTO-CANTIDAD -->
        <div class="row justify-content-center d-flex mb-5 pt-5" id="formularioVenta">
            <div class="col-12 col-md-5 col-lg-4 fs-5 bg-warning rounded  py-5 ">
                <div class="row fs-5">
                    <div class="col justify-content-center align-items-center d-flex">
                        <p class="pe-2 pt-3">Categoría:</p>
                        <select name="" id="categoria" style="width: 50%;">
                            <option selected disabled>Selecione una categoría</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col justify-content-center align-items-center d-flex">
                        <p class="pe-3 pt-3">Producto:</p>
                        <select name="" style="width: 50%;" id="producto">
                            <option selected disabled>Selecione un producto</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col justify-content-center align-items-center d-flex">
                        <p class="pe-2 pt-3">Cantidad:</p>
                        <input id="cantidad" type="number" style="width: 50%;">
                    </div>
                </div>
                <div class="col text-center pt-5">
                    <button class="btn btn-light text-center agregarProducto">Agregar</button>
                </div>
            </div>
        
        <!-- TABLA -->
            <div class="col-12 col-md-6 col-lg-7 fs-5 bg-white border rounded ms-0 mt-3  ms-lg-3 mt-lg-0">
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
                            <tbody id="detallesBody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row bg-secondary align-items-center  py-3 mx-0 mx-lg-5 mb-2">
            <div class="col-12 col-md-6 col-lg-7 text-center fs-5 d-lg-flex mb-3 mb-lg-0">
                <div class="col text-white">
                    Cantidad<br>
                    <input type="number" id="cantidadPagar">
                </div>
                <div class="col text-white">
                    Cambio<br>
                    <input type="number" id="cambioPago" disabled>
                </div>
                <div class="col text-white">
                    Total<br>
                    <input type="number" id="totalPagar" disabled>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-5 text-center d-flex">
                <div class="col">
                    <button type="button" class="btn btn-lg btn-danger btn-cancelar">Cancelar Venta</button>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-lg btn-success">Finalizar Venta</button>
                </div>
            </div>
        </div>
    </form>
</div>