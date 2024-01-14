<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="app_dashboard")
     */
    public function index(): Response
    {
        // Get all products
         $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
        $productRepository = $this->getDoctrine()->getRepository(\App\Entity\Product::class);
        $products = $productRepository->findAll();

        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'products' => $products,
        ]);
    }
}
