<?php

namespace App\Components;

use App\Repository\ProductRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[asLiveComponent('search')]
class SearchComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public string $query = "";

    public function __construct( private ProductRepository $productRepository)
    {
        $this->productRepository = $this->productRepository;
    }

    public function getProducts(): array
    {
        return $this->productRepository->findByQuery($this->query);
    }

}