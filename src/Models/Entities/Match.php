<?php

class Maatch{

    private $id;    
    private $status;
    private $homeTeam;
    private $awayTeam;

    public function getId() {
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }
}

