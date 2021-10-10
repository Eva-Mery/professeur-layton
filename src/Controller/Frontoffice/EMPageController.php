<?php

namespace App\Controller\Frontoffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Page;

class EMPageController extends AbstractController
{
    #[Route('/page/{page}', name: 'frontoffice_e_m_page')]
    public function index(Page $page): Response
    {
        return $this->render('frontoffice/em_page/index.html.twig', [
            'page' => $page,
        ]);
    }
}
