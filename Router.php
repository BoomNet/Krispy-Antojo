<?php 
    namespace MVC;
    class Router{
        public $RutasGET = [];
        public $RutasPOST = [];

        public function get($url, $fn){
            $this->RutasGET[$url] = $fn;
        }
        public function post($url, $fn){
            $this->RutasPOST[$url] = $fn;
        }

        public function ComprobarRutas(){
            session_start();
            $Autenticado = $_SESSION['login'] ?? null;
            $rutasProtegidas = ['/Dashboard/dashboard'];
            $UrlActual = $_SERVER['PATH_INFO'] ?? '/';
            $Metodo = $_SERVER['REQUEST_METHOD'];
            

            if($Metodo === 'GET'){
                $fn = $this->RutasGET[$UrlActual] ?? null;
            } else{
                $fn = $this->RutasPOST[$UrlActual] ?? null;
            }
            //Proteger las rutas
            if(in_array($UrlActual, $rutasProtegidas) && !$Autenticado){
                header('Location: /');
            }
            if($fn){
                //La URL existe y hay una funcion asociada
                //php -S localhost:3000
                call_user_func($fn, $this);
            }else{
                //Pagina 404
                echo "Pagina no encontrada";
            }
        }
        //Muestra una vista
        public function render($view, $Datos = []){
            foreach($Datos as $key => $value){
                $$key = $value;
            }
            ob_start(); //Almacena en memoria esa vista
            include __DIR__ . "/Views/$view.php";
            $Contenido = ob_get_clean(); //Limpiamos en memoria
            include __DIR__ . "/Views/layout.php";
        }
    }
?>