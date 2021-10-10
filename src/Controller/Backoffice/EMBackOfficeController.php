<?php

namespace App\Controller\Backoffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class EMBackOfficeController extends AbstractController
{
    #[Route('/', name: 'backoffice_home')]
    public function index(): Response
    {
        return $this->render('backoffice/em_back_office/index.html.twig', [
            'controller_name' => 'EMBackOfficeController',
        ]);
    }
}
