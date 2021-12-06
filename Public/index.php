<?php 
    require_once __DIR__ . "/../includes/app.php";
    use MVC\Router;    
    use Controllers\loginControllers;
    use Controllers\usuarioControllers;
    use Controllers\dashboardControllers;
    use Controllers\productoControllers;
    use Controllers\APIControllers;

    $Router = new Router();

    //LOGIN AREA
    $Router->get('/', [loginControllers::class, 'index']);
    $Router->post('/', [loginControllers::class, 'login']);
    $Router->get('/logout', [loginControllers::class, 'logout']);

    //DASHBOARD AREA
    $Router->get('/Dashboard/dashboard', [dashboardControllers::class, 'getViews']);
    $Router->post('/Dashboard/dashboard', [dashboardControllers::class, 'postViews']);
    $Router->post('/Dashboard/eliminar', [usuarioControllers::class, 'Eliminar']);
    $Router->post('/Dashboard/eliminar-producto', [productoControllers::class, 'Eliminar']);

    //API
    $Router->post('/Dashboard/modal', [APIControllers::class, 'guardarGasto']);
    $Router->get('/Dashboard/getGasto', [APIControllers::class, 'getGasto']);
    $Router->post('/Dashboard/editar-gasto', [APIControllers::class, 'editarGasto']);
    $Router->post('/Dashboard/eliminar-gasto', [APIControllers::class, 'eliminarGasto']);
    $Router->ComprobarRutas();
?>