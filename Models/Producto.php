<?php 
    namespace Model;

    class Producto extends ActiveRecord{
        public static $Tabla = "producto";
        public static $ColumnaDB = ['id', 'nombre_producto', 'descripcion_producto', 'stock_producto', 'precio_producto', 'cvemarca_producto'];

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

        public function validarProducto(){
            if(strlen($this->descripcion_producto) < 50){
                self::$Errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
            }
            if(!$this->stock_producto){
                self::$Errores[] = "El stock es obligatorio";
            }
            if(!$this->precio_producto){
                self::$Errores[] = "El precio es obligatorio";
            }
            if(!$this->cvemarca_producto){
                self::$Errores[] = "La marca del producto es obligatorio";
            }
        }
    }
?>