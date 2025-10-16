<?php

namespace App\Controller;

use App\Entity\Plat;
use App\Service\Panier;
use App\Repository\PlatRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class PanierController extends AbstractController
{
    #[Route('/panier', name: 'app_panier')]
    public function index(Panier $panier): Response
    {
        
        return $this->render('panier/index.html.twig', [
            'panier' => $panier->get(),
        ]);
    }

    #[Route('/panier/add/{plat}', name: 'app_add_panier')]
    public function panier_add(Plat $plat, Panier $panier): Response
    {
        $panier->add($plat);

        return $this->redirect("/panier");
    }

    #[Route('/panier/del/{plat}', name: 'app_del_panier')]
    public function panier_del(Plat $plat, Panier $panier): Response
    {
        $panier->del($plat);

        return $this->redirect("/panier");
    }
}
