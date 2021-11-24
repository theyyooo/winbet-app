<div style="width:20%; height:100%">
    <div style="background-color: #fff;border-radius: 5px; box-shadow: rgb(211 211 211 / 20%) 0px 2px 8px 0px">
        <div style="text-align: center; margin-bottom: 25px;">
            <b>Liste des sports</b>
        </div>
        <?php
        foreach ($data['sports'] as $value) {
            if ($data['sportLibelle'] === $value->label) {
                echo '<div class="divSport" style="background-color:#FBCD27;padding-left:20px;">
                        <img height="20px" class="imgSport" style="margin:0" src="' . $value->img . '">';
                echo '<a class="linkSport" href="/sport/' . $value->label . '"><span>' . $value->label . '</span></a>
                    </div>';
            } else {
                echo '<div class="divSport" style="padding-left:20px;">
                        <img height="20px" class="imgSport" src="' . $value->img . '">';
                echo '<a class="linkSport" href="/sport/' . $value->label . '"><span>' . $value->label . '</span></a>
                    </div>';
            }
        }
        ?>
    </div>
</div>