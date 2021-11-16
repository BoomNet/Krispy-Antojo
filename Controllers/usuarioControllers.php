<?php 
    namespace Controllers;
    use Model\Usuario;

    class usuarioControllers{
        public static function Eliminar(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $id = $_POST['id'];
                $id = filter_var($id, FILTER_VALIDATE_INT);
                if($id){
                    $usuario = Usuario::find($id);
                    $Resultado = $usuario->eliminar();
                    if($Resultado){
                        header('Location: /Dashboard/dashboard?View=2');
                    }
                }
            }   
        }
    }
?>