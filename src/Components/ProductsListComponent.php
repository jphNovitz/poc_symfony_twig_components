<?php

namespace App\Components;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('products-list')]
class ProductsListComponent
{
    public mixed $products;

}