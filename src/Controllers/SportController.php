<?php

require_once '../src/Renderer.php';
require_once '../src/Models/DAO/DAOSport.php';
require_once '../src/Models/DAO/DAOApiFootball.php';

class SportController
{

    public static function display()
    {
        $DAOSport = new DAOSport(Singleton::getInstance()->cnx);
        $sports = $DAOSport->findAll();

        $api = new ApiFootball("ad752d786e584657b7fdb9d7390e978d");
        $results = $api->getAllNextMatch();

        $data = compact('sports', 'results');
        var_dump($data);
        echo Renderer::render('sports.php', $data);
    }

    public function notFound()
    {
        echo Renderer::render('notFound.php');
    }
}