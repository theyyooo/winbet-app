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
                    <img height="20px" class="imgSport" style="margin:0" src="<?=$value->img?>">
                    <a class="linkSport" href="/sport/<?=$value->label?>"><span><?=$value->label ?></span></a>
                </div>
            <?php
            } else {
            ?>
                <div class="divSport" style="padding-left:20px;">
                    <img height="20px" class="imgSport" src="<?=$value->img?>">
                    <a class="linkSport" href="/sport/<?=$value->label?>"><span><?=$value->label ?></span></a>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <div class="cart-card">
        <h3 style="text-align: center;padding-top:20px">Panier</h3>
        <div style="height:50%; border-left:grey 3px solid;margin:40px;border-right:grey 3px solid;margin:40px">
            <div style="height: 100%;justify-content:center;flex-direction:column;align-self:center;">
                <p id="addBet" style="flex-direction: column;display: flex;justify-content: center;align-self: center;height: 100%;text-align: center;">Aucun Pari séléctionné</p>
                <p id="displayHomeTeam">test</p>
            </div>
        </div>
        <button id="bet" style="width:50%;text-align: center; background-color:#FBCD27; padding:10px 15px;margin-left:20%;border-radius: 5px;text-decoration: none;color: black;border: #FBCD27 solid 1px;">Parier</button>
    </div>
</div>