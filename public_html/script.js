let thisSource

let thisBet

var thisMonPari

let thisResultat
let thisTotal
let thisHomeTeam
let thisAwayTeam
let thisOddSelected
let thisValueBet

function getInfoBet(homeTeam, awayTeam, oddSelected, betSelected, matchId, event) {
    event = event || window.event;
    var source = event.target || event.srcElement;
    console.log(source)
    if (thisSource != source) {
        if (thisSource != null) {
            thisSource.style.backgroundColor = '#FBCD27'
            thisSource.style.border = '#FBCD27'
        }
        source.style.backgroundColor = 'red'
        source.style.border = 'red'
    }
    else {
        source.style.backgroundColor = '#FBCD27'
        source.style.border = '#FBCD27'
        sessionStorage.clear();
        document.getElementById("containNoMatch").hidden = false
        document.getElementById("containMatch").hidden = true
        thisSource = null
        return
    }
    thisSource = source

    if (document.getElementById("containNoMatch").hidden == false) {
        document.getElementById("containNoMatch").hidden = true
        document.getElementById("containMatch").hidden = false
    }

    if (betSelected == 1) {
        document.getElementById("displayBetSelected").innerHTML = homeTeam
        thisResultat = homeTeam
    }
    else if (betSelected == 2) {
        document.getElementById("displayBetSelected").innerHTML = "match nul"
        thisResultat = "match nul"
    }
    else {
        document.getElementById("displayBetSelected").innerHTML = awayTeam
        thisResultat = awayTeam
    }

    document.getElementById("displayHomeTeam").innerHTML = homeTeam
    thisHomeTeam = homeTeam
    document.getElementById("displayAwayTeam").innerHTML = awayTeam
    thisAwayTeam = awayTeam

    document.getElementById("displayBet").innerHTML = oddSelected
    thisOddSelected = oddSelected

    thisValueBet = 10
    document.getElementById("betPrice").value = thisValueBet
    total = (10 * oddSelected).toFixed(2)
    document.getElementById("gain").innerHTML = total
    thisTotal = total
    thisBet = oddSelected

    document.getElementById("odds").value = betSelected;
    document.getElementById("match").value = matchId;

    thisMonPari = {
        "resultatMatch": thisResultat,
        "homeTeam": thisHomeTeam,
        "awayTeam": thisAwayTeam,
        "total": thisTotal,
        "value": thisValueBet,
        "betSelected": betSelected,
        "matchId": matchId,
        "odd": thisOddSelected
    }
    var monPari_json = JSON.stringify(thisMonPari);
    sessionStorage.setItem("monPAri", monPari_json);

}

function calculGain(value) {

    console.log(thisBet)
    let total = (thisBet * value).toFixed(2)
    console.log(value)
    console.log(total)
    document.getElementById("gain").innerHTML = total
    thisTotal = total
    document.getElementById("betPrice").value = value
    thisValueBet = value
    thisMonPari["total"] = total
    thisMonPari["value"] = value
    var monPari_json = JSON.stringify(thisMonPari);
    sessionStorage.setItem("monPAri", monPari_json);
}

function loadBasket() {



    if (!!document.getElementById("success") && document.getElementById("success").innerHTML === "Pari enregistré") {
        sessionStorage.clear();
    }

    if (!!document.getElementById("success")) {
        setTimeout(function () {
            document.getElementById("success").style.display = "none"
        }, 5000)
    }

    if (!!document.getElementById("bad")) {
        setTimeout(function () {
            document.getElementById("bad").style.display = "none"
        }, 5000)
    }

    if (sessionStorage.getItem("monPAri") != null) {
        var monPari_json = sessionStorage.getItem("monPAri");
        var monPari = JSON.parse(monPari_json);
        thisBet = monPari["odd"]
        document.getElementById("containNoMatch").hidden = true
        document.getElementById("containMatch").hidden = false

        document.getElementById("displayHomeTeam").innerHTML = monPari["homeTeam"]
        document.getElementById("displayAwayTeam").innerHTML = monPari["awayTeam"]
        document.getElementById("displayBet").innerHTML = monPari["odd"]
        document.getElementById("displayBetSelected").innerHTML = monPari["resultatMatch"]
        document.getElementById("gain").innerHTML = monPari["total"]
        document.getElementById("betPrice").value = monPari["value"]
        document.getElementById("odds").value = monPari["betSelected"]
        document.getElementById("match").value = monPari["matchId"]
    }
}

function deleteBet() {
    sessionStorage.clear();
    document.getElementById("containNoMatch").hidden = false
    document.getElementById("containMatch").hidden = true
}