<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="_match")
 * @ORM\Entity(repositoryClass="App\Repository\MatchRepository")
 */
class Match
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * One Product has One Shipment.
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumn(name="team_a_id", referencedColumnName="id")
     */
    protected $teamA;

    /**
     * One Product has One Shipment.
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumn(name="team_b_id", referencedColumnName="id")
     */
    protected $teamB;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $date;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $score;

    /**
     * Many match for a game
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="matches")
     * @ORM\JoinColumn(nullable=false, name="game", referencedColumnName="id")
     */
    protected $game;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTeamA()
    {
        return $this->teamA;
    }

    /**
     * @param mixed $teamA
     */
    public function setTeamA($teamA)
    {
        $this->teamA = $teamA;
    }

    /**
     * @return mixed
     */
    public function getTeamB()
    {
        return $this->teamB;
    }

    /**
     * @param mixed $teamB
     */
    public function setTeamB($teamB)
    {
        $this->teamB = $teamB;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param mixed $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return mixed
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * @param mixed $game
     */
    public function setGame($game)
    {
        $this->game = $game;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param mixed $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    public function __toString()
    {
        return $this->teamA . ' ' . $this->teamB . ' ' . $this->date->format('d-m-Y');
    }
}
