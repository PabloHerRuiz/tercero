<?php
namespace App\Controller;

use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Snappy\Pdf;

class pdfController extends AbstractController
{
    #[Route("/pdf", name: 'pdf')]
    public function pdfAction(Pdf $knpSnappyPdf)
    {
        $command = 'runas /user:Administrator "C:/Users/DAW/Desktop/nuevo/tercero/wkhtmltopdf/bin/wkhtmltopdf.exe --lowquality input.html output.pdf"';
        shell_exec($command);

        $html = $this->renderView('home.html.twig');

        return new PdfResponse(
            $knpSnappyPdf->getOutputFromHtml($html),
            'file.pdf'
        );
    }
}