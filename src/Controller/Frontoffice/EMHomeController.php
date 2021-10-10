<?php

namespace App\Controller\Frontoffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EMHomeController extends AbstractController
{
    #[Route('/', name: 'e_m_home')]
    public function index(): Response
    {
        return $this->render('e_m_home/index.html.twig', [
            'controller_name' => 'EMHomeController',
        ]);
    }
}
