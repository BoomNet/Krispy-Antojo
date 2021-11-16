<?php 
    require_once __DIR__ . "/../includes/app.php";
    use MVC\Router;    
    use Controllers\loginControllers;
    use Controllers\usuarioControllers;
    use Controllers\dashboardControllers;

    $Router = new Router();

    //LOGIN AREA
    $Router->get('/', [loginControllers::class, 'index']);
    $Router->post('/', [loginControllers::class, 'login']);
    $Router->get('/logout', [loginControllers::class, 'logout']);

    //DASHBOARD AREA
    $Router->get('/Dashboard/dashboard', [dashboardControllers::class, 'getViews']);
    $Router->post('/Dashboard/dashboard', [dashboardControllers::class, 'postViews']);
    $Router->post('/Dashboard/eliminar', [usuarioControllers::class, 'Eliminar']);
    $Router->ComprobarRutas();
?>