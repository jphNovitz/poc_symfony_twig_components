<?php

namespace App\Components;

use App\Repository\IngredientRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[asLiveComponent('ingredients-lateral-component')]
class IngredientsLateralComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public string $ingredientQuery = "";

    public array $ingredients;

    public function __construct(protected  IngredientRepository $ingredientRepository){
        $this->ingredients = $ingredientRepository->findAll();
    }

    public function getIds()
    {
        $ingredients = $this->ingredientRepository->search($this->ingredientQuery);
        $ids = [];
        foreach($ingredients as $ingredient){
            array_push($ids, $ingredient->getId());
        }

        return $ids;


    }

//    public function getIndredients() : array
//    {
//        return $this->ingredientRepository->findAll();
//    }

}