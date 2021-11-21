<?php

include_once 'Team.php';
include_once 'Odds.php';

class Maatch{

    private $id;    
    private $status;
    private $homeTeam;
    private $awayTeam;
    private $competition;
    private $score;
    private $utcDate;
    private $odds;

    public function getId() {
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getHomeTeam() {
        return $this->homeTeam;
    }

    public function setHomeTeam($homeTeam){
        $this->homeTeam = $homeTeam;
        return $this;
    }

    public function getAwayTeam() {
        return $this->awayTeam;
    }

    public function setAwayTeam($awayTeam){
        $this->awayTeam = $awayTeam;
        return $this;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
        return $this;
    }

    public function getDate() {
        return $this->utcDate;
    }

    public function setDate($utcDate){
        $this->utcDate = $utcDate;
        return $this;
    }

    public function getCompetition(){
		return $this->competition;
	}

	public function setCompetition($competition){
		$this->competition = $competition;
        return $this;
	}

    public function getScore(){
		return $this->score;
	}

	public function setScore($score){
		$this->score = $score;
        return $this;
	}

    public function getOdds(){
		return $this->odds;
	}

	public function setOdds($odds){
		$this->odds = $odds;
        return $this;
	}
}

