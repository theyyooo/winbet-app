<?php
class Team{
    private $id;
    private $name;
    private $crestUrl;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
        return $this;
    }

    public function getCrestUrl(){
        return $this->crestUrl;
    }

    public function setCrestUrl($crestUrl){
        $this->crestUrl = $crestUrl;
        return $this;
    }
}