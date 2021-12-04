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
        <div style="padding-top:20px;text-align:center;padding-bottom:20px">
            <h3>Panier</h3>
        </div>
        <div id="containNoMatch" style="height: 70%;border-left:grey 3px solid;margin:40px;border-right:grey 3px solid;margin:40px">
            <div style="height: 100%;justify-content:center;flex-direction:column;align-self:center;">
                <p id="addBet" style="flex-direction: column;display: flex;justify-content: center;align-self: center;height: 100%;text-align: center;">Aucun Pari séléctionné</p>
            </div>
        </div>
        <form method="post" action="/bet" id="containMatch" hidden="true" style="height:80%; border-top: grey solid 2px">
            <div style="height: 90%;justify-content:center;flex-direction:column;align-self:center;">
                <div id="addBet" style="height: 30%;display: flex;justify-content: space-between;font-size:0.9em;align-items: center;">
                    <div style="width:25px"></div>
                    <div style="display: flex;justify-content: center">
                        <p id="displayHomeTeam"></p>
                        -
                        <p id="displayAwayTeam"></p>
                    </div>
                    <div style="padding-right:10px"><button type="button" onclick='deleteBet()'><img width="15px" src="https://image.flaticon.com/icons/png/512/39/39220.png"></button></div>
                </div>
                <div style="height: 10%; display:flex;align-items: center; justify-content:center;font-size:0.6em">
                    <p style="width: 70%;text-align: center;">Résultat du match</p>
                    <p style="width: 30%;text-align: center;">Cote</p>
                </div>
                <div style="height: 20%; display:flex;align-items: center; justify-content:center">
                    <p style="width: 70%;text-align: center;font-weight: bold;" id="displayBetSelected"></p>
                    <p style="width: 30%;text-align: center;font-weight: bold;" id="displayBet"></p>
                </div>
                <div style="height: 10%; display:flex; align-items: center; justify-content:center">
                    <p style="text-align: center;font-size:0.7em;padding:10%">Votre mise: </p>
                    <input style="width: 10%;padding:3px;margin-top:0;margin-bottom:0" name="bet" type="number" id="betPrice" onchange="calculGain(value)" min="1">
                    <p>€</p>
                </div>
                <div style="height: 30%; display:flex;align-items: center; justify-content:center">
                    <p style="text-align: center;padding-right:6px">Gains potentiel: </p>
                    <p style="text-align:center; padding-right:6px" id="gain"></p>
                    <p style="text-align:center">€</p>
                </div>
            </div>
            <input type="hidden" id="match" name="match_id">
            <input type="hidden" id="odds" name="odds_id">
            <div style="height:10%">
                <button class="btn-cart" type="submit" id="bet">Parier</button>
            </div>
        </form>
    </div>
</div>