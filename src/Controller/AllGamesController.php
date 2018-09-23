<?php

namespace App\Controller;

use App\Repository\GameRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AllGamesController extends Controller
{
    /**
     * @Route("/all-games", name="all-games")
     */
    public function allGames(GameRepository $gameRepository)
    {
        $games = $gameRepository->findAll();

        return $this->render('Content/allGames.html.twig', [
            'controller_name' => 'AllGamesController',
            'games' => $games
        ]);
    }
}
