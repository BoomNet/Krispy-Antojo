<?php 
    namespace Controllers;
    use Model\Usuario;
    use Model\Rol;
    use MVC\Router;
    
    class dashboardControllers {

        public static function getViews(Router $router){
            $View = GetView('/Dashboard/dashboard');
            switch($View){
                case 1: 
                    $router->render('/Dashboard/dashboard', [
                        'View' => $View
                    ]);
                    break;
                case 2: 
                    static::GetUsers($router, $View);
                    break;
                case 3: 
                    static::getInfoUser($router, $View);
                    break;
                case 4:
                    static::getIdUser($router, $View);
                    break;
                case 5:
                    break;
                case 6; 
                    break;
                default: 
                    break;
            }
        }

        public static function postViews(Router $router){
            $View = GetView('/Dashboard/dashboard');
            switch($View){
                case 3:      
                    static::PostUser($router, $View);
                    break;
                case 4:
                    static::getIdUser($router, $View);
                    break;
                default:    
                    break;
            }
        }

        /* ******-----GET------****** */
        public static function GetUsers($router, $View){
            $usuario = new Usuario;
            $allUsers = $usuario->AllUser();
            $router->render('/Dashboard/dashboard',[
                'allUsers' => $allUsers,
                'View' => $View
            ]);
        }
        public static function getInfoUser($router, $View){
            $usuario = new Usuario;
            $Rol = Rol::all();
            $Errores = Usuario::getError();
            $router->render('/Dashboard/dashboard',[
                'usuario' => $usuario,
                'Errores' => $Errores,
                'Rol' => $Rol,
                'View' => $View
            ]);
        }
        public static function getIdUser($router, $View){
            $id = Validar();
            $usuario = Usuario::find($id);
            $Errores = Usuario::getError();
            $Rol = Rol::all();
           
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $args = $_POST['usuario'];
                $usuario->Sincronizar($args);
                $Errores = $usuario->ValidarUsuario();
                if(empty($Errores)){
                    $guardado = $usuario->Guardar();
                    if($guardado){
                        header('Location: /Dashboard/dashboard?View=2');
                    }
                }
            }
            $router->render('/Dashboard/dashboard', [
                'View' => $View,
                'usuario' => $usuario,
                'Errores' => $Errores,
                'Rol' => $Rol,
                'id' => $id
            ]);
        }
        
        /* ******-----POST------****** */
        public static function PostUser($router, $View){
            $Rol = Rol::all();
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $usuario = new Usuario($_POST['usuario']);
                $Errores = $usuario->ValidarUsuario();
                if(empty($Errores)){
                    $Resultado = $usuario->existeUsuario();
                    if(!$Resultado){
                        $Errores = Usuario::getError();
                    }else{
                        $comparado = $usuario->CompararPassword();
                        if($comparado){
                            $usuario->hashPassword();
                            unset($usuario->confirm_contrasenia);
                            $usuario->fechamod_usuario = null;
                            $guardado = $usuario->Guardar();
                           if($guardado){
                               header('Location: /Dashboard/dashboard?View=2');
                           }
                        }else{
                            $Errores = Usuario::getError();
                        }
                    }
                }
            }
            $router->render('/Dashboard/dashboard',[
                'usuario' => $usuario,
                'Errores' => $Errores,
                'Rol' => $Rol,
                'View' => $View
            ]);
        }
    }
    
?>  