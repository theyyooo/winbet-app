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
                            <?= $bet['home_team_label'] ?> <?= $bet['home_team_score'] ?> - <?= $bet['visitor_team_score'] ?> <?= $bet['visitor_team_label'] ?>
                        </div>
                        <div class="bet-odds">
                            <?= $bet['odds'] ?>
                        </div>
                        <div style="line-height: 2.5em;">
                            Résultat: En attente
                        </div>
                        <div style="line-height: 2.5em;">
                            Mise: <?= $bet['bet'] ?>€
                        </div>
                        <div style="line-height: 2.5em;">
                            Gain potentiel: <?= $bet['odds'] * $bet['bet'] ?>€
                        </div>
                        <div class="bet-status">
                            <?php
                            if ($bet['status'] == 0) {
                                echo 'En attente';
                            } else if ($bet['status'] == 1) {
                                echo 'Perdu';
                            } else if ($bet['status'] == 2) {
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