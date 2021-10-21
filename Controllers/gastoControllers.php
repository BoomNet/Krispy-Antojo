<?php 
    namespace Controllers;
    use Model\Gasto;
    use MVC\Router;

    class gastoControllers{
        public static function crear(Router $router){
            $gasto = new Gasto;
            $Errores = Gasto::getError();
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $gasto = new Gasto($_POST['gasto']);
                $Errores = $gasto->ValidarGasto();
                if(empty($Errores)){
                    $gasto->Guardar();
                }
            }
            $router->render('/gasto/crear', [
                'gasto' => $gasto,
                'Errores' => $Errores
            ]);
        }
        public static function Actualizar(Router $router){
            $id = ValidarORedireccionar('/admin');
            $Errores = Gasto::getError();
            $gasto = Gasto::find($id);
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $args = $_POST['gasto'];
                $gasto->Sincronizar($args);
                $Errores = $gasto->ValidarGasto();
                if(empty($Errores)){
                    $gasto->Guardar();
                }
            }
            $router->render('/gasto/actualizar', [
                'gasto' => $gasto,
                'Errores' => $Errores
            ]);
        }
        public static function Eliminar(){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if($id){
                $gasto = Gasto::find($id);
                $gasto->eliminar();
            }
        }
    }

?>