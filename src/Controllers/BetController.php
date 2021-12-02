<?php

require_once '../src/Renderer.php';
require_once '../src/Models/DAO/DAOBet.php';
require_once '../src/Models/DAO/DAOUser.php';
require_once '../src/Models/DAO/DAOMatch.php';
require_once '../src/Models/Entities/Bet.php';

class BetController
{
    private static $token = "ad752d786e584657b7fdb9d7390e978d";

    public static function createBet(){
        if (!Auth::isLogged()) {
            header('Location: /user/login');
            die;
        }
        $DAOBet = new DAOBet(Singleton::getInstance()->cnx);
        $DAOUser = new DAOUser(Singleton::getInstance()->cnx);
        $DAOMatch = new DAOMatch(Singleton::getInstance()->cnx);

        $match_id = htmlspecialchars($_POST['match_id']);
        $odds_id = htmlspecialchars($_POST['odds_id']);
        $bet = htmlspecialchars($_POST['bet']);
        $api = new ApiFootball(self::$token);
        $exist = true;
                
        $FindingMatch = $DAOMatch->findMatchByApiId($match_id);
        if($FindingMatch == null){
            $exist = false;
        }
        $FindingMatch = $api->getMatchById($match_id, $odds_id);
        if(!$exist){
            $DAOMatch->saveMatch($FindingMatch);
        }
        $newbet = new Bet();
        $newbet->setBet($bet);
        $newbet->setOdds($FindingMatch->getOdds());
        $newbet->setUserId($_SESSION['user_id']);
        $newbet->setMatchId($match_id);
        $balance = $DAOUser->findUserBalance($_SESSION['user_id']);
        $response = '';
        if($bet > $balance){
                $response = 1;
        } else {
            $balance = $balance - $bet;
            $DAOBet->saveBet($newbet);
            $DAOUser->updateUserBalance($_SESSION['user_id'], $balance);
            $response = 2;
        }
        if($response == ''){
            header('Location: /');
        }
        header('location:/index.php?response='.$response);
    }
}