<?php

namespace App\DataFixtures;

use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TeamFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $i = 1;

        //Set test values in the table "Team" for 4 teams
        while ($i <= 4) {
            $team = new Team();
            $team->setGame($this->getReference('game_' . $i));
            $team->setName("Team n" . $i);
            /*logo*/
            $team->setDivision("Division n" . $i);
            $team->setCountry("Country n" . $i);
            $team->setSlug("team-n" . $i);

            //Create a reference of $team for other tables
            $this->setReference('team_' . $i, $team);

            $manager->persist($team);
            $i++;
        }
        $manager->flush();
    }

    //Get the order of this fixture
    public function getOrder()
    {
        return 2;
    }
}