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

        $match = new Maatch(); // A remplir
        $bet = new Bet();      // A remplir
        $balance = $DAOUser->findUserBalance($_SESSION['user_id']);
        $balance = $balance - $bet->getBet();
        $FindingMatch = $DAOMatch->findMatchByApiId($match->getId());
        if(!$FindingMatch){
            $DAOMatch->saveMatch($match);
        }
        $DAOBet->saveBet($bet);
        $DAOUser->updateUserBalance($_SESSION['user_id'], $balance);

        header('Location: /');
    }
}