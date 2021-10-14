<?php 
    namespace Model;

    class Marca extends ActiveRecord{
        public static $Tabla = "gasto";
        public static $ColumnaDB = ['cve_marca', 'nombre_marca', 'descripcion_marca'];
        
        public $cve_marca;
        public $nombre_marca;
        public $descripcion_marca;

        public function __construct($args = [])
        {
            $this->nombre_marca = $args['nombre_marca'];
            $this->descripcion_marca = $args['descripcion_marca'];
        }
    }
?>