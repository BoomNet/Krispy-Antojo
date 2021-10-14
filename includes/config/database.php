<?php
define('DB_HOST', 'bajk3pstup1xeoyoztfm-mysql.services.clever-cloud.com');
define('DB_USER', 'uue7rg1shwfrml7n');
define('DB_PASS', 'tjn4MScWgVeLZVPgTes2');
define('DB_NAME', 'bajk3pstup1xeoyoztfm');

function conectarDB(): mysqli
{
    $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$db) {
        echo 'Error en la conexion';
        exit;
    }
    return $db;
}
