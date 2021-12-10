<?php 
    namespace Controllers;

    use Model\Categoria;
    use Model\Gasto;
    use Model\Producto;
    use Model\Venta;

class APIControllers{
        public static function getGasto(){
            $gasto = new Gasto;
            $resultado = $gasto->allSpending();
            echo json_encode(['resultado' => $resultado]);
        }
        public static function guardarGasto(){
            $gasto = new Gasto($_POST);
            $resultado = $gasto->Guardar();
            echo json_encode(['resultado' => $resultado]);
        }
        public static function editarGasto(){
            $args = $_POST;
            $id = $args['id'];
            $gasto = Gasto::find($id);
            $gasto->Sincronizar($args);
            $resultado = $gasto->Guardar();
            echo json_encode(['resultado' => $resultado]);
        }
        public static function eliminarGasto(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $id = $_POST['id'];
                $gasto = Gasto::find($id);
                $guardado = $gasto->eliminar();
                echo json_encode(['guardado' => $guardado]);
            }
            
        }

        /* PUNTO DE VENTA */

        public static function ObtenerCategoria(){
            $categoria = Categoria::all();
            echo json_encode(['resultado' => $categoria]);
        }

        public static function ObtenerProductos(){
            $producto = Producto::all();
            echo json_encode(['resultado' => $producto]);
        }

        public static function AgregarVenta(){
            $venta = new Venta($_POST);
            $resultado = $venta->Guardar();
            echo json_encode(['resultado' => $resultado]);
        }
    }
?>