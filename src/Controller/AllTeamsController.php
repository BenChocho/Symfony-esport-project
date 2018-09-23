<?php

namespace App\Controller;

use App\Repository\TeamRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AllTeamsController extends Controller
{
    /**
     * @Route("/all-teams", name="all-teams")
     */
    public function allTeams(TeamRepository $teamRepository)
    {
        $team = $teamRepository->findAll();

        return $this->render('Content/allTeams.html.twig', [
            'controller_name' => 'AllTeamsController',
            'teams' => $team
        ]);
    }
}
