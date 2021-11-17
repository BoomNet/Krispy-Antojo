<?php 
    namespace Model;

use MVC\Router;

    class Usuario extends ActiveRecord{

            protected static $Tabla = "usuario";
            protected static $columnaDB = ['id', 'nombre_usuario', 'apellidopa_usuario', 'apellidoma_usuario', 'correo_usuario', 'telefono_usuario', 'usuario_usuario', 'contrasenia_usuario', 'fechacrea_usuario', 'fechamod_usuario', 'cverol_usuario'];
            public $id;
            public $nombre_usuario;
            public $apellidopa_usuario;
            public $apellidoma_usuario;
            public $correo_usuario;
            public $telefono_usuario;
            public $usuario_usuario;
            public $contrasenia_usuario;
            public $confirm_contrasenia;
            public $fechacrea_usuario;
            public $fechamod_usuario;
            public $cverol_usuario;
            
        
            public function __construct($args = [])
            {
                $this->nombre_usuario = $args['nombre_usuario'] ?? '';
                $this->apellidopa_usuario = $args['apellidopa_usuario'] ?? '';
                $this->apellidoma_usuario = $args['apellidoma_usuario'] ?? '';
                $this->correo_usuario = $args['correo_usuario'] ?? '';
                $this->telefono_usuario = $args['telefono_usuario'] ?? '';
                $this->usuario_usuario = $args['usuario_usuario'] ?? '';
                $this->contrasenia_usuario = $args['contrasenia_usuario'] ?? '';
                $this->confirm_contrasenia = $args['confirm_contrasenia'] ?? '';
                $this->fechacrea_usuario = date('Y/m/d');
                $this->fechamod_usuario = null;
                $this->cverol_usuario = $args['cverol_usuario'] ?? null;
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
                if(!$this->contrasenia_usuario){
                    self::$Errores[] = "La contraseña es obligatorio";
                }
                if(!$this->cverol_usuario){
                    self::$Errores[] = "El rol es obligatorio";
                }
                return self::$Errores;
            }

            public function validarLogin(){
                if(!$this->correo_usuario){
                    self::$Errores[] = "El correo es obligatorio";
                }
                if(!$this->contrasenia_usuario){
                    self::$Errores[] = "La contraseña es obligatoria";
                }
                return self::$Errores;
            }

            public function existeUsuario(){
                $query = "SELECT * from " . static::$Tabla . " WHERE usuario_usuario = '" . $this->usuario_usuario . "' LIMIT 1;";
                $Resultado = self::$db->query($query);
                if($Resultado->num_rows){
                    self::$Errores[] = '"El usuario existe. Intenta con otro';
                    return;
                }
                return $Resultado;
            }
            public function existeEmail(){
                $query = "SELECT * FROM usuario WHERE correo_usuario = '" . $this->correo_usuario . "' LIMIT 1;";
                $Resultado = self::$db->query($query);
                if(!$Resultado->num_rows){
                    self::$Errores[] = "El correo no existe";
                    return;
                }
                return $Resultado;
            }
            public function hashPassword(){
                $this->contrasenia_usuario = password_hash($this->contrasenia_usuario, PASSWORD_BCRYPT);
            }
            public function CompararPassword(){
                $Comparado = false;
                if($this->contrasenia_usuario == $this->confirm_contrasenia){
                    $Comparado = true;
                }else{
                    $Comparado = false;
                }

                if(!$Comparado){
                    self::$Errores[] = 'Las contraseñas no coinciden';
                    return;
                }
                return $Comparado;
            }
            public function comprobarPassword($Resultado){
                $usuario = $Resultado->fetch_object();  
                /* $Autenticado = false;
                if($this->contrasenia_usuario === $usuario->contrasenia_usuario){
                    $Autenticado = true;
                }else{
                    $Autenticado = false;
                } */
                $Autenticado = password_verify($this->contrasenia_usuario, $usuario->contrasenia_usuario);
                if(!$Autenticado){
                    self::$Errores[] = 'La contraseña es incorrecta';
                    return;
                }
                return $Resultado;
            }

            public function autenticar(){
                session_start();
                $_SESSION['usuario'] = $this->correo_usuario;
                $_SESSION['login'] = true;
                header('Location: /Dashboard/dashboard?View=1');
            }
            
            public function PasswordHash(){
                
            }
            public function AllUser(){
                $query = "SELECT usuario.id, nombre_usuario, apellidopa_usuario, apellidoma_usuario, correo_usuario, telefono_usuario, usuario_usuario, rol FROM usuario INNER JOIN rol on usuario.cverol_usuario = rol.id";
                $Resultado = self::$db->query($query);
                $All = [];
                while($row = $Resultado->fetch_assoc()){
                    $All[] = $row;
                }
                return $All;
            }
        }
?> 