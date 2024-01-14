<?php

namespace App\Controller;

use App\Entity\Product;

class ProductType
{

    public function __construct()
    {
    }


    public function configureOptions(\Symfony\Component\OptionsResolver\OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }

}