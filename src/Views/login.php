<?php require_once "header.php"; ?>
<div class="user-form">
    <form action="/user/login" method="post">
        <h1>Connexion</h1>
        <div>
            <label>Adresse mail :</label>
            <input name='email' required type="text">
        </div>
        <div>
            <label>Mot de passe :</label>
            <input name='password' required type="password">
        </div>
        <Button type="submit" class="btn-form" type="submit">Connexion</Button>
        <span>Pas encore inscrit ? <a href="/user/signup">Inscrivez-vous !</a></span>
    </form>
</div>