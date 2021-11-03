<?php 
    namespace Controllers;

use Model\Usuario;
use MVC\Router;

    class usuarioControllers{
        public static function crear(Router $router){
            $usuario = new Usuario;
            $Errores = Usuario::getError();
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $usuario = new Usuario($_POST['usuario']);
                $Errores = $usuario->ValidarUsuario();
                if(empty($Errores)){
                    $usuario->Guardar();
                }
            }
            $router->render('/Pagina/crear',[
                'usuario' => $usuario,
                'Errores' => $Errores
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