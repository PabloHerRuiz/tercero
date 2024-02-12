<?php
namespace App\Service;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use App\Event\Evento;

class EventoService
{
    private $eventDispatcher;

    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    public function triggerEvent(): void
    {
        $event = new Evento();
        $this->eventDispatcher->dispatch($event, Evento::NAME);
    }
}