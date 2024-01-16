<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AutorControllerPhpController extends AbstractController
{
    #[Route('/autor/controller/php', name: 'app_autor_controller_php')]
    public function index(): Response
    {
        return $this->render('autor_controller_php/index.html.twig', [
            'controller_name' => 'AutorControllerPhpController',
        ]);
    }
}
