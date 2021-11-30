<?php

require_once '../src/Renderer.php';
require_once '../src/Models/DAO/DAOBet.php';
require_once '../src/Models/DAO/DAOUser.php';
require_once '../src/Models/DAO/DAOMatch.php';

class BetController
{
    public static function createBet(){
        if (!Auth::isLogged()) {
            header('Location: /user/login');
        }
        $DAOBet = new DAOBet(Singleton::getInstance()->cnx);
        $DAOUser = new DAOUser(Singleton::getInstance()->cnx);
        $DAOMatch = new DAOMatch(Singleton::getInstance()->cnx);

        $match_id = htmlspecialchars($_POST['match_id']);
        $odds_id = htmlspecialchars($_POST['odds_id']);
        $bet = htmlspecialchars($_POST['bet']);

        
        
        $FindingMatch = $DAOMatch->findMatchByApiId($match_id);
        if(!$FindingMatch){
            $FindingMatch = new Maatch();
            //fetch match

            $DAOMatch->saveMatch($FindingMatch);
        }
        $bet = new Bet();      // A remplir
        // $bet->setBet($bet);
        $balance = $DAOUser->findUserBalance($_SESSION['user_id']);
        $balance = $balance - $bet->getBet();
        $DAOBet->saveBet($bet);
        $DAOUser->updateUserBalance($_SESSION['user_id'], $balance);

        header('Location: /');
    }
}