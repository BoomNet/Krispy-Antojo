<?php 
    namespace Model;

    class Venta extends ActiveRecord{
        public static $Tabla = "venta";
        public static $columnaDB = ['id', 'fecha_venta', 'cveusuario_venta', 'hora_venta', 'total_venta', 'cantidad_venta', 'pago_venta', 'cambio_venta'];

        public $id;
        public $fecha_venta;
        public $cveusuario_venta;
        public $hora_venta;
        public $total_venta;
        public $cantidad_venta;
        public $pago_venta;
        public $cambio_venta;


        public function __construct($args = [])
        {
            $this->fecha_venta = date('Y/m/d');
            $this->cveusuario_venta = $args['cveusuario_venta'] ?? '';
            $this->hora_venta = date('h:i:s');
            $this->total_venta = $args['total_venta'] ?? '';
            $this->cantidad_venta = $args["cantidad_venta"] ?? '';
            $this->pago_venta = $args['pago_venta'] ?? '';
            $this->cambio_venta = $args['cambio_venta'] ?? '';
        }
    }

?> 