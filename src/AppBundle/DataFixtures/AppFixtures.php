<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Buzz;
use AppBundle\Entity\Fizz;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 5; $i++) {
            $fizz = new Fizz();
            $fizz->setName('fizz '.$i);

            for($j = 1; $j <= 10; $j++) {
                $buzz = new Buzz();
                $buzz->setName('buzz '.$j);
                $buzz->setFizz($fizz);

                $manager->persist($buzz);
            }

            $manager->persist($fizz);
        }

        $manager->flush();
    }
}