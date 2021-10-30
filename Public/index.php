<?php 
    require_once __DIR__ . "/../includes/app.php";
    use MVC\Router;    
    use Controllers\paginaControllers;
    $Router = new Router();

    //PUBLIC AREA
    $Router->get('/', [paginaControllers::class, 'index']);
    $Router->get('/pagina/crear', [paginaControllers::class], 'crear');

    $Router->ComprobarRutas();
?>