<?php
namespace App\Controller;

use App\Entity\Alumno;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

// #[Route('/saludos')]
class saludo extends AbstractController
{

    #[Route('/',name:"home")]
    public function home(Request $request): Response
    {
        $nombre = $request->query->get("nombre");
        
        return $this->render('home.html.twig',[
            "nombre" => $nombre,
        ]);
    }

    #[Route('/listado',name:"listado")]
    public function listado(): Response
    {
        $alu=[new Alumno(1,"pablo","hernandez","1 Daw"),
        new Alumno(2,"palo","fernandez","2 Daw"),
        new Alumno(3,"picha","martinez","3 Daw"),
        new Alumno(4,"pedro","gomez","4 Daw"),
        new Alumno(5,"pepe","gamez","5 Daw")];
        
        return $this->render('listado.html.twig',[
            'alumnos'=>$alu,
        ]);
    }

    #[Route('/verficha/{id}',name:"verficha")]
    public function verficha(Int $id): Response
    {
        $alu=[new Alumno(1,"pablo","hernandez","1 Daw"),
        new Alumno(2,"palo","fernandez","2 Daw"),
        new Alumno(3,"picha","martinez","3 Daw"),
        new Alumno(4,"pedro","gomez","4 Daw"),
        new Alumno(5,"pepe","gamez","5 Daw")];
        
        return $this->render('ficha.html.twig',[
            'alumnos'=>$alu,
            'id'=>$id,
        ]);
    }




    #[Route('/formal/{nombre}')]
    public function saludo(String $nombre): Response
    {
        $alu=new Alumno(1,"pablo","hernandez","2 Daw");
        
        return $this->render('saluda.html.twig', [
            'alumno' => $alu,
            'saludo'=> "Hola ".$nombre,
        ]);
    }
    #[Route('/informal')]
    public function saludoinformal(): Response
    {
        return new Response(
            '<html><body>Hey mundo</body></html>'
        );
    }
    #[Route('/suma/{uno}/{otro}')]
    public function suma(Int $uno,Int $otro): Response
    {
        $suma=$uno+$otro;
        return new Response(
            '<html><body>'.$suma.'</body></html>'
        );
    }
}
