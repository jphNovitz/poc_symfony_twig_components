<?php

namespace App\Components;


use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\ValidatableComponentTrait;
use Symfony\Component\Validator\Constraints as Assert;

#[asLiveComponent('product-update')]
class ProductUpdateComponent
{
    use DefaultActionTrait;
    use ValidatableComponentTrait;

    #[LiveProp(exposed: ['name', 'comment'])]
    #[Assert\Valid]
    public Product $product;

    public bool $isSaved = false;

    #[LiveAction]
    public function save(EntityManagerInterface $entityManager)
    {
        $this->validate();

        $this->isSaved = true;
        $entityManager->flush();

    }
}