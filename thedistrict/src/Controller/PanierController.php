<?php

namespace App\Controller;

use App\Entity\Plat;
use App\Repository\PlatRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

final class PanierController extends AbstractController
{
    #[Route('/panier', name: 'app_panier')]
    public function index(SessionInterface $session, PlatRepository $repo): Response
    {
        $panier = $session->get("panier", []);

        dump($panier);

        $panier_pour_twig = [];
        foreach ($panier as $id_plat => $quantite) {
            $plat = $repo->find($id_plat);
            $panier_pour_twig[] = [
                "plat" => $plat,
                "quantite" => $quantite
            ];
        }

        dump($panier_pour_twig);


        return $this->render('panier/index.html.twig', [
            'panier' => $panier_pour_twig,
        ]);
    }

    #[Route('/panier/add/{plat}', name: 'app_add_panier')]
    public function panier_add(Plat $plat, SessionInterface $session): Response
    {
        $panier = $session->get("panier", []);

        if ( isset($panier[$plat->getId()]) ) {
            $quantite = $panier[$plat->getId()];
            $panier[$plat->getId()] = $quantite + 1;
        }
        else {
            $panier[$plat->getId()] = 1;
        }

        $session->set("panier", $panier);

        return $this->redirect("/panier");
    }

    #[Route('/panier/del/{plat}', name: 'app_del_panier')]
    public function panier_del(Plat $plat, SessionInterface $session): Response
    {
        $panier = $session->get("panier", []);

        if ( isset($panier[$plat->getId()]) ) {
            $panier[$plat->getId()]--;
            if ($panier[$plat->getId()]==0) {
                unset($panier[$plat->getId()]);
            }
        }

        $session->set("panier", $panier);

        return $this->redirect("/panier");
    }
}
