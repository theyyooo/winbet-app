function getInfoBet(homeTeam, awayTeam, oddSelected, betSelected, matchId){
    console.log('values = ' , homeTeam)      
    document.getElementById("displayHomeTeam").innerHTML = homeTeam 
    document.getElementById("displayAwayTeam").innerHTML = awayTeam 
    document.getElementById("displayBetSelected").innerHTML = oddSelected 
    console.log("bet : " , betSelected)
    console.log("match : " , matchId)
}

