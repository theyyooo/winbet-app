<?php

class Score
{
    private $winner;

    public function getWinner(){
		return $this->winner;
	}

	public function setWinner($winner){
		$this->winner = $winner;
        return $this;
	}
}
