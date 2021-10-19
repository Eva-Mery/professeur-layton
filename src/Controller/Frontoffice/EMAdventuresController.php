<?php

namespace App\Controller\Frontoffice;

use App\Entity\Character;
use App\Entity\EMJeu;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EMAdventuresController extends AbstractController
{
    #[Route('/adventures', name: 'e_m_adventures')]
    public function index(): Response
    {

        $em = $this->getDoctrine()->getManager();
        $adventures = $em->getRepository(EMJeu::class)->findBy([], ['position'=>'asc']);

        return $this->render('e_m_adventures/index.html.twig', [
            'adventures' => $adventures,
        ]);
    }
}
