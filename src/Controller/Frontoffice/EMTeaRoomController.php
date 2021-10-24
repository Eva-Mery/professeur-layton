<?php

namespace App\Controller\Frontoffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Video;

class EMTeaRoomController extends AbstractController
{
    #[Route('/tea-room', name: 'e_m_tea_room')]
    public function index(): Response
    {

        $em = $this->getDoctrine()->getManager();
        $videos = $em->getRepository(Video::class)->findAll();

        $tabURL = [];
        $URL = ["",""];
        foreach ($videos as $video) {
            $URL = explode('=', $video->getLien());
            $tabURL[]=$URL[1];
            //$tabURL->array_push($URL[1]);
        }

        return $this->render('e_m_tea_room/index.html.twig', [
            'tabURL' => $tabURL,
            'videos' => $videos,
        ]);
    }
}
