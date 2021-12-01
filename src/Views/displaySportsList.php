<div class="sports-list">
    <div class="sports-card">
        <div class="sports-card-header">
            <b>Liste des sports</b>
        </div>
        <?php
        foreach ($data['sports'] as $value) {
            if ($data['sportLibelle'] === $value->label) {
        ?>
                <div class="divSport" style="background-color:#FBCD27;padding-left:20px;">
                    <img height="20px" class="imgSport" style="margin:0" src="<?= $value->img ?>">
                    <a class="linkSport" href="/sport/<?= $value->label ?>"><span><?= $value->label ?></span></a>
                </div>
            <?php
            } else {
            ?>
                <div class="divSport" style="padding-left:20px;">
                    <img height="20px" class="imgSport" src="<?= $value->img ?>">
                    <a class="linkSport" href="/sport/<?= $value->label ?>"><span><?= $value->label ?></span></a>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <div class="cart-card">
        <h3 style="text-align: center;padding-top:20px">Panier</h3>
        <div id="containNoMatch" style="height: 70%; border-left:grey 3px solid;margin:40px;border-right:grey 3px solid;margin:40px">
            <div style="height: 100%;justify-content:center;flex-direction:column;align-self:center;">
                <p id="addBet" style="flex-direction: column;display: flex;justify-content: center;align-self: center;height: 100%;text-align: center;">Aucun Pari séléctionné</p>
            </div>
        </div>
        <form method="post" action="/bet" id="containMatch" hidden="true" style="height:70%; border-left:grey 3px solid;margin:40px;border-right:grey 3px solid;margin:40px">
            <div style="height: 90%;justify-content:center;flex-direction:column;align-self:center;">
                <div id="addBet" style=" height: 20%;display: flex;justify-content: center;font-size:0.8em;align-items: center;">
                    <p id="displayHomeTeam"></p>
                    -
                    <p id="displayAwayTeam"></p>
                </div>
                <div style="height: 10%; display:flex">
                    <p style="width: 80%;text-align: center;font-size:0.7em">Résultat du match</p>
                    <p style="width: 20%;text-align: center;font-size:0.7em">Cote</p>
                </div>
                <div style="height: 20%; display:flex">
                    <p style="width: 80%;text-align: center;font-weight: bold;" id="displayBetSelected"></p>
                    <p style="width: 20%;text-align: center;font-weight: bold;" id="displayBet"></p>
                </div>
                <div style="height: 20%; display:flex; align-items: center;">
                    <p style="width: 40%;text-align: center;">Votre mise: </p>
                    <input style="width: 20%;" name="bet" value=10 type="number" id="betPrice" onchange="calculGain(value)" min="1">
                </div>
                <div style="height: 20%; display:flex;align-items: center; justify-content:center">
                    <p style="width: 60%;text-align: center">Gains potentiel: </p>
                    <p style="width: 20%; text-align:center" id="gain"></p>
                    <p style="text-align:center">€</p>
                </div>
            </div>
            <input  type="HIDDEN" id="match" name="match_id">
            <input  type="HIDDEN" id="odds" name="odds_id">
            <button type="submit" id="bet" style="width:50%;text-align: center; background-color:#FBCD27; padding:10px 15px;margin-left:25%;border-radius: 5px;text-decoration: none;color: black;border: #FBCD27 solid 1px;">Parier</button>
        </form>
    </div>
</div>