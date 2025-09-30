<?php

namespace App\Controller;

use App\Entity\Disc;
use App\Form\Disc2Type;
use App\Repository\DiscRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil1')]
    public function index1(DiscRepository $repo): Response
    {

        $discs = $repo->findBy([], [ "title" => "ASC"]);


        return $this->render('accueil/accueil.html.twig', [
            "discs" => $discs
        ]);
    }

    #[Route('/details/{disc}', name: 'app_details')]
    public function details(Disc $disc): Response
    {

        // $disc = $repo->find($id);

        return $this->render('accueil/details.html.twig', [
            "disc" => $disc
        ]);
    }

    #[Route('/ajout', name: 'app_ajout')]
    public function ajout(Request $request, EntityManagerInterface $manager): Response
    {
        $disc = new Disc();

        $form = $this->createForm(Disc2Type::class, $disc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $picture_name = $disc->getTitle() . ".png";
            $picture = $form->get('picture')->getData();
            $picture->move('../assets/images/', $picture_name);

            $disc->setPicture($picture_name);

            $manager->persist($disc);

            $manager->flush();

            return $this->redirectToRoute('app_accueil1');
        }


        return $this->render('accueil/ajout.html.twig', [
            "form" => $form    
        ]);
    }


    
}
