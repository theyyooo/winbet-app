<?php

class User{

    private $User_Id;
    private $Firstname;
    private $Lastname;
    private $Email;
    private $Password;
    private $Balance;

    public function getUser_Id(){
        return $this->User_Id;
    }

    public function getFirstname(){
        return ucfirst($this->Firstname);
    }

    public function getLastname(){
        return ucfirst($this->Lastname);
    }

    public function getEmail(){
        return $this->Email;
    }

    public function getPassword(){
        return $this->Password;
    }

    public function getBalance(){
        return $this->Balance;
    }


    
    public function setUser_Id($User_Id){
        $this->User_Id = $User_Id;
    }

    public function setFirstName($Firstname){
        $this->Firstname = $Firstname;
    }

    public function setLastName($Lastname){
        $this->Lastname = $Lastname;
    }

    public function setEmail($Email){
        $this->Email = $Email;
    }

    public function setPassword($Password){
        $this->Password = hash('sha512', $Password);
    }

    public function setBalance($Balance){
        $this->Balance = $Balance;
    }
    
}