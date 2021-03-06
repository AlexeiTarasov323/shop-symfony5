<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Twig\Environment;

class CatalogController extends AbstractController
{   
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }


    /**
     * @Route("/catalog", name="catalog")
     */
    public function actionIndex(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {   

        $response = new Response($this->twig->render('catalog/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
            'latestproducts' => $productRepository->getLatestProducts(),

        ]));

        return $response;
    }


     /**
     * @Route("/catalog{$id}", name="catalog_id")
     */
    public function actionCatalog(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {   

        $response = new Response($this->twig->render('catalog/category.html.twig', [
            'categories' => $categoryRepository->findAll(),
            'productslist' => $productRepository->getProductsListByCategory($id),

        ]));

        return $response;
    }
}
