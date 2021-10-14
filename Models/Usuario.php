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
            $this->nombre_usuario = $args['nombre_usuario'];
            $this->apellidopa_usuario = $args['apellidopa_usuario'];
            $this->apellidoma_usuario = $args['apellidoma_usuario'];
            $this->telefono_usuario = $args['telefono_usuario'];
            $this->usuario_usuario = $args['usuario_usuario'];
            $this->contraseña_usuario = $args['contraseña_usuario'];
            $this->fechacrea_usuario = date('Y/m/d');
            $this->fechamod_usuario = date('Y/m/d') ?? null;
            $this->cverol_usuario = $args['cverol_usuario'];
        }
    }
?>