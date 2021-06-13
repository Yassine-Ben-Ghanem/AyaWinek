<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{


    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
       $this->passwordEncoder = $passwordEncoder;
        
    }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

       
        $user = new User();
        $user->setFirstname("Chelbi");
        $user->setLastName("Khlifa");
        $user->setEmail("ali@gmail.com");
        $user->setPassword($this->passwordEncoder->encodePassword(
                         $user,
                         'khalifa'
                    )) ;
        $user->setRoles(['ROLE_USER']);
        $manager->persist($user);      
        $user = new User();
        $user->setFirstName("Ben Ghanem");
        $user->setLastName("yassine");
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
