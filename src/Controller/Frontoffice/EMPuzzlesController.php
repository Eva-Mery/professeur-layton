<?php

namespace App\Controller\Frontoffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EMPuzzlesController extends AbstractController
{
    #[Route('/puzzles', name: 'e_m_puzzles')]
    public function index(): Response
    {
        return $this->render('e_m_puzzles/index.html.twig', [
            'controller_name' => 'EMPuzzlesController',
        ]);
    }
}
