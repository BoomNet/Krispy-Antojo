<?php 
    namespace Controllers;
    use MVC\Router;
    use Model\Producto;

    class productoControllers{
        public static function Eliminar(){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if($id){
                $producto = Producto::find($id);
                $guardado = $producto->eliminar();
                if($guardado){
                    header('Location: /Dashboard/dashboard?View=5');
                }
            }
        }
    }
?>