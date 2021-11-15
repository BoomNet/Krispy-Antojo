<?php 
    namespace Controllers;
    use MVC\Router;
    use Model\Usuario;
    class loginControllers{
        public static function index(Router $router){
            $Errores = Usuario::getError();
            $router->render('/Auth/login', [
                'Errores' => $Errores
            ]);
        }
        public static function login(Router $router){
            $Errores = Usuario::getError();
            $login = new Usuario;
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $login = new Usuario($_POST);
                $Errores = $login->validarLogin();
                if(empty($Errores)){
                    //Verificar que el correo no exista
                    $Resultado = $login->existeEmail();
                    if(!$Resultado){
                        $Errores = Usuario::getError();
                    }else{
                        //Verificar el password
                        $Autenticado = $login->comprobarPassword($Resultado);
                        if($Autenticado){
                            $login->autenticar();
                        }else{
                            $Errores = Usuario::getError();
                        }
                    }
                }
            }
            $router->render('/Auth/login', [
                'Errores' => $Errores
            ]);
        }
    }
?>