<?php

require_once '../src/Renderer.php';
require_once '../src/Models/DAO/DAOSport.php';
require_once '../src/Models/DAO/DAOUser.php';
require_once '../src/Models/DAO/DAOApiFootball.php';

class SportController
{

    public static function display()
    {
        $DAOSport = new DAOSport(Singleton::getInstance()->cnx);
        $DAOUser = new DAOUser(Singleton::getInstance()->cnx);
        $sports = $DAOSport->findAll();
        $balance = $DAOUser->findUserBalance($_SESSION['user_id']);

        $api = new ApiFootball("ad752d786e584657b7fdb9d7390e978d");
        $results = $api->getAllNextMatch("");
        if (is_null($results)){
            $error = "Erreur lors du chargement de l'API FOOTBALL";
            $data = compact('sports', 'error', 'balance');
        }else{
            $data = compact('sports', 'results', 'balance');
        }  
        echo Renderer::render('sports.php', $data);
    }

    public function notFound()
    {
        echo Renderer::render('notFound.php');
    }
}