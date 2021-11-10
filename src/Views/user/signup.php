<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Inscription</h1>
    <div class="login-form">
        <form action="">
            <h1>Inscription</h1>
            <div>
                <label>Prénom :</label>
                <input required type="text">
            </div>
            <div>
                <label>Nom :</label>
                <input required type="text">
            </div>
            <div>
                <label>Adresse mail :</label>
                <input required type="text">
            </div>
            <label>Mot de passe :</label>
            <input required type="password">
            <Button type="submit" class="btn-form" type="submit">Connexion</Button>
            <span>Déjà inscrit ? <a href="/user/login">Connectez-vous !</a></span>
        </form>
    </div>
</body>

</html>

<style>
    *{
        margin:0;
        padding: 0;
    }
    h1{
        font-size:20px;
        margin-bottom: 10px;
        text-align: center;
    }
    body {
        background-color: #f5f6f8;
    }
    .login-form{
        width: 20%;
        background-color: #fff;
        padding: 20px;
        margin: auto;
        padding-bottom: 40px;
        margin-top: 25vh;
        border-radius: 5px;
        box-shadow: rgb(211 211 211 / 20%) 0px 2px 8px 0px
    }
    input{
        background-color: #F7F9FC;
        border: 1px solid #F0EEF6;
        border-radius: 5px;
        padding: 10px;
        display: block;
        margin-bottom: 15px;
        margin-top: 5px;
        width: 100%;
        outline: none;
    }
    .btn-form{
        background-color: #FBCD27;
        border: 1px solid #FBCD27;
        border-radius: 5px;
        display: block;
        width: 100%;
        height: 35px;
        cursor: pointer;
    }
    span{
        float: right;
        margin-top: 5px;
    }
    a{
        color:#FBCD27;
        text-decoration: none;
    }
    a:hover{
        text-decoration:underline
    }
</style>