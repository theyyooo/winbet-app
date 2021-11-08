<?php

class Sport{

    private $Sport_Id = 0;
    private $Label;
    private $Img;

    public function getSport_Id(){
        return $this->Sport_Id;
    }

    public function getLabel(){
        return strtoupper($this->Label);
    }

    public function getImg(){
        return strtoupper($this->Img);
    }

    public function setLabel($Label){
        $this->Label = $Label;
    }

    public function setImg($Img){
        $this->Img = $Img;
    }
    
}

?>