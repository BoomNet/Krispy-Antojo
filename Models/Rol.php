<?php 
    namespace Model;

    class Rol extends ActiveRecord{
        public static $Tabla = "rol";
        public static $ColumnaDB = ['cve_rol', 'rol'];

        public $cve_rol;
        public $rol;

        public function __construct($args = [])
        {
            $this->rol = $args['rol'];
        }
    }
?>