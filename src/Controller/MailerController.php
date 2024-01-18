<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;


class MailerController extends AbstractController
{
    #[Route('/email', name: 'email')]
    public function mandarCorreo(MailerInterface $mailer): Response
    {

        $email = (new Email())
            ->from('
            ')
            ->to('
            ')
            ->subject('Prueba de correo')
            ->text('Probando el envio de correo desde symfony')
            ->html('<p>Probando el envio de correo desde symfony</p>');
        
        return new Response('Email enviado');
    }
}