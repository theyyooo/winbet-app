<?php if ($data["sportLibelle"] === "FOOTBALL") { ?>
    <div class="displayCompetition">
        <div class="divChampionnat"><a <?php if (!isset($data["competition"])){?>class="btnChampionnatbckg"<?php } else {?> class="btnChampionnat"<?php }?> href="/sport/FOOTBALL">TOUTES</a></div>    
        <div class="divChampionnat"><a <?php if ($data["competition"] === "2015"){?>class="btnChampionnatbckg"<?php } else { ?>class="btnChampionnat"<?php }?> href="/sport/FOOTBALL/2015">Ligue 1</a></div>
        <div class="divChampionnat"><a <?php if ($data["competition"] === "2021"){?>class="btnChampionnatbckg"<?php } else { ?>class="btnChampionnat"<?php }?> href="/sport/FOOTBALL/2021">Première ligue</a></div>
        <div class="divChampionnat"><a <?php if ($data["competition"] === "2014"){?>class="btnChampionnatbckg"<?php } else { ?>class="btnChampionnat"<?php }?> href="/sport/FOOTBALL/2014">Primera Division</a></div>
        <div class="divChampionnatC1"><a <?php if ($data["competition"] === "2001"){?>class="btnChampionnatbckg"<?php } else { ?>class="btnChampionnat"<?php }?> href="/sport/FOOTBALL/2001">UEFA Champions League</a></div>
        <div class="divChampionnat"><a <?php if ($data["competition"] === "2002"){?>class="btnChampionnatbckg"<?php } else { ?>class="btnChampionnat"<?php }?> href="/sport/FOOTBALL/2002">Bundesliga</a></div>
        <div class="divChampionnat"><a <?php if ($data["competition"] === "2017"){?>class="btnChampionnatbckg"<?php } else { ?>class="btnChampionnat"<?php }?> href="/sport/FOOTBALL/2017">Primeira Liga</a></div>
        <div class="divChampionnat"><a <?php if ($data["competition"] === "2019"){?>class="btnChampionnatbckg"<?php } else { ?>class="btnChampionnat"<?php }?> href="/sport/FOOTBALL/2019">Serie A</a></div>
    </div>
<?php } ?>

