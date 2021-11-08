<?php
require_once '../src/Models/Entities/Sport.php';
require_once '../src/Models/Singleton.php';

class DAOSport
{

    private $cnx;

    function __construct($cnx)
    {
        $this->cnx = $cnx;
    }

    /**
     * Récupère toutes les infos de tous les sports
     * @return Array
     */
    public function findAll(): array
    {
        $cities = [];
        $SQL = "SELECT * FROM sports";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->execute();
        while ($sport = $preparedStatement->fetchObject("Sport")) {
            $sports[] = $sport;
        }
        return $sports;
    }

}