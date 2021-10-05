<?php 
    namespace Controllers;
    use MVC\Router;

    class paginaControllers{
        public static function index(Router $router){
           $router->render('/Pagina/index');
        }
    }
?>