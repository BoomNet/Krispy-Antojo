<?php 
    namespace Controllers;
    use Model\Gasto;
    class APIControllers{
        public static function guardarGasto(){
            $gasto = new Gasto($_POST);
            $resultado = $gasto->Guardar();
            echo json_encode(['resultado' => $resultado]);
        }
        public static function editarGasto(){
            
        }
        public static function eliminarGasto(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $id = $_POST['id'];
                $gasto = Gasto::find($id);
                $guardado = $gasto->eliminar();
                echo json_encode(['guardado' => $guardado]);
            }
            
        }
    }
?>