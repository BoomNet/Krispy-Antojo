<?php 
    require __DIR__ . "/../../vendor/autoload.php";  
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../../");
    $dotenv->load();
    function conectarDB() : mysqli{
        $mode = $_ENV;
        $db = new mysqli($mode['MYSQL_ADDON_HOST'], $mode['MYSQL_ADDON_USER'], $mode['MYSQL_ADDON_PASSWORD'], $mode['MYSQL_ADDON_DB']);
        if(!$db){
            echo 'Error en la conexion';
            exit;
        }
        return $db;
    }
    
?>