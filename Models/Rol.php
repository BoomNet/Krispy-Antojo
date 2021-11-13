<?php 
    namespace Model;

    class Rol extends ActiveRecord{
        public static $Tabla = "rol";
        public static $ColumnaDB = ['id', 'rol'];

        public $id;
        public $rol;

        public function __construct($args = [])
        {
            $this->id = $args['id'] ?? null;
            $this->rol = $args['rol'] ?? '';
        }

        public function validarRol(){
            if(!$this->rol){
                self::$Errores[] = "El rol debe ser obligatorio";
            }
        }
    }
?>