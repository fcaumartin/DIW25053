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
        
        include 'record.php';

        foreach ($artists as $artist) {
            $a = new Artist();
            
            $a
                ->setId($artist["artist_id"])
                ->setName($artist["artist_name"])
                ->setUrl($artist["artist_url"]);

            $manager->persist($a);

            $metadata = $manager->getClassMetaData(Artist::class);
            $metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_NONE);
        }
        $manager->flush();
        

        $repo = $manager->getRepository(Artist::class);

        foreach ($discs as $disc) {
            $a = new Disc();
            
            // dd($disc["artist_id"]);
            $artist = $repo->find($disc["artist_id"]);
            // dd($artist);

            $a
                ->setTitle($disc["disc_title"])
                ->setYear($disc["disc_year"])
                ->setArtist($artist);
                
            $manager->persist($a);

        }
        
        
        $manager->flush();

        
        
        

    }
}
