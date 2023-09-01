<?php

namespace Controller;

use Exception;
use Model\Usuario;
use MVC\Route;

class UserController
{
    public static function index(Router $router)
    
    // Con esto obtendremos la vista que usaremos
    {
        $usuarios = usuarios::all();
        $router->render('usuarios/index', [
            'usuarios' => $usuarios,
        ]);
    }

    public static function guardarAPI() 
    {
        try {
            $nombre = $_POST['usuario_nombre'];
            $catalogo = $_POST['usuario_catalogo'];
            $password = $_POST['usuario_password'];

            // voy a crear la condicion para hashear la contraseña del usuario
            if ($password) {
                $hash_password = password_hash($password, PASSWORD_DEFAULT);
                
                $usuario = new Usuario([
                    'usuario_nombre' => $nombre,
                    'usuario_catalogo' => $catalogo,
                    'usuario_password' => $hash_password,
                ]);
                $resultado = $usuario->crear();

                if ($resultado['resultado'] == 1) {
                    echo json_encode([
                        'mensaje' => 'Usuario guardado correctamente',
                        'codigo' => 1
                    ]);
                } else {
                echo json_encode ([
                    'mensaje' => 'Ocurrio un error',
                    'codigo' => 0
                    ]);
                }
            } else {
                echo json_encode([
                    'mensaje' => 'La contraseña no es correcta',
                    'codigo' => 0
                ]);
            }
            
        } catch (Exception $e) {
            echo json_encode ([
                'detalle' => $e->getMessage(),
                'mensaje' => 'El CATALOGO que intenta usar ya existe',
                'codigo' => 0
            ]);
        }
    }
}