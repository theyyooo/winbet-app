<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color: #f5f6f8; margin:0">

    <?php require_once "header.php";?>

    <div style="width: 100%; height:100vh; display:flex; margin:auto; margin-top:20px">
        <?php require_once("displaySportsList.php") ?>
        <div style="width: 70%; height:100%; padding-left:20px;margin-left:25%">
            <div style="width: 100%; background-color:#fff; border-radius:5px; box-shadow: rgb(211 211 211 / 20%) 0px 2px 8px 0px; padding:10px">
                <h1 style="font-size: 15px;">Prochains matchs</h1>
            </div>
            <div style="width: 100%; display:flex;flex-wrap: wrap; margin-top:20px;text-align:center;justify-content:center">
                <?php
                foreach ($data['results'] as $match) {
                ?>
                    <div style="width: 45%;padding-bottom:20px; height:300px; background-color:white;border-radius:8px; margin-right:20px;margin-left:20px;margin-top:10px;margin-bottom:10px;">
                        <div style="height: 10%;color:grey; margin-top:10px;">
                            <div style="line-height:2em"><?= ($match->getCompetition())->getName() ?></div>
                        </div>
                        <div style="height: 40%; display:flex">
                            <div style="background-position:center;margin: 15px;background-size:contain;background-repeat: no-repeat;width:50%;background-image: url('<?= ($match->getHomeTeam())->getCrestUrl() ?>');"></div>
                            <div style="background-position:center;margin: 15px;background-size:contain;background-repeat: no-repeat;width:50%;background-image: url('<?= ($match->getAwayTeam())->getCrestUrl() ?>');"></div>
                        </div>
                        <div style="height: 50%;">
                            <div style="height:20%"><?= ($match->getHomeTeam())->getName() ?> - <?= ($match->getAwayTeam())->getName() ?></div>
                            <div>
                                <?php if (date("Y-m-d") === substr($match->getDate(), 0, 10)) {
                                    echo "Aujourd'hui";
                                } else if (date("Y-m-d", strtotime(date("Y-m-d") . ' + 1 days')) === substr($match->getDate(), 0, 10)) {
                                    echo "Demain";
                                } else {
                                    echo substr($match->getDate(), 0, 10);
                                }
                                ?> - <?= substr($match->getDate(), 11, 5) ?></div>
                            <div style="height:65%;display: flex; margin-top:20px;font-size:10px;justify-content:space-between">
                                <div style="width:30% ;display:grid;">
                                    <div style="height: 50%;margin:auto"><?= ($match->getHomeTeam())->getName() ?></div>
                                    <div style="height: 50%"><button class="betButton"><?= ($match->getOdds())->getHomeWin() ?></button></div>
                                </div>
                                <div style="width:30% ;display:grid">
                                    <div style="height: 50%;margin:auto">MATCH NUL</div>
                                    <div style="height: 50%;"><button class="betButton"><?= ($match->getOdds())->getDraw() ?></button></div>
                                </div>
                                <div style="width:30% ;display:grid">
                                    <div style="height: 50%;margin:auto"><?= ($match->getAwayTeam())->getName() ?></div>
                                    <div style="height: 50%;"><button class="betButton"><?= ($match->getOdds())->getAwayWin() ?></button></div>
                                </div>
                            </div>
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
        background-color: #FBCD27;
        padding-top: 5px;
        padding-bottom: 5px;
        padding-right: 25px;
        padding-left: 25px;
        border-radius: 5px;
        text-decoration: none;
        color: black;
        border: #FBCD27 solid 1px;
        margin-bottom: 15px;
    }
</style>