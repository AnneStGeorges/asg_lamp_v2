<?php

namespace App\DataFixtures;

use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i=0; $i<15; $i++){
            $date = new \DateTime(date("Y-m-d",mt_rand(strtotime('2021-08-11'),strtotime('2021-12-31'))));
            $event = new Event();
            $event->setName('evenement'.$i);
            $event->setDate($date);
            $manager->persist($event);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [EventFixtures::class];
    }
}
