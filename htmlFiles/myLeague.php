

<html>

<head>
    <meta charset="utf-8" />
    <title>My Team</title>
    <link rel="stylesheet" href="myLeagueStyle.css">
</head>

<script src = "myLeagueJScript.js"></script>

<body style = "background-color: whitesmoke;">
    <ul>
        <li><a href = "#" id = "home-link">Home</a></li>
        <li><a href = "#" id = "my-team-link">My team</a></li>
        <li><a href = "#" id = "my-league-link">My League</a></li>
        <li><a href = "#" id = "schedule-link">Schedule</a></li>
        <li><a href = "#" id = "tournament-link">Tournaments</a></li>
        <li><a href = "#" id = "results-link">Results</a></li>
        <li style="float:right"><a class="active" href = "#" id = "logout-link">Log Out</a></li>
    </ul>
    <h1 class = "header">My Leagues</h1>
    <?php
        session_start();
        $server = "cps-database.gonzaga.edu";
        $username = "lmason2";
        $password = "Gozagsxc17";
        $database = "lmason2_DB";

        // connect
        $conn = mysqli_connect($server, $username, $password, $database);

        // check connection
        if (!$conn) {
            die('Error: ' . mysqli_connect_error());
            console.log("error"); 
        }

        $GU_ID = $_SESSION["guid"];
        
        $teamQuery = "SELECT ut.team_n " . 
                     "FROM userOnTeam ut JOIN user u USING(GU_ID) " . 
                     "WHERE GU_ID = ?;";
        
        $stmt = $conn->stmt_init();
        $stmt->prepare($teamQuery);
        $stmt->bind_param("i", $GU_ID);
        $stmt->execute();
        $stmt->bind_result($team_n);

        if($stmt->fetch()){
            echo "<h2 class = \"subheading\">" . $team_n . "</h2>\n";
            echo "<div>\n";
            echo "<table class = \"league-table\">\n";
            echo "<tr>\n";
            echo "<th>Team Name</th>\n";
            echo "<th>Wins</th>\n";
            echo "<th>Losses</th>\n";
            echo "</tr>\n";

            $stmt->close();

            // set up query

            while($stmt->fetch()) {
                // print data
            }
            echo "</table>";
            echo "</div>";

            $stmt->close();
        }
        
        else {
            echo "<p class = \"center-class\">No Team<p>\n";
        }
        
        mysqli_close($conn);
    ?>
    <div>
        <button class = "league-button-style" id = "join_new_league_button">Join New League</button>
        <button class = "league-button-style" id = "view_league_rules_button">View League Rules</button>
    </div>
</body>

</html>