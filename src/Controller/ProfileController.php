<?php

namespace App\Controller;

use App\Entity\Game;
use App\Entity\Team;
use App\Repository\TeamRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfileController extends Controller
{
    /**
     * @Route("/profile", name="profile")
     */
    public function profile()
    {
        return $this->render('Content/profile.html.twig', [
            'controller_name' => 'GameController',
        ]);
    }

    /**
     * @Route("/favteam/{id}", name="add_fav_team")
     * @param Request $request
     * @param Team $team
     * @param ObjectManager $manager
     * @return int|string
     */
    public function addFavTeamAction(Request $request, Team $team, ObjectManager $manager)
    {

        $user = $this->getUser();
        $user->addFavTeam($team);
        $manager->persist($user);
        $manager->flush();


        return $this->render('Content/profile.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }

    /**
     * @Route("/deleteFavTeam/{id}", name="remove_fav_team")
     * @param Request $request
     * @param Team $team
     * @param ObjectManager $manager
     * @return int|string
     */
    public function removeFavTeamAction(Request $request, Team $team, ObjectManager $manager)
    {

        $user = $this->getUser();
        $user->removeFavTeam($team);
        $manager->flush();

        return $this->render('Content/profile.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }

    /**
     * @Route("/favGame/{id}", name="add_fav_game")
     * @param Request $request
     * @param Game $game
     * @param ObjectManager $manager
     * @return int|string
     */
    public function addFavGameAction(Request $request, Game $game, ObjectManager $manager)
    {

        $user = $this->getUser();
        $user->addFavGame($game);
        $manager->persist($user);
        $manager->flush();


        return $this->render('Content/profile.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }

    /**
     * @Route("/deleteFavGame/{id}", name="remove_fav_game")
     * @param Request $request
     * @param Game $game
     * @param ObjectManager $manager
     * @return int|string
     */
    public function removeFavGameAction(Request $request, Game $game, ObjectManager $manager)
    {

        $user = $this->getUser();
        $user->removeFavGame($game);
        $manager->flush();

        return $this->render('Content/profile.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }


}