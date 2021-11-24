<?php if ($data["sportLibelle"] === "FOOTBALL") { ?>

    <div style="width: 100%; display:flex; margin:20px">
        <div style="width:18%;text-align:center"><a class="btnChampionnat" <?php if ($data["competition"] === "2015"){?>style="background-color:#FBCD27;"<?php }?> href="/sport/FOOTBALL/2015">Ligue 1</a></div>
        <div style="width:18%;text-align:center"><a class="btnChampionnat" <?php if ($data["competition"] === "2021"){?>style="background-color:#FBCD27;"<?php }?> href="/sport/FOOTBALL/2021">Première ligue</a></div>
        <div style="width:18%;text-align:center"><a class="btnChampionnat" <?php if ($data["competition"] === "2014"){?>style="background-color:#FBCD27;"<?php }?> href="/sport/FOOTBALL/2014">Primera Division</a></div>
        <div style="width:25%;text-align:center"><a class="btnChampionnat" <?php if ($data["competition"] === "2001"){?>style="background-color:#FBCD27;"<?php }?> href="/sport/FOOTBALL/2001">UEFA Champions League</a></div>
        <div style="width:18%;text-align:center"><a class="btnChampionnat" <?php if ($data["competition"] === "2002"){?>style="background-color:#FBCD27;"<?php }?> href="/sport/FOOTBALL/2002">Bundesliga</a></div>
        <div style="width:18%;text-align:center"><a class="btnChampionnat" <?php if ($data["competition"] === "2017"){?>style="background-color:#FBCD27;"<?php }?> href="/sport/FOOTBALL/2017">Primeira Liga</a></div>
        <div style="width:18%;text-align:center"><a class="btnChampionnat" <?php if ($data["competition"] === "2019"){?>style="background-color:#FBCD27;"<?php }?> href="/sport/FOOTBALL/2019">Serie A</a></div>
    </div>

<?php } ?>