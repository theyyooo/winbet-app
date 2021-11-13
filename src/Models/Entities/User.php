<?php

class User{

    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $balance;

    public function getId(){
        return $this->id;
    }

    public function getFirstname(){
        return ucfirst($this->firstname);
    }

    public function getLastname(){
        return ucfirst($this->lastname);
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getBalance(){
        return $this->balance;
    }


    
    public function setId($id){
        $this->id = $id;
    }

    public function setFirstName($firstname){
        $this->firstname = $firstname;
    }

    public function setLastName($lastname){
        $this->lastname = $lastname;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setPassword($password){
        $this->password = hash('sha512', $password);
    }

    public function setBalance($balance){
        $this->balance = $balance;
    }
    
}