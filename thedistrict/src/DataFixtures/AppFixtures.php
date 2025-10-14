<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Plat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $c1 = new Categorie();
        $c1->setLibelle("Categorie 1");
        $c1->setImage("https://picsum.photos/200/300");
        $c1->setActive(true);
        $manager->persist($c1);

        $c2 = new Categorie();
        $c2->setLibelle("Categorie 2");
        $c2->setImage("https://picsum.photos/200/300");
        $c2->setActive(true);
        $manager->persist($c2);

        $c3 = new Categorie();
        $c3->setLibelle("Categorie 3");
        $c3->setImage("https://picsum.photos/200/300");
        $c3->setActive(true);
        $manager->persist($c3);

        $p1 = new Plat();
        $p1->setLibelle("Plat 1");
        $p1->setImage("https://picsum.photos/200/300");
        $p1->setActive(true);
        $p1->setCategorie($c1);
        $manager->persist($p1);

        $p2 = new Plat();
        $p2->setLibelle("Plat 2");
        $p2->setImage("https://picsum.photos/200/300");
        $p2->setActive(true);
        $p2->setCategorie($c1);
        $manager->persist($p2);

        $p3 = new Plat();
        $p3->setLibelle("Plat 3");
        $p3->setActive(true);
        $p3->setImage("https://picsum.photos/200/300");
        $p3->setCategorie($c1);
        $manager->persist($p3);

        $manager->flush();
    }
}
