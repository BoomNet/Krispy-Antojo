<?php 
    namespace Model;

    class Producto extends ActiveRecord{
        public static $Tabla = "producto";
        public static $ColumnaDB = ['cve_producto', 'nombre_producto', 'descripcion_producto', 'stock_producto', 'precio_producto', 'cvemarca_producto'];

        public $nombre_producto;
        public $descripcion_producto;
        public $stock_producto;
        public $precio_producto;
        public $cvemarca_producto;

        public function __construct($args = [])
        {
            $this->nombre_producto = $args['nombre_producto'];
            $this->descripcion_producto = $args['descripcion_producto'];
            $this->stock_producto = $args['stock_producto'];
            $this->precio_producto = $args['precio_producto'];
            $this->cvemarca_producto = $args['cvemarca_producto'];
        }
    }
?>