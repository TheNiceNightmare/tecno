<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request): Response
    {
        // Verificar si se ha enviado el formulario de inicio de sesión
        if ($request->isMethod('POST')) {
            $username = $request->request->get('username');
            $password = $request->request->get('password');

            // Lógica de autenticación (usando datos estáticos, no SQL)
            $validUser = $this->validateUser($username, $password);

            if ($validUser) {
                // Establecer una sesión para el usuario
                $request->getSession()->set('loggedin', true);
                $request->getSession()->set('username', $username);

                // Redirigir al usuario a la página deseada (por ejemplo, el controlador de asistencia)
                return $this->redirectToRoute('admin');
            } else {
                // Manejar la autenticación fallida
                return $this->render('login.html.twig', [
                    'error' => 'Datos incorrectos. Inténtalo de nuevo.'
                ]);
            }
        }

        // Si no se ha enviado el formulario, mostrar el formulario de inicio de sesión
        return $this->render('login.html.twig');
    }

    // Método para validar al usuario (simulado, sin uso de SQL)
    private function validateUser($username, $password): bool
    {
        // Lógica de validación de usuario (puede usar datos estáticos o archivos de texto)
        // Aquí se simularía la validación de usuario y contraseña
        // Se podría comparar con información almacenada en archivos de texto o similar
        
        // Ejemplo básico con datos estáticos
        $validUsers = [
            'Wong' => '123',
            'Sam' => '321',
            'Docent' => '567',
            'Fam' => '891',
            // Agregar más usuarios según sea necesario
        ];

        return isset($validUsers[$username]) && $validUsers[$username] === $password;
    }
}
