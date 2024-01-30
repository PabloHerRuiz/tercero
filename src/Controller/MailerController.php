<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\MailerService;

class MailerController extends AbstractController
{
    #[Route('/email', name: 'email')]
    public function mandarCorreo(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('pihogpi@kinsta.com')
            ->to('pherrui680@g.educaand.es')
            ->subject('Hey, I’m Pi Hog Pi!')
            ->text('Hello, MailHog!');

        $mailer->send($email);

        return new Response('Email enviado');
    }

    #[Route('/email2', name: 'email2')]
    public function mandarEmail(MailerService $mailerService): Response
    {
        // ...

        if ($mailerService->notifyOfSiteUpdate()) {
            $this->addFlash('success', 'Notification mail was sent successfully.');
        }

        return new Response('Email enviado');
    }
}
