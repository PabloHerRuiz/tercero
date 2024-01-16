<?php

namespace App\Controller;

use App\Entity\Libro;
use App\Entity\Autor;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LibroController extends AbstractController
{
    // #[Route('/libro/controller/php', name: 'app_libro_controller_php')]
    // public function index(): Response
    // {
    //     return $this->render('libro_controller_php/index.html.twig', [
    //         'controller_name' => 'LibroControllerPhpController',
    //     ]);
    // }
    #[Route('/libro', name: 'mete_libro')]
    public function meterLibro(EntityManagerInterface $entityManager): Response
    {

        $libro = new Libro();
        $libro->setNombre('El arbol de la ciencia');

        $entityManager->persist($libro);

        $entityManager->flush();



        return $this->render('libro_controller_php/index.html.twig', [
            'libro' => $libro,
        ]);
    }
    #[Route('/libro/autor', name: 'mete_autor')]
    public function meterAutor(EntityManagerInterface $entityManager): Response
    {

        $autor = new Autor();
        $libro = new Libro();
        $autor=$entityManager->getRepository(Autor::class)->find(2);
        $libro=$entityManager->getRepository(Libro::class)->find(2);
        $libro->addAutor($autor);

        $entityManager->persist($autor);

        $entityManager->flush();



        return $this->render('libro_controller_php/index.html.twig', [
            'libro' => $libro,
        ]);
    }
    
}
