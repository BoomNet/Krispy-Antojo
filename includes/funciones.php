<?php
    define('TEMPLATES_URL', __DIR__ . '/templates');
    define('FUNCIONES_URL', __DIR__ .'funciones.php');
    
    function Debuguear($Variable){
        echo "<pre>";
        var_dump($Variable);
        echo "</pre>";
        exit;
    }

    function s($html) : string{
        $s = htmlspecialchars($html);
        return $s;
    }

    function validarTipoContenido($Tipo){
        $Tipos = ['vendedor', 'propiedad'];
        return in_array($Tipo, $Tipos);
    }

    function mostrarNotificacion($codigo){
        $mensaje = '';
        switch($codigo){
            case 1: 
                $mensaje = 'Creado Correctamente';
                break;
            case 2: 
                $mensaje = 'Actualizado Correctamente';
                break;
            case 3:
                $mensaje = 'Eliminado Correctamente';
                break;
            default: 
                $mensaje = false;
                break;
        }
        return $mensaje;
    }

    function Validar(){
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);
        $idPropiedad = intval($queries['id']);
        $id = filter_var($idPropiedad, FILTER_VALIDATE_INT);
        /* if(!$id){
            header('Location: /Dashboard/dashboard?View=1');
        } */
        return $id;
    }
    function GetView($url){
        $view = intval($_GET['View']) ?? null;
        if(isset($view)){
            $View = filter_var($view, FILTER_VALIDATE_INT);
            if(!$View){
                header("Location: ${url}");
            }
            return $View;
        }
        
    }
?>