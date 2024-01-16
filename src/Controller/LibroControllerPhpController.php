<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LibroControllerPhpController extends AbstractController
{
    #[Route('/libro/controller/php', name: 'app_libro_controller_php')]
    public function index(): Response
    {
        return $this->render('libro_controller_php/index.html.twig', [
            'controller_name' => 'LibroControllerPhpController',
        ]);
    }
}
