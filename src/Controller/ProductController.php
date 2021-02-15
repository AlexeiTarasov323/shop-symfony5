<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Twig\Environment;

class ProductController extends AbstractController
{   
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }


    /**
     * @Route("/product{$id}", name="product")
     */
    public function index(): Response
    {
        $response = new Response($this->twig->render('catalog/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
            'product' => $productRepository->getProductById($id),

        ]));

        return $response;
    }
}
