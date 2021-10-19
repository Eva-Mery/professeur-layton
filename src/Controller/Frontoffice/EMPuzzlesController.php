<?php

namespace App\Controller\Frontoffice;

use App\Entity\EMJeu;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EMPuzzlesController extends AbstractController
{
    #[Route('/puzzles', name: 'e_m_puzzles')]
    public function index(): Response
    {

        $em = $this->getDoctrine()->getManager();
        $adventures = $em->getRepository(EMJeu::class)->findBy([], ['position'=>'asc']);

        return $this->render('e_m_puzzles/index.html.twig', [
            'puzzles' => $puzzles,
        ]);
    }
}
