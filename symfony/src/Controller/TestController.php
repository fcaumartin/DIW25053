<?php

namespace App\Controller;

use App\Entity\Disc;
use App\Repository\DiscRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(DiscRepository $repo): Response
    {
        
        $discs = $repo->findAll();

        
        return $this->render('test/index.html.twig', [ 
            "discs" => $discs
        ]);
    }

    #[Route('/details/{id}', name: 'app_details')]
    public function details(Disc $id): Response
    {
        
        

        
        return $this->render('test/details.html.twig', [ 
            "disc" => $id    
        ]);
    }
}
