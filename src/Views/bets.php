    <?php require_once "header.php"; ?>

    <div class="bets-contain">
        <div class="bets-container">
            <div class="backBets-header">
                <a class="back-header" href="/">
                    <div >
                        <img class="back-title" width="20px" src="https://image.flaticon.com/icons/png/512/93/93634.png">
                    </div>
                </a>
                <div class="bets-header">
                    <h1 class="bets-title">Mes paris</h1>
                </div>
            </div>
            <div class="historyBet">
                <?php foreach ($data['bets'] as $bet) { ?>
                    <div class="bet-card">
                        <div class="bet-teams">
                            <span <?php if($bet['odds_id'] == 1 || $bet['odds_id'] == 2 ){ ?> class="betspan-bet" <?php } else { ?> class="betspan" <?php } ?> > <?= $bet['home_team_label'] ?></span> <span class='betspan'><?= $bet['home_team_score'] ?> - <?= $bet['visitor_team_score'] ?></span> <span <?php if($bet['odds_id'] == 3 || $bet['odds_id'] == 2 ){ ?> class="betspan-bet" <?php } else { ?> class="betspan" <?php } ?> ><?= $bet['visitor_team_label'] ?></span>
                        </div>
                        <div class="bet-odds">
                            <?= $bet['odds'] ?>
                        </div>
                        <div style="line-height: 2.5em;">
                            Résultat: <?php if($bet['bet_status'] == 0){ echo 'En attente';} else if($bet['bet_status'] == 1){ echo 'Victoire de '.$bet['home_team_label']; } else if($bet['bet_status'] == 2){ echo 'Match nul';} else if($bet['bet_status'] == 3){ echo 'Victoire de '.$bet['visitor_team_label']; } ?>
                        </div>
                        <div style="line-height: 2.5em;">
                            Mise: <?= $bet['bet'] ?>€
                        </div>
                        <div style="line-height: 2.5em;">
                            Gain potentiel: <?= $bet['odds'] * $bet['bet'] ?>€
                        </div>
                        <div <?php if($bet['bet_status'] == 0){ ?> class="bet-status" <?php } else if($bet['bet_status'] == 1){ ?> class="bet-status-bad" <?php } else if($bet['bet_status'] == 2){ ?> class="bet-status-good" <?php } ?> >
                            <?php
                            if ($bet['bet_status'] == 0) {
                                echo 'En attente';
                            } else if ($bet['bet_status'] == 1) {
                                echo 'Perdu';
                            } else if ($bet['bet_status'] == 2) {
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