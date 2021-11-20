<div class="bg-body rounded-p m-5">
    <div class="row">
            <div class="col-12"><h1 class="h2 text-center ">Tabla de Usuarios</h1></div>
        </div>
        <div class="row acciones">
            <div class="col-12 d-flex buscador">
                <a href="/Dashboard/dashboard?View=3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </a>
                <div class="buscar">
                    <input type="text" class="input-buscador">
                    <a href=""><img src="/build/img/search-solid.svg" alt="Buscador"></i></a>
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
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Nombre de Usuario</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="table-user">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>