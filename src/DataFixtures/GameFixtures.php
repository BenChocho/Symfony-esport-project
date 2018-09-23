<?php

namespace App\DataFixtures;

use App\Entity\Game;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class GameFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $i = 1;
        //Set test values in the table "Game" for 4 games
        while ($i <= 4) {
            $game = new Game();
            $game->setName("Game n" . $i);
            /*banner*/
            $game->setSynopsis("Synopsis n" . $i);
            $game->setRules("Rules n" . $i);
            $game->setReleaseDate(new \DateTime());

            $game->setPlayerNumber(5);

            //Create a reference of $game for other tables
            $this->setReference('game_' . $i, $game);

            $game->setSlug("game-n" . $i);


            $manager->persist($game);
            $i++;
        }
        $manager->flush();
    }

    //Get the order of this fixture
    public function getOrder()
    {
        return 1;
    }
}