<?php

namespace App\DataFixtures;

use App\Entity\Users;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Data extends Fixture
{
    public function load(ObjectManager $manager): void
    {

      for($i=0;$i<20;$i++) {
        $users=new Users (); 
        $users->setNom("user".$i) ;
        $users->setEmail("Email".$i) ;
        $users->setPassword("******");
        $users->setnumtel("96350963");
        $manager->persist($users);
    }

  $manager->flush();
}
}
