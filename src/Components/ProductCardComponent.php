<?php

namespace App\Components;

use Doctrine\Common\Collections\Collection;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('product-card')]
class ProductCardComponent
{

    public Object $product;
}