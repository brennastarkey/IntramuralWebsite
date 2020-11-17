

window.onload = function() {
    var myTeamButton = document.getElementById("my-team-button");
    var myLeagueButton = document.getElementById("my-league-button");
    
    myTeamButton.addEventListener("click", function() {
        document.location.href = 'http://barney.gonzaga.edu/~lmason2/htmlFiles/myTeam.php';
    });

    myLeagueButton.addEventListener("click", function () {
        document.location.href = 'http://barney.gonzaga.edu/~lmason2/htmlFiles/myLeague.php'
    })
}