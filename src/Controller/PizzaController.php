<?php

namespace App\Controller;

use App\Entity\Pizza;
use App\Repository\PizzaRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Repository\RepositoryFactory;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\BrowserKit\Request as BrowserKitRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class PizzaController extends AbstractController
{
    #[Route('/pizza/nouvelle', name:'app_pizza_create')]
    public function create(Request $request, PizzaRepository $repository) :Response
    {
        //tester si le formulaire est envoyé
        if($request->isMethod('POST')){

       
            //recupérer les champs du formulaire
            $name = $request->request->get('name');
            $price = $request->request->get('price');
            $description = $request->request->get('description');
            $imageUrl = $request->request->get('imageUrl');

            //créer l'objet pizza avec les champs du form
            $pizza = new Pizza();
            $pizza->setName($name);
            $pizza->setPrice($price);
            $pizza->setDescription($description);
            $pizza->setImageUrl($imageUrl);

            //enregistrer la pizza dans la BD via le repository
            $repository->save($pizza, true);

            //redirection vers la liste des pizzas
            return $this->redirectToRoute('app_pizza_list');
        }
        //affichage de la vue qui contient le formulaire
        return $this->render('pizza/create.html.twig');

        
    }

    #[Route('/pizza/list', name:'app_pizza_list')]
    public function list( PizzaRepository $repository) :Response
    {
        //recuperer la liste des pizza da la BD via le repo

        $pizzas = $repository->findAll();
        //afficher la list dans la twig
        return $this->render('pizza/list.html.twig', ['pizzas'=> $pizzas]);
    }

    #[Route('/pizza/{id}/modify', name:'app_pizza_update')]
    public function update( int $id, PizzaRepository $repository, Request $request) :Response
    {
        //recupere la pizza avec l'id 
        $pizza = $repository->find($id);

        //tester si le form est envoyé
        if($request->isMethod('POST')){
            //recuperer les champs du form
            $name= $request->request->get('name');
            $price= $request->request->get('price');
            $description= $request->request->get('description');
            $imageUrl= $request->request->get('imageUrl');
            //modify $pizza avec les new donnée
            $pizza->setName($name);
            $pizza->setPrice($price);
            $pizza->setDescription($description);
            $pizza->setImageUrl($imageUrl);

            //enregistrer les donnée dans la BD  via le repo
             $repository->save($pizza, true);
            //redirection vers la liste des pizzas
            return $this->redirectToRoute('app_pizza_list');
        }
        //affichage du form de modify
        return $this->render('pizza/update.html.twig',[
             'pizza' => $pizza
        ] );
       


    }
}