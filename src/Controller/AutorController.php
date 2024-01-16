<?php

namespace App\Controller;

use App\Entity\Autor;
use App\Entity\Libro;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AutorController extends AbstractController
{
    // #[Route('/autor/controller/php', name: 'app_autor_controller_php')]
    // public function index(): Response
    // {
    //     return $this->render('autor_controller_php/index.html.twig', [
    //         'controller_name' => 'AutorControllerPhpController',
    //     ]);
    // }
    #[Route('/autor', name: 'meter')]
    public function meterAutor(EntityManagerInterface $entityManager): Response
    {
        $autor = new Autor();
        $autor->setNombre('Neruda');

        $entityManager->persist($autor);

        $entityManager->flush();



        return $this->render('autor_controller_php/index.html.twig', [
                    'autor' => $autor,
                ]);
    }
    #[Route('/autor/libro', name: 'nombrar')]
    public function autorizar(EntityManagerInterface $entityManager): Response
    {
        $autor = new Autor();
        $libro = new Libro();
        $autor=$entityManager->getRepository(Autor::class)->find(1);
        $libro=$entityManager->getRepository(Libro::class)->find(2);
        $autor->addLibro($libro);

        $entityManager->persist($autor);

        $entityManager->flush();



        return $this->render('autor_controller_php/index.html.twig', [
                    'autor' => $autor,
                ]);
    }
}
