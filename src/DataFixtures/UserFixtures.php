<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

       
        $user = new User();
        $user->setNom("Ben Salah");
        $user->setPrenom("Ali");
        $user->setEmail("ali@gmail.com");
        $user->setPassword($this->passwordEncoder->encodePassword(
                         $user,
                         'admin'
                    )) ;
        $user->setRoles(['ROLE_USER']);
        $manager->persist($user);      
        $user = new User();
        $user->setNom("karkar");
        $user->setPrenom("yassine");
        $user->setEmail("yassine@gmail.com");
        $user->setPassword($this->passwordEncoder->encodePassword(
                         $user,
                         'yassine'
                    )) ;
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);

        $manager->flush();
    }
}
