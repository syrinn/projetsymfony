<?php

namespace App\DataFixtures;

use App\Entity\Users;

use App\Entity\Restaurant;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class Data extends Fixture
{
    public function load(ObjectManager $manager): void
    {

      for($i=0;$i<20;$i++) {
        $resto=new Restaurant();
        $resto->setNom("Resto".$i) ;
        $resto->setAdresse("Adresse".$i) ;
        $resto->setNumtel("56089756");
        $resto->setRestaurateur("aaa");
        $manager->persist($resto);
    }

  $manager->flush();
}
}
