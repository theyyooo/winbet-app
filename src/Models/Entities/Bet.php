<?php

class Bet{

    private $id = 0;
    private $bet;
    private $odds;
    private $user_id;
    private $match_id;
    private $status;

    public function getId(){
        return $this->id;
    }

    public function getBet(){
        return strtoupper($this->bet);
    }

    public function getOdds(){
        return strtoupper($this->odds);
    }

    public function setOdds($odds){
        $this->Label = $odds;
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
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }
}

?>