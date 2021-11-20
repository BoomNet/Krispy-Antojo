<?php 
    namespace Controllers;
    use Model\Usuario;
    class APIDashboard{
        public static function getUser(){
            $usuario = new Usuario;
            $res = $usuario->AllUser();
            echo json_encode($res);
        }
    }
?>