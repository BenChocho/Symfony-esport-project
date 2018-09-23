<?php

namespace App\Controller;

use App\Entity\Team;
use App\Repository\TeamRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TeamController extends Controller
{
    /**
     * @Route("/team/{team_slug}", name="team_name")
     */
    public function teamSheet(TeamRepository $teamRepository, $team_slug)
    {
        $team = $teamRepository->findOneBy(array('slug' => $team_slug));

        if (!$team instanceof Team) {
            throw $this->createNotFoundException('');
        }

        return $this->render('Content/team.html.twig', [
            'team' => $team,
        ]);
    }
}
