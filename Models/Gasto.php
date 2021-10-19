<?php  
    namespace Model;

    class Gasto extends ActiveRecord{
        protected static $Tabla = "gasto";
        protected static $ColumnaDB = ['cve_gasto', 'descripcion_gasto', 'cantidad_gasto', 'fecha_gasto', 'cveusuario_gasto'];

        public $cve_gasto;
        public $descripcion_gasto;
        public $cantidad_gasto;
        public $fecha_gasto;
        public $cveusuario_gasto;

        public function __construct($args = [])
        {
            $this->descripcion_gasto = $args['descripcion_gasto'];
            $this->cantidad_gasto = $args['cantidad_gasto'];
            $this->fecha_gasto = date('Y/m/d');
            $this->cveusuario_gasto = $args['cveusuario_gasto'];
        }

        public function ValidarGasto(){
            if(strlen($this->descripcion_gasto) < 50){
                self::$Errores[] = "La descripcion es obligatoria y debe tener al menos 50 caracteres";
            }
            if(!$this->cantidad_gasto){
                self::$Errores[] = "La cantidad es obligatoria";
            }
            if(!$this->cveusuario_gasto){
                self::$Errores[] = "El usuario es obligatorio";
            }
        }
    }

?>