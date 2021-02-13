<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use Twig\Environment;


class SiteController extends AbstractController
{   
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }



    /**
     * @Route("/", name="homepage")
     */
    public function index(CategoryRepository $categoryRepository): Response
    {
        $response = new Response($this->twig->render('site/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]));

        return $response;
    }
}
