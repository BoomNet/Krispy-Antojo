<?php 
    namespace Controllers;
    use MVC\Router;
    
    class dashboardControllers {
        public static function dash(Router $router){
            $View = GetView('/Dashboard/dashboard');
            $View = filter_var($View, FILTER_VALIDATE_INT);
            $router->render('/Dashboard/dashboard', [
                'View' => $View
            ]);
        }
    }
?>  