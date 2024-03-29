<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LogoutController extends AbstractController
{
    #[Route('/logout', name: 'app_logout')]
    public function logout(): Response
    {
       throw new \Exception("NO TE OLVIDES DE ACTIVAR EL LOGOUT EN SECURITY.YAML");
    }
}
