<?php

namespace App\Controller;

use App\Entity\Game;
use App\Repository\GameRepository;
use App\Repository\UserRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GameController extends Controller
{
    /**
     * @Route("/game/{game_slug}", name="game_name")
     * @param GameRepository $gameRepository
     * @param $game_slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function gameSheet(GameRepository $gameRepository, $game_slug, UserRepository $userRepository)
    {
        $user = $userRepository->findAll();
        $game = $gameRepository->findOneBy(array('slug' => $game_slug));

        if (!$game instanceof Game) {
            throw $this->createNotFoundException('');
        }

        return $this->render('Content/game.html.twig', [
            'game' => $game,
            'user' => $user
        ]);
    }
}
