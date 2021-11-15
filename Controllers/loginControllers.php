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
        public static function logout(){
            // Inicializar la sesión.
            // Si está usando session_name("algo"), ¡no lo olvide ahora!
            // Destruir todas las variables de sesión.
            $_SESSION = array();

            // Si se desea destruir la sesión completamente, borre también la cookie de sesión.
            // Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
            // Finalmente, destruir la sesión.
            session_destroy();
            header('Location: /');
        }
    }
?>