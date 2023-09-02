<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\UsuarioController;
use Controllers\PermisoController;
$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class,'index']);


$router->get('/usuarios', [UsuarioController::class,'index']);
//  $router->get('/API/usuarios/guardar', [UsuarioController::class,'guardarAPI']);
$router->post('/API/usuarios/guardar', [UsuarioController::class,'guardarAPI']);

$router->get('/permisos', [PermisoController::class,'index']);
$router->post('/API/permisos/guardar', [PermisoController::class,'guardarAPI']);
$router->post('/API/permisos/modificar', [PermisoController::class,'modificarAPI']);
$router->post('/API/permisos/eliminar', [PermisoController::class,'eliminarAPI']);
$router->get('/API/permisos/buscar', [PermisoController::class,'buscarAPI']);
$router->post('/API/permisos/activar', [PermisoController::class,'activarAPI']);
$router->post('/API/permisos/desactivar', [PermisoController::class,'desactivarAPI']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
