<?php 
    namespace Model;

use Dotenv\Parser\Value;

class ActiveRecord{
        //BASE DE DATOS
        protected static $db;
        protected static $columnaDB = [];
        protected static $Tabla = '';
        protected static $cve = '';
        //ERRORES
        protected static $Errores = [];
        

        public static function setDB($Conexion){
            self::$db = $Conexion;
        }

        public function Guardar(){
            $Resultado = '';
            if(!is_null($this->id)){
                //Actaulizar el contenido
                $Resultado = $this->Actualizar();
            }else{
                //Crear un nuevo valor
                $Resultado = $this->Crear();
            }
            return $Resultado;
        }

        public function Crear(){
            $Atributos = $this->SanitizarDatos();
            $InsertarFormulario = " INSERT INTO " . static::$Tabla . " (";
            $InsertarFormulario .= join(', ', array_keys($Atributos));
            $InsertarFormulario .= ") VALUES ('";
            $InsertarFormulario .= join("', '", array_values($Atributos));
            $InsertarFormulario .= "');";
            $Resultado = self::$db->query($InsertarFormulario);
            return $Resultado;
        }   

        public function Actualizar(){
            $Atributos = $this->SanitizarDatos();
            $Valores = [];
            foreach($Atributos as $key => $value){
                $Valores[] = "{$key}='{$value}'";
            }
            $Query = "UPDATE " . static::$Tabla  . " SET ";
            $Query .= join(', ', $Valores);
            $Query .= " WHERE id='" . self::$db->escape_string($this->id) . "'";
            $Query .= " LIMIT 1";
            
            $Resultado = self::$db->query($Query);
            if($Resultado){
                header('Location: /admin?resultado=2');
            }
        }

        public function Eliminar(){
            $Query = "DELETE FROM " . static::$Tabla . " WHERE id=" . self::$db->escape_string($this->id) . " LIMIT 1";
            $Resultado = self::$db->query($Query);
            if($Resultado){
                header('Location: /admin?resultado=3');
            }
        }

        // Identificar y unir los atributos de la BD o Mapea las columnas con el objeto en memoria que tenemos
        public function Atributos(){
            $Atributos = [];
            foreach(static::$columnaDB as $Columna){
                if($Columna === 'id') continue;
                $Atributos[$Columna] = $this->$Columna; //$this->$Columna hacer referencia al objeto en memoria
            }
            return $Atributos;
        }
        public function SanitizarDatos(){
            $Atributos = $this->Atributos();
            $Sanitizado = [];
            foreach($Atributos as $key => $value){
                if($value == null) continue;
                $Sanitizado[$key] = self::$db->escape_string($value);
            }
            return $Sanitizado;
        }
        public static function getError(){
            return static::$Errores;
        }
        public static function getImage($id){
            $Imagenes = "SELECT imagen FROM propiedades WHERE id = ${$id}";
            $Resultado = self::$db->query($Imagenes);
            return $Resultado;
        }
        public function ValidarFormulario(){
            static::$Errores = [];
            return static::$Errores;
        }
        public static function all(){
            $query = "SELECT * FROM " . static::$Tabla;
            $Resultado = self::consultarSQL($query);
            return $Resultado;
        }
        public static function get($cantidad){
            $query = "SELECT * FROM " . static::$Tabla . " LIMIT " . $cantidad;
            $Resultado = self::consultarSQL($query);
            return $Resultado;
        }
        public static function find($id){
            $query = "SELECT * FROM " . static::$Tabla . " WHERE id=${id}";
            $Resultado = self::consultarSQL($query);
            return $Resultado[0];
        }
        public static function consultarSQL($query){
            //Consultar la base de datos
            $Resultado = self::$db->query($query);
            //Iterar los resultados
            $array = [];
            while($Registro = $Resultado->fetch_assoc()){
                $array[] = static::crearObjeto($Registro);
            }
            //Liberar en memoria
            $Resultado->free();
            //Retornar los resultados
            return $array;
        }

        protected static function crearObjeto($registro){
            $objeto = new static;
            foreach($registro as $key => $value){
                if(property_exists($objeto, $key)){
                    $objeto->$key = $value;
                }
            }
            return $objeto;
        }
        //Sincronizar en el objeto en memoria con los cambios realizados en el usuario
        public function Sincronizar($args = []){
            foreach($args as $key => $value){
                if(property_exists($this, $key) && !is_null($value)){
                    $this->$key = $value;
                }
            }
        }
    }
?>