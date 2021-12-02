let bet

function getInfoBet(homeTeam, awayTeam, oddSelected, betSelected, matchId, event) {
    if (document.getElementById("containNoMatch").hidden == false) {
        document.getElementById("containNoMatch").hidden = true
        document.getElementById("containMatch").hidden = false
    }
    else {
        document.getElementById("containNoMatch").hidden = false
        document.getElementById("containMatch").hidden = true
    }

    if (betSelected == 1) {
        document.getElementById("displayBetSelected").innerHTML = homeTeam
    }
    else if (betSelected == 2) {
        document.getElementById("displayBetSelected").innerHTML = "match nul"
    }
    else {
        document.getElementById("displayBetSelected").innerHTML = awayTeam
    }

    document.getElementById("displayHomeTeam").innerHTML = homeTeam
    document.getElementById("displayAwayTeam").innerHTML = awayTeam

    document.getElementById("displayBet").innerHTML = oddSelected

    document.getElementById("gain").innerHTML = (10 * oddSelected).toFixed(2)
    bet = oddSelected

    document.getElementById("odds").value = betSelected;
    document.getElementById("match").value = matchId;

    event.taget.style.backgroundColor = "red"

}

function calculGain(value) {

    document.getElementById("gain").innerHTML = (bet * value).toFixed(2)
}