<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="app_admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    public function edit(Product $product, UserInterface $user): Response
    {
        // Check if the current user is allowed to edit this product
        if (!$this->isGranted('EDIT', $product)) {
            throw $this->createAccessDeniedException();
        }

        $form = $this->createForm(ProductType::class, $product);

        return $this->render('admin/edit.html.twig', [
            'form' => $form->createView(),
            'product' => $product,
            'user' => $user,
            'csrf_protection' => true,
            'controller_name' => 'AdminController',
        ]);
    }
}
