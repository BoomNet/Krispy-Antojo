<div class="bg-light  m-5">
    <div class="">
        <div class="row justify-content-center mb-5 pt-5">
        <!-- CATEGORIA-PRODUCTO-CANTIDAD -->
            <form id="formularioVenta">
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
                        <button type="submit" class="btn btn-light text-center">Agregar</button>
                    </div>
                </div>
            </form>
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
                            <tbody id="detallesBody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row bg-secondary align-items-center  py-3 mx-5 mb-2">
            <div class="col-12 col-md-6 col-lg-7 text-center fs-5 d-flex">
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