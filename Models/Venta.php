<?php 
    namespace Model;

    class Venta extends ActiveRecord{
        public static $Tabla = "venta";
        public static $ColumnaDB = ['id', 'feha_venta', 'cveusuario_venta', 'hora_venta', 'total_venta', 'cveproducto_venta', 'cantidad_venta'];

        public $id;
        public $fecha_venta;
        public $cveusuario_venta;
        public $hora_venta;
        public $total_venta;
        public $cveproducto_venta;

        public function __construct($args = [])
        {
            $this->fecha_venta = date('Y/m/d');
            $this->cveusuario_venta = $args['cveusuario_venta'];
            $this->hora_venta = time('H:i:s');
            $this->total_venta = $args['total_venta'];
            $this->cveproducto_venta = $args['cveproducto_venta'];
        }
    }

?> 