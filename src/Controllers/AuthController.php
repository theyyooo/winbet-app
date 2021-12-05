<?php

require_once '../src/Renderer.php';
require_once '../src/Models/Facade/Auth.php';
require_once '../src/Models/Entities/User.php';
require_once '../src/Models/DAO/DAOUser.php';
require_once '../src/Models/DAO/DAOBet.php';

class AuthController
{

    public static function displayLogin()
    {
        if (Auth::isLogged()) {
            header('Location: /');
        }
        echo Renderer::render('/login.php');
    }

    public static function displaySignup()
    {
        if (Auth::isLogged()) {
            header('Location: /');
        }
        echo Renderer::render('/signup.php');
    }

    public function displayBets()
    {
        if (!Auth::isLogged()) {
            header('Location: /');
        }
        $DAOUser = new DAOUser(Singleton::getInstance()->cnx);
        $DAOBet = new DAOBet(Singleton::getInstance()->cnx);
        $balance = $DAOUser->findUserBalance($_SESSION['user_id']);
        $bets = $DAOBet->findUserBets($_SESSION['user_id']);
        $data = compact('balance', 'bets');
        echo Renderer::render('/bets.php', $data);
    }

    public static function actionLogin()
    {
        if (Auth::isLogged()) {
            header('Location: /');
        }
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password = hash('sha512', $password);
        Auth::logUser($email, $password);
    }

    public static function actionSignup()
    {
        if (Auth::isLogged()) {
            header('Location: /');
        }
        $user = new User();
        $user->setFirstname(htmlspecialchars($_POST['firstname']));
        $user->setLastname(htmlspecialchars($_POST['lastname']));
        $user->setEmail(htmlspecialchars($_POST['email']));
        $user->setPassword(htmlspecialchars($_POST['password']));
        $user->setBalance(200);
        Auth::addUser($user);
        header('Location: /user/login');
    }

    public function actionLogout()
    {
        Auth::logout();
        header('Location: /');
    }

}