<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use App\Entity\Disc;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Fixture1 extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $a1 = new Artist();
        $a1->setName("AC/DC");
        $a1->setUrl("https://www.acdc.com");
        $manager->persist($a1);

        $d1 = new Disc();
        $d1->setTitle("Back to Black");
        $d1->setYear(1981);
        $d1->setArtist($a1);
        $manager->persist($d1);


        $d2 = new Disc();
        $d2->setTitle("Highway to Hell");
        $d2->setYear(1983);
        $d2->setArtist($a1);
        $manager->persist($d2);


        $a2 = new Artist();
        $a2->setName("Muse");
        $a2->setUrl("https://www.acdc.com");
        $manager->persist($a2);
        
        
        $manager->flush();

        
        
        

    }
}
