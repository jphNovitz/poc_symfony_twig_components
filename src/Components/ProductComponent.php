<?php

namespace App\Components;

use Doctrine\Common\Collections\Collection;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('product')]
class ProductComponent
{

    public Object $product;
}