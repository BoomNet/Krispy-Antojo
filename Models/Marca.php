<?php 
    namespace Model;

    class Marca extends ActiveRecord{
        public static $Tabla = "marca";
        public static $columnaDB = ['id', 'nombre_marca', 'descripcion_marca'];
        
        public $id;
        public $nombre_marca;
        public $descripcion_marca;

        public function __construct($args = [])
        {
            $this->nombre_marca = $args['nombre_marca'] ?? '';
            $this->descripcion_marca = $args['descripcion_marca'] ?? '';
        }

        public function ValidarMarca(){
            if(!$this->nombre_marca){
                self::$Errores[] = "La marca es obligatoria";
            }
            if(!$this->descripcion_marca){
                self::$Errores[] = "La descripción es obligatoria";
            }
            return self::$Errores;
        }
    }
?>