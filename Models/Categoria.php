<?php 
    namespace Model;

    class Categoria extends ActiveRecord{
        public static $Tabla = "categoria";
        public static $columnaDB = ['id', 'nombre_categoria', 'descripcion_categoria'];
        
        public $id;
        public $nombre_categoria;
        public $descripcion_categoria;

        public function __construct($args = [])
        {
            $this->nombre_categoria = $args['nombre_categoria'] ?? '';
            $this->descripcion_categoria = $args['descripcion_categoria'] ?? '';
        }

        public function ValidarMarca(){
            if(!$this->nombre_categoria){
                self::$Errores[] = "La marca es obligatoria";
            }
            if(!$this->descripcion_categoria){
                self::$Errores[] = "La descripción es obligatoria";
            }
            return self::$Errores;
        }
    }
?>