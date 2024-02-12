<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Service\EventoService;

class EventoController extends AbstractController
{
    private $myService;

    public function __construct(EventoService $myService)
    {
        $this->myService = $myService;
    }

    public function index(): Response
    {
        // Dispara el evento utilizando el servicio
        $this->myService->triggerEvent();

        return new Response('Evento disparado!');
    }
}