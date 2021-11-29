<?php require_once "header.php"; ?>
<div class="user-form">
    <form action="/user/signup" method="post">
        <h1>Inscription</h1>
        <div>
            <label>Prénom :</label>
            <input name='firstname' required type="text">
        </div>
        <div>
            <label>Nom :</label>
            <input name='lastname' required type="text">
        </div>
        <div>
            <label>Adresse mail :</label>
            <input name='email' required type="text">
        </div>
        <div>
            <label>Mot de passe :</label>
            <input name='password' required type="password">
        </div>
        <Button type="submit" class="btn-form" type="submit">Inscription</Button>
        <span>Déjà inscrit ? <a href="/user/login">Connectez-vous !</a></span>
    </form>
</div>