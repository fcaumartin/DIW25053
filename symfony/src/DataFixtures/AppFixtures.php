<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {

        $user = new User();
        $user->setEmail("toto@test.com");

        $password_hash = $this->hasher->hashPassword($user, "1234");

        $user->setPassword($password_hash);

        $user->setRoles(["ROLE_ADMIN", "ROLE_CLIENT"]);

        $manager->persist($user);


        $user1 = new User();
        $user1->setEmail("user@test.com");

        $password_hash = $this->hasher->hashPassword($user1, "1234");

        $user1->setPassword($password_hash);
        
        $user1->setRoles([]);

        $manager->persist($user1);

        $manager->flush();
    }
}
