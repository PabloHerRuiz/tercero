<?php
namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use App\Event\Evento;

class MyEventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            Evento::NAME => 'onMiEvento',
        ];
    }

    public function onMiEvento(Evento $event)
    {
        // Aquí puedes hacer algo cuando se dispara el evento
    }
}