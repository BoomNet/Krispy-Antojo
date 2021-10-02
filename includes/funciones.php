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

    function ValidarORedireccionar($url){
        $idPropiedad = intval($_GET['id']);
        $id = filter_var($idPropiedad, FILTER_VALIDATE_INT);
        if(!$id){
            header("Location: ${url}");
        }
        return $id;
    }
?>