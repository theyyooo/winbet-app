<?php require_once "header.php"; ?>

<div class="sport-contain">

    <?php require_once("displaySportsList.php") ?>

    <div class="sport-container">

        <?php
        if ($_GET['response'] == 1) { ?>
            <span id="bad" class="bad">Solde Insuffisant</span> <?php
                                                    } else if ($_GET['response'] == 2) { ?>
            <span id="success" class="success">Pari enregistré</span> <?php
                                                                    } ?>

        <?php include_once("displayCompetition.php") ?>

        <?php if (isset($data["sportLibelle"])) { ?>
            <div class="sport-header">
                <h1 class="nextMatchDe">Prochains matchs de <?= strtolower($data["sportLibelle"]) ?></h1>
            </div>
        <?php } ?>

        <div class="sport-matchs">
            <?php
            foreach ($data['results'] as $match) {
            ?>
                <div class="sport-matchs-card">
                    <div class="nameCompet">
                        <div class=""><?= ($match->getCompetition())->getName() ?></div>
                    </div>
                    <div class="divTeamsName">
                        <div class="team-background" style="background-image: url('<?= ($match->getHomeTeam())->getCrestUrl() ?>'),  url('<?= str_replace("svg", "png", ($match->getHomeTeam())->getCrestUrl()) ?>');"></div>
                        <div class="team-background" style="background-image: url('<?= ($match->getAwayTeam())->getCrestUrl() ?>'),  url('<?= str_replace("svg", "png", ($match->getAwayTeam())->getCrestUrl()) ?> ');"></div>
                    </div>
                    <div class="divInfoMatch">
                        <div class="divDisplayNameteams"><?= ($match->getHomeTeam())->getName() ?> - <?= ($match->getAwayTeam())->getName() ?></div>
                        <div>
                            <?php if (date("Y-m-d") === substr($match->getDate(), 0, 10)) {
                                echo "Aujourd'hui";
                            } else if (date("Y-m-d", strtotime(date("Y-m-d") . ' + 1 days')) === substr($match->getDate(), 0, 10)) {
                                echo "Demain";
                            } else {
                                echo substr($match->getDate(), 0, 10);
                            }
                            ?> - <?= substr($match->getDate(), 11, 5) ?></div>
                        <div class="sport-matchs-odds">
                            <div class="divButton">
                                <div class="divButtonLibelleResultat"><?= ($match->getHomeTeam())->getName() ?></div>
                                <div class="btnBetMatch"><button onclick='getInfoBet("<?= ($match->getHomeTeam())->getName() ?>", "<?= ($match->getAwayTeam())->getName() ?>", "<?= ($match->getOdds())->getHomeWin() ?>", 1, <?= $match->getId() ?>)' class="betButton"><?= ($match->getOdds())->getHomeWin() ?></button></div>
                            </div>
                            <div class="divButton">
                                <div class="divButtonLibelleResultat">MATCH NUL</div>
                                <div class="btnBetMatch"><button onclick='getInfoBet("<?= ($match->getHomeTeam())->getName() ?>", "<?= ($match->getAwayTeam())->getName() ?> ", "<?= ($match->getOdds())->getDraw() ?>", 2, <?= $match->getId() ?>)' class="betButton"><?= ($match->getOdds())->getDraw() ?></button></div>
                            </div>
                            <div class="divButton">
                                <div class="divButtonLibelleResultat"><?= ($match->getAwayTeam())->getName() ?></div>
                                <div class="btnBetMatch"><button onclick='getInfoBet("<?= ($match->getHomeTeam())->getName() ?>", "<?= ($match->getAwayTeam())->getName() ?>", "<?= ($match->getOdds())->getAwayWin() ?>", 3, <?= $match->getId() ?>)' class="betButton"><?= ($match->getOdds())->getAwayWin() ?></button></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            if ($data["sportLibelle"] != "FOOTBALL" && !is_null($data["sportLibelle"])) {
                echo "<div>Aucun match de " . strtolower($data["sportLibelle"]) . " n'est disponible pour le moment</div>";
            }
            if (isset($error)) {
                echo "<div>Aucun match n'est disponible pour le moment</div>";
            }
            ?>
        </div>
    </div>
</div>