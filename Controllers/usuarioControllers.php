<?php 
    namespace Controllers;

use Exception;
use Model\Usuario;
    use Model\Rol;
    use MVC\Router;

    class usuarioControllers{
        public static function crear(Router $router){
            $View = GetView('/Dashboard/dashboard?View=1');
            $usuario = new Usuario;
            $Rol = Rol::all();
            $Errores = Usuario::getError();
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
        public static function actualizar(Router $router){
            $id = ValidarORedireccionar('/admin');
            $Errores = Usuario::getError();
            $usuario = Usuario::find($id);
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $args = $_POST['usuario'];
                $usuario->sincronizar($args);
                $Errores = $usuario->ValidarUsuario();
                if(empty($Errores)){
                    $usuario->Guardar();
                }
            }
            $router->render('usuario/actualizar', [
                'usuario' => $usuario,
                'Errores' => $Errores
            ]);
        }
        public static function eliminar(){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if($id){
                $usuario = Usuario::find($id);
                $usuario->eliminar();
            }
        }
    }
?>