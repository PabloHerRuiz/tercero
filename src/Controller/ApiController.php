<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Producto;
use App\Entity\Categoria;


class ApiController extends AbstractController
{
    #[Route('/api/productos', name: 'api_productos')]
    public function getProducts(EntityManagerInterface $entityManager): JsonResponse
    {
        $products = $entityManager->getRepository(Producto::class)->findAll();


        $productData = [];
        foreach ($products as $product) {
            $productData[] = [
                'id' => $product->getId(),
                'nombre' => $product->getNombre(),
                'cantidad' => $product->getCantidad(),
                'precio' => $product->getPrecio(),
                'descripcion' => $product->getDescripcion(),
            ];
        }


        return $this->json($productData);
    }


    #[Route('/api/productos/{id}', name: 'api_productos_delete', methods: ['DELETE'])]
    public function deleteProduct($id, EntityManagerInterface $entityManager): JsonResponse
    {
        $product = $entityManager->getRepository(Producto::class)->find($id);


        if (!$product) {
            return $this->json(['message' => 'Producto no encontrado'], 404);
        }


        $entityManager->remove($product);
        $entityManager->flush();


        return $this->json(['message' => 'Producto borrado con éxito']);
    }


    #[Route('/api/categorias/productos/{id}', name: 'api_categorias_productos', methods: ['GET'])]
    public function getProductsByCategory($id, EntityManagerInterface $entityManager): JsonResponse
    {
        $categoria = $entityManager->getRepository(Categoria::class)->find($id);


        if (!$categoria) {
            return $this->json(['message' => 'Categoría no encontrada'], 404);
        }


        $productos = $entityManager->getRepository(Producto::class)->findBy(['Categoria' => $categoria]);


        if (!$productos) {
            return $this->json(['message' => 'No hay productos para esta categoría'], 404);
        }


        $productData = [];
        foreach ($productos as $producto) {
            $productData[] = [
                'id' => $producto->getId(),
                'nombre' => $producto->getNombre(),
                'cantidad' => $producto->getCantidad(),
                'precio' => $producto->getPrecio(),
                'descripcion' => $producto->getDescripcion(),
            ];
        }


        return $this->json($productData);
    }
}
