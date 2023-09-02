<?php

namespace Controllers;

use Exception;
use Model\Usuario;
use MVC\Router;

class UsuarioController
{
    public static function index(Router $router)
    
    // Con esto obtendremos la vista que usaremos
    {
        $usuarios = usuario::all();
        $router->render('usuarios/index', [
            'usuarios' => $usuarios,
        ]);
    }

    public static function guardarAPI() 
    {
                // El try sirve para evaluar exepciones o errores
        try {
            $nombre = $_POST['usuario_nombre'];
            $catalogo = $_POST['usuario_catalogo'];
            $password = $_POST['usuario_password'];
            // elimine confirmar password
            

            // voy a crear la condicion para hashear la contraseña del usuario
            if ($password) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                $usuario = new Usuario([
                    'usuario_nombre' => $nombre,
                    'usuario_catalogo' => $catalogo,
                    'usuario_password' => $hashed_password,
                ]);
                
                $resultado = $usuario->crear();

                if ($resultado['resultado'] == 1) {
                    echo json_encode([
                        'mensaje' => 'Usuario guardado correctamente',
                        'codigo' => 1
                    ]);
                } else {
                echo json_encode([
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
                'mensaje' => 'El CATALOGO que intenta usar ya existe, por favor ingresar un nuevo catalogo.',
                'codigo' => 0
            ]);
        }
    }
}


// hola esta aqui va bien xD