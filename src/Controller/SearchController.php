<?php

namespace App\Controller;

use App\DTO\SearchFormDataDTO;
use App\Form\SearchFormDataType;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search', methods: ['GET'])]
    public function index(Request $request, PostRepository $postRepository): Response
    {
        $data = new SearchFormDataDTO();
        $form = $this->createForm(SearchFormDataType::class, $data, [
            'method' => 'GET',
            'csrf_protection' => false
        ]);
        $form->handleRequest($request);

        $posts = [];
        if ($form->isSubmitted() && $form->isValid()) {
            $posts = $postRepository->findByTitle($data->getTitle());
        }

        return $this->render('search/index.html.twig', [
            'form_search' => $form,
            'posts' => $posts
        ]);
    }
}
