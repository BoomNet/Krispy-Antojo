<?php 
    namespace Controllers;

use Model\Gasto;
use Model\Marca;
    use Model\Usuario;
    use Model\Rol;
    use Model\Producto;
    use MVC\Router;
    
    class dashboardControllers {

        public static function getViews(Router $router){
            $View = GetView('/Dashboard/dashboard');
            switch($View){
                case 1: 
                    $router->render('/Dashboard/dashboard', [
                        'View' => $View
                    ]);
                    break;
                case 2: 
                    static::GetUsers($router, $View);
                    break;
                case 3: 
                    static::getInfoUser($router, $View);
                    break;
                case 4:
                    static::getIdUser($router, $View);
                    break;
                case 5: 
                    static::getProducts($router, $View);
                    break;
                case 6:
                    static::postProducts($router, $View);
                    break;
                case 7:
                    static::getIdProducts($router, $View);
                    break;
                case 8: 
                    static::getSpending($router, $View);
                    break;
                default: 
                    break;
            }
        }

        public static function postViews(Router $router){
            $View = GetView('/Dashboard/dashboard');
            switch($View){
                case 2: 
                    static::searchUser($router, $View);
                    break;
                case 3:      
                    static::PostUser($router, $View);
                    break;
                case 4:
                    static::getIdUser($router, $View);
                    break;
                case 5:
                    static::searchProducts($router, $View);
                    break;
                case 6:
                    static::postProducts($router, $View);
                    break;    
                case 7:
                    static::getIdProducts($router, $View);
                    break;    
                default:    
                    break;
            }
        }

        /* ******-----GET------****** */
        public static function GetUsers($router, $View){
            $usuario = new Usuario;
            $allUsers = $usuario->AllUser();
            $router->render('/Dashboard/dashboard',[
                'View' => $View,
                'allUsers' => $allUsers
            ]);
        }
        public static function getInfoUser($router, $View){
            $usuario = new Usuario;
            $Rol = Rol::all();
            $Errores = Usuario::getError();
            $ChangePass = true;
            $router->render('/Dashboard/dashboard',[
                'usuario' => $usuario,
                'Errores' => $Errores,
                'Rol' => $Rol,
                'View' => $View,
                'ChangePass' => $ChangePass
            ]);
        }
        public static function getIdUser($router, $View){
            $id = Validar();
            $usuario = Usuario::find($id);
            unset($usuario->contrasenia_usuario);
            unset($usuario->confirm_contrasenia);
            $Errores = Usuario::getError();
            $Rol = Rol::all();
            $ChangePass = false;
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $args = $_POST['usuario'];
                $usuario->Sincronizar($args);
                $Errores = $usuario->ValidarUsuario(true);
                if(empty($Errores)){
                    $usuario->fechamod_usuario = date('Y/m/d');
                    $guardado = $usuario->Guardar();
                    if($guardado){
                        header('Location: /Dashboard/dashboard?View=2');
                    }
                }
            }
            $router->render('/Dashboard/dashboard', [
                'View' => $View,
                'usuario' => $usuario,
                'Errores' => $Errores,
                'Rol' => $Rol,
                'id' => $id, 
                'ChangePass' => $ChangePass
            ]);
        }
        public static function getProducts($router, $View){
            $productos = new Producto;
            $allProducts = $productos->allProducts();
            $router->render('/Dashboard/dashboard', [
                'allProducts' => $allProducts,
                'View' => $View,
                
            ]);
        }
        public static function getIdProducts($router, $View){
            $id = Validar();
            $Marca = Marca::all();
            $producto = Producto::find($id);
            $Errores = Producto::getError();
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $args = $_POST['producto'];
                $producto->Sincronizar($args);
                $Errores = $producto->validarProducto();
                if(empty($Errores)){
                    $producto->fechamod_producto = date('Y/m/d');
                    $guardado = $producto->Guardar();
                    if($guardado){
                        header('Location: /Dashboard/dashboard?View=5');
                    }
                }
            }
            $router->render('/Dashboard/dashboard', [
                'View' => $View,
                'Errores' => $Errores,
                'producto' => $producto, 
                'Marca' => $Marca, 
                'id' => $id
            ]);
        }
        public static function getSpending($router, $View){
            $gasto = new Gasto;
            $allSpending = $gasto->allSpending();   
            $id = $_GET['id'] ?? false;         
            $Total = $gasto->RealGasto();
            $Previsto = $gasto->SumaPrevisto();
            $router->render('/Dashboard/dashboard', [
                'View' => $View,
                'allSpending' => $allSpending,
                'Total' => $Total,
                'Previsto' => $Previsto,
                'id' => $id
            ]);
        }
        
        /* ******-----POST------****** */
        public static function searchUser($router, $View){
            $usuario = new Usuario;
            $Errores = Usuario::getError();
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $Busqueda = $_POST['busqueda'];
                $allUsers = $usuario->searchUsers($Busqueda);
                if(empty($allUsers)){
                    $Errores[] = "No se encontraron resultados";
                }
            }
            
            $router->render('/Dashboard/dashboard', [
                'View' => $View,
                'allUsers' => $allUsers,
                'Errores' => $Errores
            ]);
        }
        public static function PostUser($router, $View){
            $Rol = Rol::all();
            $ChangePass = true;
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $usuario = new Usuario($_POST['usuario']);
                $Errores = $usuario->ValidarUsuario(false);
                if(empty($Errores)){
                    $Resultado = $usuario->existeUsuario();
                    if(!$Resultado){
                        $Errores = Usuario::getError();
                    }else{
                        $comparado = $usuario->CompararPassword();
                        if($comparado){
                            $usuario->hashPassword();
                            unset($usuario->confirm_contrasenia);
                            $usuario->fechamod_usuario = null;
                            $guardado = $usuario->Guardar();
                           if($guardado){
                               header('Location: /Dashboard/dashboard?View=2');
                           }
                        }else{
                            $Errores = Usuario::getError();
                        }
                    }
                }
            }
            $router->render('/Dashboard/dashboard',[
                'usuario' => $usuario,
                'Errores' => $Errores,
                'Rol' => $Rol,
                'View' => $View,
                'ChangePass' => $ChangePass
            ]);
        }
        public static function searchProducts($router, $View){
            $producto = new Producto;
            $Errores = Producto::getError();
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $busquedaProducto = $_POST['busqueda'];
                $allProducts = $producto->searchProducts($busquedaProducto);
                if(empty($allProducts)){
                    $Errores[] = 'No se encontraron resultados';
                }
            }
            $router->render('/Dashboard/dashboard', [
                'View' => $View,
                'allProducts' => $allProducts,
                'Errores' => $Errores
            ]);
        }
        public static function postProducts($router, $View){
            $Errores = Producto::getError();
            $producto = new Producto;
            $Marca = Marca::all();
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $producto = new Producto($_POST['producto']);
                $Errores = $producto->validarProducto();
                if(empty($Errores)){
                    $guardado = $producto->Guardar();
                    if($guardado){
                        header('Location: /Dashboard/dashboard?View=5');
                    }
                }
            }
            $router->render('/Dashboard/dashboard',[
                'View' => $View,
                'Errores' => $Errores,
                'producto' => $producto,
                'Marca' => $Marca
            ]);
        }
    }
    
?>  