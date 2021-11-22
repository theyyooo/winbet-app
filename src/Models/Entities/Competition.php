<?php

class Competition
{
    private $id;
    private $name;
	private $icon;

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

	public function getIcon(){
		return $this->icon;
	}

	public function setIcon($icon){
		$this->icon = $icon;
        return $this;
	}
}
