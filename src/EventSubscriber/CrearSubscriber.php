<?php
namespace App\EventSubscriber;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use App\Entity\Producto;

use Exception;


class CrearSubscriber
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function postPersist(Producto $producto)
    {
        $this->onCreate($producto);
    }
    public function prePersist(Producto $producto)
    {
        if ($producto instanceof Producto && $producto->getNombre() === 'brocoli') {
            throw new Exception('No se puede persistir un producto con el nombre "brocoli"');
        }
    }

    public function onCreate(Producto $producto)
    {
        $this->sendEmail("Has creado un producto: " . $producto->getNombre());
    }

    private function sendEmail($message)
    {
        $email = (new Email())
            ->from('noreply@example.com')
            ->to('admin@example.com')
            ->subject('Producto')
            ->text($message);

        $this->mailer->send($email);
    }
}