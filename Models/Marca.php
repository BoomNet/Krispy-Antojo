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

        public function ValidarMarca(){
            if(!$this->nombre_marca){
                self::$Errores[] = "La marca es obligatoria";
            }
            if(!$this->descripcion_marca){
                self::$Errores[] = "La descripción es obligatoria";
            }
        }
    }
?>