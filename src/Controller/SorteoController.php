<?php
// src/Controller/SorteoController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Apuesta;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class SorteoController extends AbstractController
{
    public function nuevaApuesta(Request $request)
    {
        $apuesta = new Apuesta();
        /* Descomenta las siguientes líneas para rellenar la apuesta
           con información de prueba en lugar de estar vacía */
        $apuesta->setTexto('2 13 34 44 48');
        $apuesta->setFecha(new \DateTime('tomorrow'));

        // Fecha en formato yyyy-mm-dd hh-mi-ss
        // $apuesta->setFecha(new \DateTime('2020-10-21 23:15:12'));
        // Fecha y hora actual
        // $apuesta->setFecha(new \DateTime('now'));
        // Si no ponemos argumento también coge la fecha y hora actual
        // $apuesta->setFecha(new \DateTime());
        // Fecha de ayer
        // $apuesta->setFecha(new \DateTime('yesterday'));
        // Fecha de mañana
        // $apuesta->setFecha(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($apuesta)
            ->add('texto', TextType::class)
            ->add('fecha', DateType::class)
            ->add('save', SubmitType::class,
                array('label' => 'Añadir Apuesta'))
            ->getForm();

        return $this->render('sorteo/nuevaApuesta.html.twig', array(
            'form' => $form->createView(),
        ));
    }    

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
                                                  'maximo' => $maximo]);
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