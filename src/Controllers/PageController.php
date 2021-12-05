<?php

require_once '../src/Renderer.php';

class PageController
{
    public function notFound()
    {
        echo Renderer::render('notFound.php');
    }
}