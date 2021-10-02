<?php 
    function conectarDB() : mysqli{
        $db = new mysqli('localhost:3306', 'root', 'Jr5Loc$/', 'krispy_antojo');
        if(!$db){
            echo 'Error en la conexion';
            exit;
        }
        return $db;
    }
    
?>