<?php
require_once '../src/Models/Facade/Auth.php';
?>

<header class="site-header">
    <div class="site-header-wrapper">
        <a href="/"><img class="brand" src="/assets/WINBET.svg"></a>
        <nav>
            <?php
            if (Auth::isLogged()) {
            ?>
                <div class="user-data">
                    <p class="firstname"> <?= $_SESSION['user_firstname'] ?></p>
                    <div class="balance"><?= $data['balance'] ?> €</div>
                </div>
                <ul class="nav-wrapper">
                    <li class="nav-item"><a class="bets-icon" href="/user/bets"><img src="/assets/bets.svg"></a></li>
                    <li class="nav-item"><a class="deconnexion" href="/user/logout">Deconnexion</a></li>
                </ul>
            <?php
            } else {
            ?>
                <ul class="nav-wrapper">
                    <li class="nav-item"><a class="connexion" href="/user/login">Connexion</a></li>
                    <li class="nav-item"><a class="inscription" href="/user/signup">Inscription</a></li>
                </ul>
            <?php
            }
            ?>
        </nav>
    </div>
</header>