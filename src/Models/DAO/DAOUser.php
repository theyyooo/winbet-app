<?php
require_once '../src/Models/Entities/User.php';
require_once '../src/Models/Singleton.php';

class DAOUser
{

    private $cnx;

    function __construct($cnx)
    {
        $this->cnx = $cnx;
    }

    /**
     * Renvoie un user à partir de son id
     * @param String $id
     * @return User
     */
    public function find($id): User
    {
        $SQL = "SELECT * FROM users WHERE User_Id = :id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("id", $id);
        $preparedStatement->execute();
        $user = $preparedStatement->fetchObject("User");
        return $user;
    }

    /**
     * Renvoie un user à partir de son id
     * @param int $id
     * @return int
     */
    public function findUserBalance($id)
    {
        $SQL = "SELECT balance FROM users WHERE id = :id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("id", $id);
        $preparedStatement->execute();
        $result = $preparedStatement->fetchColumn();
        return $result;
    }

    /**
     * Insert un user avec l'ensemble de ses données
     * @param User $user
     * @return Void
     */
    public function save(User $user): void
    {
        $SQL = "INSERT INTO users (firstname, lastname, email, password, balance) VALUES (:firstname, :lastname, :email, :password, :balance)";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("firstname", $user->getFirstname());
        $preparedStatement->bindValue("lastname", $user->getLastname());
        $preparedStatement->bindValue("email", $user->getEmail());
        $preparedStatement->bindValue("password", $user->getPassword());
        $preparedStatement->bindValue("balance", $user->getBalance());
        $preparedStatement->execute();
    }

    /**
     * Récupère le user qui a ce login
     * @param String $email
     * @return User|bool
     */
    public function findByLogin(string $email)
    {
        $SQL = "SELECT * FROM users WHERE email = :email";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("email", $email);
        $preparedStatement->execute();
        $user = $preparedStatement->fetchObject("User");
        return $user;
    }

    public function updateUserBalance($id, $balance){
        $SQL = "UPDATE users SET balance = :balance WHERE id = :id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("balance", $balance);
        $preparedStatement->bindValue("id", $id);
        $preparedStatement->execute();
    }

}