## Little project trying to apply the Twig Components

Ce projet est un petit P.O.C pour apprendre ce que sont et comment fonctionnent les **Twig UX Components** et les  **Twix live components**.

J'ai pris un exemple: une liste de produits, chaque produit contient des ingrédients.

J'ai fait 3 exemples:

- Récupérer les produits dans le controller et le passer passer à mon component (2 en fait) qui gèrent le html
  * **Product-list** recoit un tableau de produits et boucle dessus.  A chaque passage il appelle un autre composant.
  * **Product-card** reoit les infos d'un produit et gère l'affichage.
- J'ai fait un composant **Live** qui récupère lui-même tous les ingrédients et en affiche la liste.
  * ce composant est **réactif** ce qui permet de mettre un champs input et à chaque caratère frappé in interroge la base de données
  * si des ingrédients correspondent à la query ils sont surligné en jaune.
- La page **Product-update** permet d'afficher un produit et un formulaire et de modifier 'live' le nom ou la description sans coder une ligne de javascript.


Les Twig components sont très utilses pour créer des briques (re)utilisables pour composer votre projet.  
Les Live component sont très utilises pour de la réactivité mais attention à l'optimisation car tel quel ca fait un tas de requete !

-----------------------------------------------------------------------------------------------------------------------

![screenshot_twig_components (1).png](screenshot_twig_components (1).png)
![screenshot_twig_components (2).png](screenshot_twig_components (2).png)
![screenshot_twig_components (3).png](screenshot_twig_components (3).png)
![screenshot_twig_components (4).png](screenshot_twig_components (4).png)

-----------------------------------------------------------------------------------------------------------------------

This project is a little P.O.C to learn what are **Twig UX Components** and **Twix live components** and how does it work.  
  
I took an example: a list of products, each product contains some ingredients.
  
I made 3 example:
- get all the products in the controller and pass it to a Twig Component (2 componenents in fact) who just handles html.  
  * Product-list receive an array of product and loop over it. In each pass call an other component
  * product-card receive a single product data and manage its vzualisation.
- I made a live component that gets all the ingredient and shows a list.  
  * This compoent is reactive/live so it has a input that allows to type first letter of an ingredient 
  * The component uses the repository to find the right item
  * The choosen ingredient is highlighted
- Product update page allow to update a product name or description in real time (kind of) without coding in javascript.  

Twig components Component is very usefull to create little bricks that can be usable and reusable to compose your project.  
Live components are useful too but you must take care of the optimization because it make request (under th hood) everywhere.


-----------------------------------------------------------------------------------------------------------------------


### Installed Bundles
* Symfony 6 (php 8.1)
* Orm pack
* FakerPHP / Faker 
* jzonta / FakerRestaurant
* doctrine/doctrine-fixtures-bundle
* symfony/validator 
* doctrine/annotations

### Install / clone
* clone project
* composer install
* yarn install
* php bin/console make:migration
* php bin/console doctrine:migrations:migrate
* symfony serve
* npm tun watch


