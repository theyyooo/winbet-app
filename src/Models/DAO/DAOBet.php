<?php
require_once '../src/Models/Entities/Sport.php';
require_once '../src/Models/Singleton.php';

class DAOBet
{

    private $cnx;

    function __construct($cnx)
    {
        $this->cnx = $cnx;
    }

    /**
     * Récupère tous les paris de l'utilisateur
     * @return Array
     */
    public function findUserBets($id): array
    {
        $bets = [];
        $SQL = "SELECT * FROM bets B, matchs M where B.match_id = M.id and B.user_id = :id";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("id", $id);
        $preparedStatement->execute();
        while ($bet = $preparedStatement->fetch()) {
            $bets[] = $bet;
        }
        return $bets;
    }

    public function saveBet($bet){
        $SQL = "INSERT INTO bets ( bet, odds, user_id, match_id, odds_id, bet_status) VALUES (:bet, :odds, :user_id, :match_id, :odds_id, :bet_status)";
        $preparedStatement = $this->cnx->prepare($SQL);
        $preparedStatement->bindValue("bet", $bet->getBet());
        $preparedStatement->bindValue("odds", $bet->getOdds());
        $preparedStatement->bindValue("user_id", $bet->getUserId());
        $preparedStatement->bindValue("match_id", $bet->getMatchId());
        $preparedStatement->bindValue("odds_id", $bet->getOddsId());
        $preparedStatement->bindValue("bet_status", 0);
        $preparedStatement->execute();
    }

}