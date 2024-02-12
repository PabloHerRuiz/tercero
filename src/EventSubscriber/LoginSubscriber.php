<?php
namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Http\SecurityEvents;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
class LoginSubscriber implements EventSubscriberInterface
{

    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }
    public static function getSubscribedEvents()
    {
        return [
            SecurityEvents::INTERACTIVE_LOGIN => 'onLogin',
        ];
    }

    public function onLogin(InteractiveLoginEvent $event)
    {
         // Accede al objeto Request para obtener información sobre la solicitud
         $request = $event->getRequest();
         $method = $request->getMethod();
         $uri = $request->getUri();
 
         // Envía un correo electrónico cada vez que se recibe una solicitud
         $this->sendEmail("HAS LOGUEADO CORRECTAMENTE: $method $uri");
    }
    private function sendEmail($message)
    {
        // Implementa la lógica para enviar el correo electrónico utilizando el servicio Mailer
        $email = (new Email())
            ->from('noreply@example.com')
            ->to('admin@example.com')
            ->subject('LOGIN')
            ->text($message);

        $this->mailer->send($email);
    }
}
