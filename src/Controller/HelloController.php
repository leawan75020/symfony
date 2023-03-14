<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController
{
    #[Route('/hello/{id} ', name: 'app_hello')]
    public function index(int $id): Response
    {
        $name ="";
        return $this->render('hello/index.html.twig', [
            'controller_name' => $name,
            'id'=> $id,
        ]);
    }
    #[Route('/hello', name: 'app_hello_hello')]
    public function hello(Request $request): Response
    {
        $name = $request->query->get('name','le nom par default');
        return new Response((sprintf('hello %s !', $name)));
}
}