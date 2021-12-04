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
        <div class="panierTitle">
            <h3>Panier</h3>
        </div>
        <div id="containNoMatch" class="containNoMatch">
            <div class="containNoMatch2">
                <p id="addBet" class="noPariSelected">Aucun Pari séléctionné</p>
            </div>
        </div>
        <form method="post" action="/bet" id="containMatch" hidden="true" class="formWithMatch">
            <div class="formWithMatch2">
                <div id="addBet" class="displayTeamForBet">
                    <div class="divForStyle"></div>
                    <div class="displayTeamForBet2">
                        <p id="displayHomeTeam"></p>
                        -
                        <p id="displayAwayTeam"></p>
                    </div>
                    <div class="divBin"><button type="button" onclick='deleteBet()'><img width="15px" src="https://image.flaticon.com/icons/png/512/39/39220.png"></button></div>
                </div>
                <div class="divResultatCotes">
                    <p class="resultatMatch">Résultat du match</p>
                    <p class="cote">Cote</p>
                </div>
                <div class="affichageResultatCotes">
                    <p class="affichResultatMatch" id="displayBetSelected"></p>
                    <p class="affichCote" id="displayBet"></p>
                </div>
                <div class="montantMise">
                    <p class="votreMise">Votre mise: </p>
                    <input class="inputMise" name="bet" type="number" id="betPrice" onchange="calculGain(value)" min="1">
                    <p>€</p>
                </div>
                <div class="divGainsPotentiel">
                    <p class="gainPotentiel">Gains potentiel: </p>
                    <p class="gains" id="gain"></p>
                    <p class="euros">€</p>
                </div>
            </div>
            <input type="hidden" id="match" name="match_id">
            <input type="hidden" id="odds" name="odds_id">
            <div class="btnParierForm">
                <button class="btn-cart" type="submit" id="bet">Parier</button>
            </div>
        </form>
    </div>
</div>