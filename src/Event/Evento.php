<?php
namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;

class Evento extends Event
{
    public const NAME = 'crear.evento';
}