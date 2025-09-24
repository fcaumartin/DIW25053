<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {
        $nom = "toto";


        return $this->render('test/index.html.twig', [ 
            "nom" => $nom,
            "prenom" => "TITI"
        ]);
    }
}
