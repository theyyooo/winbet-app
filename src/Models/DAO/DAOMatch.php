<?php
require_once '../src/Models/Entities/Match.php';
require_once '../src/Models/Singleton.php';

class DAOMatch
{

    private $cnx;

    function __construct($cnx)
    {
        $this->cnx = $cnx;
    }

    public function saveMatch($match)
    {
        $SQL = "INSERT INTO matchs (id, home_team_score, visitor_team_score, home_team_label, visitor_team_label, status) VALUES (:id, :home_team_score, :visitor_team_score, :home_team_label, :visitor_team_label, :status)";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("id", $match->getId());
        $preparedStatement->bindValue("home_team_score", 0);
        $preparedStatement->bindValue("visitor_team_score", 0);
        $preparedStatement->bindValue("home_team_label", $match->getHomeTeam());
        $preparedStatement->bindValue("visitor_team_label", $match->getAwayTeam());
        $preparedStatement->bindValue("status", 0);
        $preparedStatement->execute();
    }

    public function findMatchByApiId($id)
    {
        $SQL = "SELECT * FROM matchs WHERE id = :id";
        echo "SELECT * FROM matchs WHERE id = :id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("id", $id);
        $preparedStatement->execute();
        // $match = $preparedStatement->fetchObject("Maatch");     ICI tu mapp en Maatch, mais il ne comprend pas
        // return $match;
        foreach ($preparedStatement as $row) {
            print_r($row);
        }
        die;
    }
}
