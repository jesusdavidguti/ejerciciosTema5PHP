<?php
// src/Controller/SorteoController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SorteoController extends AbstractController
{
    public function euromillones()
    {
        $arr_estrellas = array();
        $arr_numeros = array();
        $i = 0;

        do {
            $numero = random_int(1, 50);

            if (!in_array($numero, $arr_numeros, true)){
                array_push($arr_numeros, $numero);
                $i++;
            }
        } while ($i < 4);

        sort($arr_estrellas);

        $i = 0;
        do {
            $numero = random_int(1, 12);

            if (!in_array($numero, $arr_estrellas, true)){
                array_push($arr_estrellas, $numero);
                $i++;
            }
        } while ($i < 3);

        sort($arr_estrellas);

        //$numero = random_int(0, $limite);

        return $this->render('euromillones.html.twig', ['numero' => $i,
                                                        'limite' => $i]);
    }
    
    public function numeroMaximo($maximo)
    {

        /* if (!is_int($maximo)){
            $maximo = 0;
            return $this->redirectToRoute('app_numero_sorteo_max', 
                                            array('maximo' => $maximo));
        } */

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
        return $this->render('estructuraBase.html.twig');
    }
}