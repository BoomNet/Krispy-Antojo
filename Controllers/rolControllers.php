<?php 
    namespace Controllers;
    use Model\Rol;
use Model\Usuario;
use MVC\Router;
    
    class rolControllers{
        public static function crear(Router $router){
            $rol = new Rol;
            $Errores = Rol::getError();
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $rol = new Rol($_POST['rol']);
                $Errores = $rol->validarRol();
                if(empty($Errores)){
                    $rol->Guardar();
                }
            }
            $router->render('rol/crear', [
                'rol' => $rol,
                'Errores' => $Errores
            ]);
        }

        public static function actualizar(Router $router){
            $id = ValidarORedireccionar('/admin');
            $Errores = Rol::getError();
            $rol = Rol::find($id);            
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $args = new Rol($_POST['rol']);
                $rol->Sincronizar($args);
                $Errores = $rol->validarRol();
                if(empty($Errores)){
                    $rol->Guardar();
                }
            }
            $router->render('/rol/actualizar');            
        }

        public static function Eliminar(){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if($id){
                $rol = Rol::find($id);
                $rol->eliminar();
            }
        }

    }
?>