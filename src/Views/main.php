<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color: #f5f6f8; margin:0">
    
    <?php require_once "header.php";

    if (isset($error)) {
        echo "<div style='background-color:red; width:50%;margin-left:25%;text-align:center;margin-top:15px;padding-top:5px;padding-bottom:5px; border-radius: 10px;'>" . $error . "</div>";
    }

    ?>


    <div style="width: 80%; height:100vh; display:flex; margin:auto; margin-top:20px">
        <div style="width:20%; height:100%">
            <div style="background-color: #fff;border-radius: 5px; box-shadow: rgb(211 211 211 / 20%) 0px 2px 8px 0px; padding:10px">
                <div style="text-align: center; margin-bottom: 25px;">
                    <b>Liste des sports</b>
                </div>

                <?php
                foreach ($data['sports'] as $value) {
                    echo '<div class="divSport">
                                <img height="20px" class="imgSport" src="' . $value->img . '">';
                    echo '<a class="linkSport" href="/sport/show/' . $value->label . '"><span>' . $value->label . '</span></a>
                    </div>';
                }
                ?>

            </div>
        </div>
        <div style="width: 80%; height:100%; padding-left:20px">
            <div style="width: 100%; background-color:#fff; border-radius:5px; box-shadow: rgb(211 211 211 / 20%) 0px 2px 8px 0px; padding:10px">
                <h1 style="font-size: 15px;">Prochains matchs</h1>
            </div>
            <div style="width: 100%; display:flex;flex-wrap: wrap; margin-top:20px;text-align:center;justify-content:center">
                <?php
                foreach ($data['results'] as $match) {
                ?>
                    <div style="width: 40%; height:300px; background-color:white;border-radius:8px; margin-right:20px;margin-left:20px;margin-top:10px;margin-bottom:10px;">
                        <div style="height: 10%;color:grey; display:flex ; justify-content:center; margin-top:10px;"><div style="background-position:center;background-size:contain;background-repeat: no-repeat; width:50px;background-image: url('<?= ($match->getCompetition())->getIcon() ?>')"></div><div style="line-height:2em"><?=($match->getCompetition())->getName()?></div></div>
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
        border-bottom: #FBCD27 solid 1px;
        text-align: center;
        font-size: 20px;
    }

    .linkSport {
        text-decoration: none;
        color: black;
    }

    .divSport {
        display: flex;
        align-items: center;
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
    }
</style>