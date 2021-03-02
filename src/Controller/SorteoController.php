<?php
// src/Controller/SorteoController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SorteoController extends AbstractController
{

    public function numeroMaximo($maximo)
    {
        $numero = random_int(0, $maximo);

        return $this->render('numero.html.twig', ['numero' => $numero, 
                                                  'limite' => $maximo]);
    }

    public function numero()
    {
        $limite = 23;
        $numero = random_int(0, $limite);

        return $this->render('numero.html.twig', ['numero' => $numero,
                                                  'limite' => $limite]);
    }

    public function numeroSuma($numero1, $numero2)
    {
        return $this->render('suma.html.twig', ['numero1' => $numero1,
                                                'numero2' => $numero2]);
    }

    public function index()
    {
        return $this->render('index.html.twig');
    }
}