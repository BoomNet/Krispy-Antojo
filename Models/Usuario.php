<?php 
    namespace Model;
    
    class Usuario extends ActiveRecord{

        protected static $Tabla = "usuario";
        protected static $ColumnaDB = ['cve_usuario', 'nombre_usuario', 'apellidopa_usuario', 'apellidoma_usuario', 'telefono_usuario', 'usuario_usuario', 'contraseña_usuario', 'fechacrea_usuario', 'fechamod_usuario', 'cverol_usuario'];

        public $cve_usuario;
        public $nombre_usuario;
        public $apellidopa_usuario;
        public $apellidoma_usuario;
        public $telefono_usuario;
        public $usuario_usuario;
        public $contraseña_usuario;
        public $fechacrea_usuario;
        public $fechamod_usuario;
        public $cverol_usuario;

        public function __construct($args = [])
        {
            $this->nombre_usuario = $args['nombre_usuario'] ?? '';
            $this->apellidopa_usuario = $args['apellidopa_usuario'] ?? '';
            $this->apellidoma_usuario = $args['apellidoma_usuario'] ?? '';
            $this->telefono_usuario = $args['telefono_usuario'] ?? '';
            $this->usuario_usuario = $args['usuario_usuario'] ?? '';
            $this->contraseña_usuario = $args['contraseña_usuario'] ?? '';
            $this->fechacrea_usuario = date('Y/m/d');
            $this->fechamod_usuario = date('Y/m/d') ?? null;
            $this->cverol_usuario = $args['cverol_usuario'] ?? '';
        }

        public function ValidarUsuario(){
            if(!$this->nombre_usuario){
                self::$Errores[] = "El nombre es obligatorio";
            }
            if(!$this->apellidopa_usuario){
                self::$Errores[] = "El apellido paterno es obligatorio";
            }
            if(!$this->apellidoma_usuario){
                self::$Errores[] = "El apellido materno es obligatorio";
            }
            if(!$this->telefono_usuario){
                self::$Errores[] = "Numero de telefono obligatorio";
            }
            if(!$this->usuario_usuario){
                self::$Errores[] = "El nombre de usuario es obligatorio";
            }
            if(!$this->contraseña_usuario){
                self::$Errores[] = "La contraseña es obligatorio";
            }
            if(!$this->cve_usuario){
                self::$Errores[] = "El rol es obligatorio";
            }
        }
        
    }
?>