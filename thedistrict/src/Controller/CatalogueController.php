<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class CatalogueController extends AbstractController
{
    #[Route('/', name: 'app_catalogue')]
    public function index(CategorieRepository $repo): Response
    {
        $categories = $repo->findBy([ "active" => true ]);


        return $this->render('catalogue/index.html.twig', [
            "categories" => $categories
        ]);
    }

    #[Route('/plats/{categorie}', name: 'app_plats')]
    public function plats(Categorie $categorie): Response
    {


        return $this->render('catalogue/plats.html.twig', [
            "categorie" => $categorie
        ]);
    }
}
