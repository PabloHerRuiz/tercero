<?php

namespace App\Controller;

use App\Entity\Producto;
use App\Entity\Categoria;

use App\Form\ProductoType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    #[Route('/producto', name: 'create_product')]
    public function createProduct(EntityManagerInterface $entityManager): Response
    {
        $producto = new Producto();
        $producto->setNombre('Keyboard');
        $producto->setPrecio(1999);
        $producto->setDescripcion('Ergonomic and stylish!');
        $producto->setCantidad(25);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($producto);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$producto->getId());
    }

    #[Route('/producto/categoria', name: 'asignar_categoria')]
    public function asignarCat(EntityManagerInterface $entityManager): Response
    {
        $producto = $entityManager->getRepository(Producto::class)->find(1);
        $categoria = $entityManager->getRepository(Categoria::class)->find(2);

        $producto->setCategoria($categoria);

        $entityManager->flush();

        return $this->render('product/index.html.twig',[
            "producto" => $producto,
            "categoria" => $categoria
        ]);
    }

    #[Route('/producto/formulario', name: 'formulario')]
    public function formulario(Request $request,EntityManagerInterface $entityManager): Response
    {

        $producto = new Producto();

        $form = $this->createForm(ProductoType::class, $producto);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $producto = $form->getData();

            $entityManager->persist($producto);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('product/prueba.html.twig', [
            'form' => $form->createView(),
            // 'form' => $form,
        ]);
    }

    #[Route('/producto/{categoria}', name: 'listado_prod')]
    public function listProd($categoria,EntityManagerInterface $entityManager): Response
    {
        $producto=$entityManager->getRepository(Producto::class)->findBy(['Categoria' => $categoria]);
        

        $entityManager->flush();

        return $this->render('product/index.html.twig',[
            "producto" => $producto,
        ]);
    }
    
}