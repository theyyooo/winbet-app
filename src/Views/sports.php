<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color: #f5f6f8;">

    <?php require_once "header.php"; ?>

    <div style="width: 80%; height:100vh; display:flex; margin:auto; margin-top:20px">
        <div style="width:20%; height:100%">
            <div style="background-color: #fff;border-radius: 5px; box-shadow: rgb(211 211 211 / 20%) 0px 2px 8px 0px; padding:10px">
                <div style="text-align: center; margin-bottom: 25px;">
                    <b>Liste des sports</b>
                </div>
                
                <?php
                    foreach ($data['sports'] as $value) {  
                        echo '<div class="divSport"><img height="20px" class="imgSport" src="'.$value->img.'">';
                        echo '<a class="linkSport" href="/'. $value->label . '"><span>'. $value->label . '</span></a></div>';
                    }
                ?>

            </div>
        </div>
        <div style="width: 80%; height:100%; padding-left:20px">
            <div style="width: 100%; background-color:#fff; border-radius:5px; box-shadow: rgb(211 211 211 / 20%) 0px 2px 8px 0px; padding:10px">
                <h1 style="font-size: 15px;">Matchs Live</h1>
            </div>
        </div>
    </div>
</body>

</html>

<style>
    * {
        margin: 0;
    }

    span {
        display: block;
        padding: 15px;
        border-bottom : #FBCD27 solid 1px;
        text-align: center;
        font-size: 20px;
    }

    .linkSport{
        text-decoration: none;
        color: black;
    }
    .divSport{
        display: flex;
        vertical-align: auto;
    }
</style>