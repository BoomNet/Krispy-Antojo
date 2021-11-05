<?php 
    namespace Controllers;
    use MVC\Router;
    
    class dashboardControllers {
        public static function dash(Router $router){
            $router->render('/Dashboard/dashboard');
        }
    }
?>  