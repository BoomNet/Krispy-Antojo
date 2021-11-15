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

    //DASHBOARD AREA
    $Router->get('/Dashboard/dashboard', [dashboardControllers::class, 'dash']);
    $Router->get('/Dashboard/dashboard', [usuarioControllers::class, 'crear']);
    $Router->post('/Dashboard/dashboard', [usuarioControllers::class, 'crear']);
    
    $Router->ComprobarRutas();
?>