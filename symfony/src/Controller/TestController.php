<?php

namespace App\Controller;

use App\Entity\Disc;
use App\Form\DiscType;
use App\Form\TestType;
use App\Repository\DiscRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/disc_details/{id}', name: 'app_disc_details')]
    public function details(Disc $id): Response
    {
        
        

        
        return $this->render('test/details.html.twig', [ 
            "disc" => $id    
        ]);
    }


    #[Route('/formulaire', name: 'app_formulaire')]
    public function formulaire(Request $request, EntityManagerInterface $manager): Response
    {
        $disc = new Disc();

        $form = $this->createForm(DiscType::class, $disc);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // dd($disc);
            $manager->persist($disc);
            $manager->flush();

            return $this->redirect("/test");
        }

        
        return $this->render('test/formulaire.html.twig', [ 
            "form" => $form
               
        ]);
    }



    #[Route('/message', name: 'app_message')]
    public function message(Request $request): Response
    {
        
        $form = $this->createForm(TestType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            dd($form);

            return $this->redirect("/");
        }

        
        return $this->render('test/message.html.twig', [ 
            "form" => $form
        ]);
    }
}
