<?php

namespace App\Service;

use App\Entity\Plat;
use App\Repository\PlatRepository;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Panier {

    private $session;
    private $repo;

    public function __construct(RequestStack $request, PlatRepository $repo)
    {
        $this->session = $request->getSession();
        $this->repo = $repo;
    }

    public function add(Plat $plat) {

        $panier = $this->session->get("panier", []);

        if ( isset($panier[$plat->getId()]) ) {
            $quantite = $panier[$plat->getId()];
            $panier[$plat->getId()] = $quantite + 1;
        }
        else {
            $panier[$plat->getId()] = 1;
        }

        $this->session->set("panier", $panier);

        
    }

    public function del(Plat $plat) {

        $panier = $this->session->get("panier", []);

        if ( isset($panier[$plat->getId()]) ) {
            $panier[$plat->getId()]--;
            if ($panier[$plat->getId()]==0) {
                unset($panier[$plat->getId()]);
            }
        }

        $this->session->set("panier", $panier);
    }

    public function get() {

        $panier = $this->session->get("panier", []);

        $panier_pour_twig = [];
        foreach ($panier as $id_plat => $quantite) {
            $plat = $this->repo->find($id_plat);
            $panier_pour_twig[] = [
                "plat" => $plat,
                "quantite" => $quantite
            ];
        }

        return $panier_pour_twig;
    }
}