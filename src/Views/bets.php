<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes paries | WinBet</title>
</head>

<body style="background-color: #f5f6f8; margin:0">

    <?php require_once "header.php"; ?>

    <div style="width: 80%; height:100vh; display:flex; margin:auto; margin-top:20px">
        <div style="width: 100%; height:100%;">
            <div style="width: 100%; background-color:#fff; border-radius:5px; box-shadow: rgb(211 211 211 / 20%) 0px 2px 8px 0px;">
                <h1 style="font-size: 15px; padding:15px;">Mes paris</h1>
            </div>
            <div style="width: 100%; margin-top:20px;">
                <?php
                // var_dump($data);
                    foreach ($data['bets'] as $bet) {
                ?>
                <div style="background-color: #fff; display:flex; padding:10px; justify-content:space-between; margin-bottom:10px; border-radius:3px;">
                    <div style="line-height: 2.5em; text-align:center; padding-left:25px;">
                        <?=$bet['home_team_label']?> <?=$bet['home_team_score']?> - <?=$bet['visitor_team_score']?> <?=$bet['visitor_team_label']?>
                    </div>
                    <div style="background-color: #FBCD27; border-radius:3px; padding:10px 25px;">
                        <?=$bet['odds']?>
                    </div>
                    <div style="line-height: 2.5em;">
                        Résultat: En attente
                    </div>
                    <div style="line-height: 2.5em;">
                        Mise: <?=$bet['bet']?>€
                    </div>
                    <div style="line-height: 2.5em;">
                        Gain potentiel: <?=$bet['odds']*$bet['bet']?>€
                    </div>
                    <div style="background-color: #bbb; border-radius:3px; padding:10px 35px;">
                        <?php
                            if($bet['status'] == 0){
                                echo 'En attente';
                            } else if($bet['status'] == 1){
                                echo 'Perdu';
                            } else if($bet['status'] == 2){
                                echo 'Gagné';
                            }
                        ?>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</body>

</html>

<style>
    span {
        display: block;
        padding: 15px;
        text-align: center;
        font-size: 12px;
    }

    .linkSport {
        text-decoration: none;
        color: black;
    }

    .divSport {
        display: flex;
        align-items: center;
        border-bottom: 1px solid #efefef;
    }

    .betButton {
        padding-top: 6px;
        padding-bottom: 6px;
        padding-left: 15px;
        padding-right: 15px;
        background-color: #FBCD27;
    }
</style>