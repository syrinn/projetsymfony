<?php

namespace App\Controller;

use App\Entity\Restaurateur;
use App\Form\RestaurateurType;
use App\Repository\RestaurateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/restaurateur')]
class RestaurateurController extends AbstractController
{
    #[Route('/', name: 'app_restaurateur_index', methods: ['GET'])]
    public function index(RestaurateurRepository $restaurateurRepository): Response
    {
        return $this->render('restaurateur/index.html.twig', [
            'restaurateurs' => $restaurateurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_restaurateur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RestaurateurRepository $restaurateurRepository): Response
    {
        $restaurateur = new Restaurateur();
        $form = $this->createForm(RestaurateurType::class, $restaurateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $restaurateurRepository->save($restaurateur, true);

            return $this->redirectToRoute('app_restaurateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('restaurateur/new.html.twig', [
            'restaurateur' => $restaurateur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_restaurateur_show', methods: ['GET'])]
    public function show(Restaurateur $restaurateur): Response
    {
        return $this->render('restaurateur/show.html.twig', [
            'restaurateur' => $restaurateur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_restaurateur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Restaurateur $restaurateur, RestaurateurRepository $restaurateurRepository): Response
    {
        $form = $this->createForm(RestaurateurType::class, $restaurateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $restaurateurRepository->save($restaurateur, true);

            return $this->redirectToRoute('app_restaurateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('restaurateur/edit.html.twig', [
            'restaurateur' => $restaurateur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_restaurateur_delete', methods: ['POST'])]
    public function delete(Request $request, Restaurateur $restaurateur, RestaurateurRepository $restaurateurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$restaurateur->getId(), $request->request->get('_token'))) {
            $restaurateurRepository->remove($restaurateur, true);
        }

        return $this->redirectToRoute('app_restaurateur_index', [], Response::HTTP_SEE_OTHER);
    }
}
