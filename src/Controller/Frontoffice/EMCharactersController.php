<?php

namespace App\Controller\Frontoffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Character;

class EMCharactersController extends AbstractController
{
    #[Route('/characters', name: 'e_m_characters')]
    public function index(): Response
    {
        // On va sélectionner en base tous les personnages
        $em = $this->getDoctrine()->getManager();
        $characters = $em->getRepository(Character::class)->findAll();

        // ... et on les renvoie au template
        return $this->render('e_m_characters/index.html.twig', [
            'characters' => $characters,
        ]);
    }
}
