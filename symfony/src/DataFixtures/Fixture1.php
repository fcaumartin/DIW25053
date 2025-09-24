<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Fixture1 extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $a1 = new Artist();
        $a1->setName("AC/DC2");
        $a1->setUrl("https://www.acdc.com");
        $manager->persist($a1);

        $a2 = new Artist();
        $a2->setName("Muse");
        $a2->setUrl("https://www.acdc.com");
        $manager->persist($a2);
        
        
        $manager->flush();

        
        
        

    }
}
