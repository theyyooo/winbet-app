<?php

class Odds{

private $homeWin;
private $draw;
private $awayWin;

public function getHomeWin(){
    return $this->homeWin;
}

public function setHomeWin($homeWin){
    $this->homeWin = $homeWin;
    return $this;
}

public function getDraw(){
    return $this->draw;
}

public function setDraw($draw){
    $this->draw = $draw;
    return $this;
}

public function getAwayWin(){
    return $this->awayWin;
}

public function setAwayWin($awayWin){
    $this->awayWin = $awayWin;
    return $this;
}

}