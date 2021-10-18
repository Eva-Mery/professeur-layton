<?php

namespace App\Controller;

use App\Entity\EMJeu;
use App\Form\EMJeuType;
use App\Repository\EMJeuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/jeu')]
class EMJeuController extends AbstractController
{
    #[Route('/', name: 'em_jeu_index', methods: ['GET'])]
    public function index(EMJeuRepository $eMJeuRepository): Response
    {
        return $this->render('em_jeu/index.html.twig', [
            'adventures' => $eMJeuRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'em_jeu_new', methods: ['GET','POST'])]
    public function new(Request $request): Response
    {
        $eMJeu = new EMJeu();
        $form = $this->createForm(EMJeuType::class, $eMJeu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($eMJeu);
            $entityManager->flush();

            return $this->redirectToRoute('em_jeu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('em_jeu/new.html.twig', [
            'jeu' => $eMJeu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'em_jeu_show', methods: ['GET'])]
    public function show(EMJeu $eMJeu): Response
    {
        return $this->render('em_jeu/show.html.twig', [
            'jeu' => $eMJeu,
        ]);
    }

    #[Route('/{id}/edit', name: 'em_jeu_edit', methods: ['GET','POST'])]
    public function edit(Request $request, EMJeu $eMJeu): Response
    {
        $form = $this->createForm(EMJeuType::class, $eMJeu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('em_jeu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('em_jeu/edit.html.twig', [
            'jeu' => $eMJeu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'em_jeu_delete', methods: ['POST'])]
    public function delete(Request $request, EMJeu $eMJeu): Response
    {
        if ($this->isCsrfTokenValid('delete'.$eMJeu->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($eMJeu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('em_jeu_index', [], Response::HTTP_SEE_OTHER);
    }
}
