<?php

class Bet{

    private $id = 0;
    private $bet;
    private $odds;
    private $user_id;
    private $match_id;
    private $odds_id;
    private $bet_status;

    public function getId(){
        return $this->id;
    }

    public function getBet(){
        return $this->bet;
    }

    public function getOdds(){
        return strtoupper($this->odds);
    }

    public function setOdds($odds){
        $this->odds = $odds;
    }

    public function getOddsId(){
        return $this->odds_id;
    }

    public function setOddsId($odds_id){
        $this->odds_id = $odds_id;
    }

    public function setBet($bet){
        $this->bet = $bet;
    }

    public function getUserId(){
        return $this->user_id;
    }

    public function setUserId($user_id){
        $this->user_id = $user_id;
    }
    
    public function getMatchId(){
        return $this->match_id;
    }

    public function setMatchId($match_id){
        $this->match_id = $match_id;
    }

    public function getStatus(){
        return $this->bet_status;
    }

    public function setStatus($status){
        $this->bet_status = $status;
    }
}

?>