<?php 
    namespace Model;

    class Producto extends ActiveRecord{
        public static $Tabla = "producto";
        public static $ColumnaDB = ['id', 'nombre_producto', 'descripcion_producto', 'precioCompra_producto', 'precioVenta_producto', 'stock_producto', 'cvemarca_producto'];

        public $nombre_producto;
        public $descripcion_producto;
        public $precioCompra_producto;
        public $precioVenta_producto;
        public $stock_producto;
        public $cvemarca_producto;

        public function __construct($args = [])
        {
            $this->nombre_producto = $args['nombre_producto'] ?? '';
            $this->descripcion_producto = $args['descripcion_producto'] ?? '';
            $this->precioCompra_producto = $args['precioCompra_producto'] ?? '';
            $this->precioVenta_producto = $args['precioVenta_producto'] ?? '';
            $this->stock_producto = $args['stock_producto'] ?? '';
            $this->cvemarca_producto = $args['cvemarca_producto'] ?? '';
        }

        public function validarProducto(){
            if(!$this->nombre_producto){
                self::$Errores[] = "El nombre del producto es obligatorio";
            }
            if(strlen($this->descripcion_producto) < 50){
                self::$Errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
            }
            if(!$this->precioCompra_producto){
                self::$Errores[] = "El precio de compra es obligatorio";
            }
            if(!$this->precioVenta_producto){
                self::$Errores[] = "El precio de venta es obligatorio";
            }
            if(!$this->stock_producto){
                self::$Errores[] = "El stock es obligatorio";
            }
            if(!$this->cvemarca_producto){
                self::$Errores[] = "La marca del producto es obligatorio";
            }
            return self::$Errores;
        }
    }
?>