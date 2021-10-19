<?php 
    namespace Controllers;
    use MVC\Router;
    use Model\Marca;
use Model\Rol;

class marcaControllers{
        public static function crear(Router $router){
            $marca = new Marca;
            $Errores = Marca::getError();
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $marca = new Marca($_POST['marca']);
                $Errores = $marca->ValidarMarca();
                if(empty($Errores)){
                    $marca->Guardar();
                }
            }
            $router->render('marca/crear', [
                'marca' => $marca,
                'Errores' => $Errores
            ]);
        }
    
        public static function actualizar(Router $router){
            $id = ValidarORedireccionar('/admin');
            $Errores = Marca::getError();
            $marca = Marca::find($id);
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $args = new Marca($_POST['marca']);
                $marca->Sincronizar($args);
                $Errores = $marca->validarRol();
                if(empty($Errores)){
                    $marca->Guardar();
                }
            }
            $router->render('/marca/actualizar');            
        }
    
        public static function Eliminar(){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if($id){
                $marca = Marca::find($id);
                $marca->eliminar();
            }
        }
    }
    
?>