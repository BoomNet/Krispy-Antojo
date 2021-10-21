<?php 
    namespace Controllers;
    use MVC\Router;
    use Model\Producto;

    class productoControllers{
        public static function crear(Router $router){
            $producto = new Producto;
            $Errores = Producto::getError();
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $producto = new Producto($_POST['producto']);
                $Errores = $producto->validarProducto();
                if(empty($Errores)){
                    $producto->Guardar();
                }
            }
            $router->render('producto/crear', [
                'producto' => $producto,
                'Errores' => $Errores
            ]);
        }

        public static function actualizar(Router $router){
            $id = ValidarORedireccionar('/admin');
            $Errores = Producto::getError();
            $producto = Producto::find($id);            
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $args = new Producto($_POST['producto']);
                $producto->Sincronizar($args);
                $Errores = $producto->validarRol();
                if(empty($Errores)){
                    $producto->Guardar();
                }
            }
            $router->render('/producto/actualizar');            
        }

        public static function Eliminar(){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if($id){
                $producto = Producto::find($id);
                $producto->eliminar();
            }
        }
    }
?>