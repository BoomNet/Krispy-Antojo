<?php 
    require_once __DIR__ . "/../includes/app.php";
    use MVC\Router;    
    use Controllers\paginaControllers;
    use Controllers\usuarioControllers;

    $Router = new Router();

    //PUBLIC AREA
    $Router->get('/', [paginaControllers::class, 'index']);
    $Router->post('/', [paginaControllers::class, 'login']);
    $Router->get('/Pagina/crear', [usuarioControllers::class, 'crear']);

    $Router->ComprobarRutas();
?>