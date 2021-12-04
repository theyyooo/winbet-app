<div class="sports-list">
    <div class="sports-card">
        <div class="sports-card-header">
            <b>Liste des sports</b>
        </div>
        <a href="/<?= $value->label ?>" class=<?= isset($data['sportLibelle']) ? 'sport-link' : 'sport-link-current' ?>>
            <span class="linkSport">TOUS LES SPORTS</span>
        </a>
        <?php foreach ($data['sports'] as $value) { ?>
            <a href="/sport/<?= $value->label ?>" class=<?= $data['sportLibelle'] == $value->label ? 'sport-link-current' : 'sport-link' ?>>
                <img height="20px" class="imgSport" src="<?= $value->img ?>">
                <span class="linkSport"><?= $value->label ?></span>
            </a>
        <?php } ?>
    </div>
    <div class="cart-card">
        <h3 style="text-align: center;padding-top:20px">Panier</h3>
       
        <div id="containNoMatch" style="height: 70%;border-left:grey 3px solid;margin:40px;border-right:grey 3px solid;margin:40px">
            <div style="height: 100%;justify-content:center;flex-direction:column;align-self:center;">
                <p id="addBet" style="flex-direction: column;display: flex;justify-content: center;align-self: center;height: 100%;text-align: center;">Aucun Pari séléctionné</p>
            </div>
        </div>
        <form method="post" action="/bet" id="containMatch" hidden="true" style="height:70%;border-top:grey 3px solid; border-left:grey 3px solid;margin:40px;border-right:grey 3px solid;margin:40px">
            <div style="height: 90%;justify-content:center;flex-direction:column;align-self:center;">
                <div id="addBet" style="border-bottom: grey solid 3px; height: 20%;display: flex;justify-content: center;font-size:0.8em;align-items: center;">
                    <p id="displayHomeTeam"></p>
                    -
                    <p id="displayAwayTeam"></p>
                </div>
                <div style="height: 20%; display:flex;align-items: center; justify-content:center">
                    <p style="width: 70%;text-align: center;font-size:0.7em">Résultat du match</p>
                    <p style="width: 30%;text-align: center;font-size:0.7em">Cote</p>
                </div>
                <div style="height: 20%; display:flex;align-items: center; justify-content:center">
                    <p style="width: 70%;text-align: center;font-weight: bold;" id="displayBetSelected"></p>
                    <p style="width: 30%;text-align: center;font-weight: bold;" id="displayBet"></p>
                </div>
                <div style="height: 20%; display:flex; align-items: center;">
                    <p style="width: 50%;text-align: center;font-size:0.7em;padding:10%">Votre mise: </p>
                    <input style="width: 30%;margin-right:15%" name="bet" type="number" id="betPrice" onchange="calculGain(value)" min="1">
                </div>
                <div style="height: 20%; display:flex;align-items: center; justify-content:center">
                    <p style="width: 60%;text-align: center">Gains potentiel: </p>
                    <p style="width: 40%; text-align:center" id="gain"></p>
                    <p style="text-align:center">€</p>
                </div>
            </div>
            <input type="hidden" id="match" name="match_id">
            <input type="hidden" id="odds" name="odds_id">
            <button class="btn-cart" type="submit" id="bet">Parier</button>
        </form>
    </div>
</div>