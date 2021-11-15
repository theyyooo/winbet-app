<?php
require_once '../src/Models/Facade/Auth.php';
?>

<header class="site-header">
    <div class="site-header__wrapper">
        <a href="/"><img class="brand" src="/assets/WINBET.svg"></a>
        <nav>
            <?php
            if (Auth::isLogged()) {
            ?>
                <div class="user-data">
                    <p class="firstname"> <?= $_SESSION['user_firstname'] ?></p>
                    <div class="balance"><?= $data['balance'] ?> €</div>
                </div>
                <ul class="nav__wrapper">
                    <li class="nav__item"><a class="bets" href="/user/dashboard"><img src="/assets/bets.svg"></a></li>
                    <li class="nav__item"><a class="deconnexion" href="/user/logout">Deconnexion</a></li>
                </ul>
            <?php
            } else {
            ?>
                <ul class="nav__wrapper">
                    <li class="nav__item"><a class="connexion" href="/user/login">Connexion</a></li>
                    <li class="nav__item"><a class="inscription" href="/user/signup">Inscription</a></li>
                </ul>
            <?php
            }

            ?>
        </nav>
    </div>
</header>

<style>
    .brand {
        padding-top: 1rem;
        padding-bottom: 1rem;
        margin-left: 10vw;
        height: 35px;
    }

    nav {
        display: flex;
    }

    .site-header {
        background-color: #313131;
    }

    .site-header__wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .nav__wrapper {
        display: flex;
        list-style-type: none;
    }

    .nav__item a {
        display: block;
    }

    .nav__toggle {
        display: none;
    }

    .connexion {
        background-color: #FBCD27;
        margin-right: 2rem;
        padding-top: 5px;
        padding-bottom: 5px;
        padding-right: 25px;
        padding-left: 25px;
        border-radius: 5px;
        text-decoration: none;
        color: black;
    }

    .inscription,
    .deconnexion {
        background-color: white;
        padding-top: 5px;
        padding-bottom: 5px;
        padding-right: 25px;
        padding-left: 25px;
        margin-right: 25vw;
        border-radius: 5px;
        text-decoration: none;
        color: black;
    }

    .balance {
        padding-top: 5px;
        padding-bottom: 5px;
        padding-right: 25px;
        color:#FBCD27;
        padding-left: 25px;
        background-color: #3E3E3E;
        border-radius: 3px;
    }

    .firstname {
        color: #fff;
        padding-top: 5px;
        padding-bottom: 5px;
        margin-right: 1rem;
    }

    .bets {
        margin-right: 25px;
    }
    .user-data{
        display: flex;
    }
</style>