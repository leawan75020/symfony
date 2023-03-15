<?php

namespace App\Controller;

use App\Entity\Pizza;
use App\Repository\PizzaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PizzaController extends AbstractController
{
    #[Route('/pizza', name: 'app_pizza')]
    public function index(): Response
    {
        return $this->render('pizza/index.html.twig', [
            'controller_name' => 'PizzaController',
        ]);
    }
    #[Route('/pizza/nouvelle', name: 'app_pizza_newPizza')]
    public function newPizza(PizzaRepository $repository): Response
    {

        //crer une new pizza l'objet pizza
        $pizza = new Pizza();
        $pizza->setName('Regina');
        $pizza->setPrice(15.99);

        //enregistrer la pizza dans la bd
        $repository->save($pizza, true);
        
        //recuperer une pizza selon id
        $pizza1 = $repository->find(1);
        var_dump($pizza1);
        echo '<br>';

        //recuperer toutes les pizza dans une liste
        $pizzas = $repository->findAll();
        var_dump($pizzas);
        echo '<br>';

        //supprimer une pizza
        $repository->remove($pizza, true);





        //affichage une confirmation
        return new Response("La pizza avec l'id  {$pizza->getId()} a bien été reregistre");
    }

    #[Route('/pizza/{id}/afficher', name: 'app_pizza_show')]
    public function show(int $id, PizzaRepository $repository): Response
    {
        //recuperer de la pizza qui a l'id $id
        $pizza = $repository->find($id);
        //affichage du nom de la pizza
        return new Response("nom: {$pizza->getName()}");
    }
      //grace a frameworkExtraBundle la 2eme methode resout le id en pizza directment
      // donc l'appel a $respository->find() est faity automatic en arriere plan
      #[Route('/pizza/{id}/afficher2', name: 'app_pizza_show2')]
      //symfony reconnait automatique par Pizza aulieu de 'int $id, PizzaRepository $repository' et non plus besoin de '$pizza = $repository->find($id);' 
    public function show2(Pizza $pizza): Response
    {
       //affichage du nom de la pizza
        return new Response("nom: {$pizza->getName()}");
    }

}