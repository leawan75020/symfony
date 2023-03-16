<?php

namespace App\Controller;

use App\Entity\Pizza;
use App\Repository\PizzaRepository;
use Doctrine\ORM\Repository\RepositoryFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PizzaController extends AbstractController
{
    #[Route('/pizza/nouvelle', name:'app_pizza_create')]
    public function create():Response
    {
        //affichage de la vue qui contient le formulaire
        return $this->render('pizza/create.html.twig');
    }

}