<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Categoria;

class CategoriaController extends AbstractController
{
    #[Route('/categoria', name: 'app_categoria')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        $categoria = $entityManager->getRepository(Categoria::class)->findAll();
        return $this->render('categoria/index.html.twig',[
            "categoria" => $categoria,
        ]);


        // $cat = new Categoria();
        // $cat->setNombre('Pro');
        // $cat->setDescripcion('Fucking boss!');
        
        // // tell Doctrine you want to (eventually) save the Category (no queries yet)
        // $entityManager->persist($cat);

        // // actually executes the queries (i.e. the INSERT query)
        // $entityManager->flush();

        // return new Response('Saved new category with id '.$cat->getId());
        // // return $this->render('categoria/index.html.twig', [
        // //     'controller_name' => 'CategoriaController',
        // // ]);
    }

}
