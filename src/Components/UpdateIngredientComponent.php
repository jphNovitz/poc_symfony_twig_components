<?php

namespace App\Components;

use App\Entity\Ingredient;
use App\Repository\IngredientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\ValidatableComponentTrait;

#[asLiveComponent('update-ingredient-component')]
class UpdateIngredientComponent
{
    use DefaultActionTrait;
//    use ValidatableComponentTrait;


    #[LiveProp(writable: true)]
//    #[Assert\Valid]
    public string $name = "";

    public array $ingedients;

    public function __construct(public  IngredientRepository $ingredientRepository ){
        $this->ingredients = $ingredientRepository->findAll();
    }

    #[LiveAction]
    public function Add(EntityManagerInterface $entitimanager)
    {
        $ingredient = new Ingredient();
        $ingredient->setName($this->name);
        $entitimanager->persist($ingredient);
        $entitimanager->flush(); die('hello');
//        $this->validate();

    }



}