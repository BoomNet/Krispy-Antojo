<?php 
    namespace Controllers;
    use Model\Gasto;
    class APIControllers{
        public static function guardarGasto(){
            $gasto = new Gasto($_POST);
            $resultado = $gasto->Guardar();
            echo json_encode(['resultado' => $resultado]);
        }
    }
?>