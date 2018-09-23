<?php

namespace App\DataFixtures;

use App\Entity\Match;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class MatchFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $i = 1;
        //Set test values in the table "_match" for 4 matches
        while ($i <= 4) {
            $j = $this->hasReference('team_' . ($i + 1)) ? $i + 1 : 1;

            $match = new Match();
            $match->setTeamA($this->getReference('team_' . $i));
            $match->setTeamB($this->getReference('team_' . $j));
            $match->setGame($this->getReference('game_' . $i));
            $match->setDate(new \DateTime());
            $match->setScore($i . " - " . $i);
            $match->setCreated(new \DateTime());
            $match->setUpdated(new \DateTime());

            $manager->persist($match);
            $i++;
        }
        $manager->flush();
    }

    //Get the order of this fixture
    public function getOrder()
    {
        return 3;
    }
}