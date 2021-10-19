<?php

namespace App\Controller;

use App\Entity\Puzzle;
use App\Form\PuzzleType;
use App\Repository\PuzzleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/puzzle')]
class PuzzleController extends AbstractController
{
    #[Route('/', name: 'puzzle_index', methods: ['GET'])]
    public function index(PuzzleRepository $puzzleRepository): Response
    {
        return $this->render('puzzle/index.html.twig', [
            'puzzles' => $puzzleRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'puzzle_new', methods: ['GET','POST'])]
    public function new(Request $request): Response
    {
        $puzzle = new Puzzle();
        $form = $this->createForm(PuzzleType::class, $puzzle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($puzzle);
            $entityManager->flush();

            return $this->redirectToRoute('puzzle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('puzzle/new.html.twig', [
            'puzzle' => $puzzle,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'puzzle_show', methods: ['GET'])]
    public function show(Puzzle $puzzle): Response
    {
        return $this->render('puzzle/show.html.twig', [
            'puzzle' => $puzzle,
        ]);
    }

    #[Route('/{id}/edit', name: 'puzzle_edit', methods: ['GET','POST'])]
    public function edit(Request $request, Puzzle $puzzle): Response
    {
        $form = $this->createForm(PuzzleType::class, $puzzle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('puzzle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('puzzle/edit.html.twig', [
            'puzzle' => $puzzle,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'puzzle_delete', methods: ['POST'])]
    public function delete(Request $request, Puzzle $puzzle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$puzzle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($puzzle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('puzzle_index', [], Response::HTTP_SEE_OTHER);
    }
}
