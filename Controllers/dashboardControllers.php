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
                    $usuario = new Usuario;
                    $Rol = Rol::all();
                    $Errores = Usuario::getError();
                    $router->render('/Dashboard/dashboard',[
                        'usuario' => $usuario,
                        'Errores' => $Errores,
                        'Rol' => $Rol,
                        'View' => $View
                    ]);
                    break;
                case 3: 
                    break;
                case 4:
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
                case 2:      
                    static::PostUser($router, $View);
                    break;
                default:    
                    break;
            }
        }

        /* ******-----GET------****** */
        
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
                            }
                            else{
                                $Errores = Usuario::getError();
                            }
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