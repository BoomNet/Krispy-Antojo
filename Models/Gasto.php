<?php  
    namespace Model;

    class Gasto extends ActiveRecord{
        protected static $Tabla = "gasto";
        protected static $columnaDB = ['id', 'descripcion_gasto', 'previsto_gasto', 'real_gasto', 'diferente_gasto', 'fechacrea_gasto', 'fechamod_gasto', 'cveusuario_gasto'];

        public $id;
        public $descripcion_gasto;
        public $previsto_gasto;
        public $real_gasto;
        public $diferente_gasto;
        public $fechacrea_gasto;
        public $fechamod_gasto;
        public $cveusuario_gasto;

        public function __construct($args = [])
        {
            $this->descripcion_gasto = $args['descripcion_gasto'] ?? '';
            $this->previsto_gasto = $args['previsto_gasto'] ?? '';
            $this->real_gasto = $args['real_gasto'] ?? null;
            $this->diferente_gasto = $args['diferente_gasto'] ?? null;
            $this->fechacrea_gasto = date('Y/m/d');
            $this->fechamod_gasto = null;
            $this->cveusuario_gasto = $args['cveusuario_gasto'] ?? 25;
        }

        public function ValidarGasto(){
            if(!$this->descripcion_gasto){
                self::$Errores[] = "La descripcion es obligatoria";
            }
            if(!$this->previsto_gasto){
                self::$Errores[] = "La cantidad prevista es obligatoria";
            }
            return self::$Errores;
        }

        public static function allSpending(){
            $query = "SELECT gasto.id, descripcion_gasto, previsto_gasto, real_gasto, diferente_gasto, nombre_usuario, apellidopa_usuario, apellidoma_usuario FROM gasto INNER JOIN usuario ON gasto.cveusuario_gasto = usuario.id";
            $Resultado = self::$db->query($query);
            $All = [];
            while($row = $Resultado->fetch_assoc()){
                $All[] = $row;
            }
            return $All;
        }
    }

?>