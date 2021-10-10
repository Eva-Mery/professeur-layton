<?php

namespace App\Controller\Frontoffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EMTeaRoomController extends AbstractController
{
    #[Route('/tea-room', name: 'e_m_tea_room')]
    public function index(): Response
    {
        return $this->render('e_m_tea_room/index.html.twig', [
            'controller_name' => 'EMTeaRoomController',
        ]);
    }
}
