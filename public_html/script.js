function getInfoBet(homeTeam, awayTeam, oddSelected, betSelected, matchId){
    document.getElementById("displayHomeTeam").innerHTML = homeTeam 
    document.getElementById("displayAwayTeam").innerHTML = awayTeam 
    document.getElementById("displayBetSelected").innerHTML = oddSelected 
    console.log("bet : " , betSelected)
    console.log("match : " , matchId)
    document.getElementById("odds").value = betSelected;
    document.getElementById("match").value = matchId;
}