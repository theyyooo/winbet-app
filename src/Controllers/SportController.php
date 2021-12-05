<?php

require_once '../src/Renderer.php';
require_once '../src/Models/Facade/Auth.php';
require_once '../src/Models/DAO/DAOSport.php';
require_once '../src/Models/DAO/DAOUser.php';
require_once '../src/Models/DAO/DAOApiFootball.php';

class SportController
{

    private static $token = "ad752d786e584657b7fdb9d7390e978d";

    public static function display($sportLibelle = null, $competition = null)
    {
        $DAOSport = new DAOSport(Singleton::getInstance()->cnx);
        $DAOUser = new DAOUser(Singleton::getInstance()->cnx);
        $sports = $DAOSport->findAll();
        $balance =  Auth::isLogged() ? $DAOUser->findUserBalance($_SESSION['user_id']) : 0;

        if ($sportLibelle === "FOOTBALL" || is_null($sportLibelle)) {
            $api = new ApiFootball(self::$token);
            if (!is_null($competition)) {
                $results = $api->getAllNextMatch($competition);
            } else {
                $results = $api->getAllNextMatch("");
            }
            if (is_null($results)) {
                $error = "Vous avez effectué trop de requêtes merci de patienter quelques instant";
                $data = compact('sports', 'error', 'balance', 'sportLibelle', 'competition');
            } else {
                $data = compact('sports', 'results', 'balance', 'sportLibelle', 'competition');
            }
        } else {
            $data = compact('sports', 'balance', 'sportLibelle', 'competition');
        }

        echo Renderer::render('main.php', $data);
    }

    public function notFound()
    {
        echo Renderer::render('notFound.php');
    }
}
