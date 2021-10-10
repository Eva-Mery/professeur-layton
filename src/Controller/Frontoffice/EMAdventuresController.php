<?php

namespace App\Controller\Frontoffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EMAdventuresController extends AbstractController
{
    #[Route('/adventures', name: 'e_m_adventures')]
    public function index(): Response
    {
        return $this->render('e_m_adventures/index.html.twig', [
            'controller_name' => 'EMAdventuresController',
        ]);
    }
}
