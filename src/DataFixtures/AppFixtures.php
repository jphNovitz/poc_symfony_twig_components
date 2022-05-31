<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use App\Entity\Product;
use App\Entity\User;
use App\Repository\IngredientRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{

    public function __construct(protected IngredientRepository $ingredientRepository){
        $this->ingredientRepository = $ingredientRepository;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $faker->addProvider(new \FakerRestaurant\Provider\fr_FR\Restaurant($faker));
        $categories = ['dairy', 'vegetable', 'fruit', 'meat', 'sauce'];

        foreach ($categories as $category){
            for($loop = 0 ; $loop < 5; $loop++) {
                $ingredient[$loop] = new Ingredient();
                $ingredient[$loop]->setCategory($category);
                $tmp_name = $category . 'Name';
                $ingredient[$loop]->setName($faker->unique()->$tmp_name());
                $manager->persist($ingredient[$loop]);
            }

        }
        $manager->flush();

        $ingredients = $this->ingredientRepository->findAll();

        for ($loop = 0 ; $loop < 10; $loop++){
            $user = new User();
            $user->setUsername($faker->userName());
            $manager->persist($user);

            $product = new Product();
            $product->setUser($user);

            $product->setName($faker->unique()->foodName());
            for ($l = 0 ; $l < 10; $l++){
                $product->addIngredient($ingredients[array_rand($ingredients)]);
            }
            $manager->persist($product);
        }
        $manager->flush();
    }
}
