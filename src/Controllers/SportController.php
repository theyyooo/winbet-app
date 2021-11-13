<?php

require_once '../src/Renderer.php';
require_once '../src/Models/DAO/DAOSport.php';

class SportController
{

    public static function display()
    {
        $DAOSport = new DAOSport(Singleton::getInstance()->cnx);
        $sports = $DAOSport->findAll();
        $data = compact('sports');
        echo Renderer::render('sports.php', $data);
    }

    public function notFound()
    {
        echo Renderer::render('notFound.php');
    }
}