<section class="bg-login" style="width: 100%; height: 100vh">
    <main class="container ">
        <div class="row justify-content-center ">
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 mt-1">
                <form class="bg-white text-center flex-column bd-highligh px-3 pt-3 rounded-p shadow" style="height: 550px;" method="POST" action="/">
                    <img class="img-fluid ps-lg-2 py-3" src="/build/img/Logo.png" alt="">
                    <h1 class="h4 mb-3">INICIAR SESION</h1>
                    <!-- Correo -->
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
                    <div class="col-12 form-floating px-3">
                        <input type="text" class="form-ctrl " id="correo" placeholder="Correo" name="correo_usuario">
                    </div>
                    <!-- Contraseña -->
                    <div class="col-12 form-floating px-3 mt-3">
                        <input type="password" id="password" class="form-ctrl" placeholder="Contraseña" name="contrasenia_usuario">
                    </div>
                    <button type="submit" class="w-75 button btn-lg btn-rosa rounded-pill text-center my-4">INICIAR SESION</button>
                    <div  class="bd-highligh pt-5">
                        <p class="form-text pt-5">¿No tienes una cuenta? <a href="/Pagina/formulario-crear" class="text-decoration-none">Registrate</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </main>
</section>



<!-- <div class="container">
    <div class="row justify-content-center col">
        <div class="contenido-login">
            <div class="formulario-login">
                <div class="pictures">
                    <img src="/build/img/Logo.png" alt="Logo Krispy">
                </div>
                <?php include __DIR__ . "/formulario-login.php"?>
            </div>
        </div>
    </div>
</div> -->
