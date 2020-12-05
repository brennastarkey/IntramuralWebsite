
<html>

<head>
    <meta charset="utf-8" />
    <title>My Team</title>
    <link rel="stylesheet" href="myTeamStyle.css">
</head>

<script src = "myTeamJScript.js"></script>

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
    <h1 class = "header">My Teams</h1>
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
        
        $teamQuery = "SELECT u.team_n " . 
                     "FROM userOnTeam u " .
                     "WHERE u.GU_ID = ?;";
        // set up prepared statement
        $stmt = $conn->stmt_init();
        $stmt->prepare($teamQuery);
        $stmt->bind_param("i", $GU_ID);
        $stmt->execute();
        $stmt->bind_result($team_n);

        //if (mysqli_num_rows($teamResult) > 0) {
        if($stmt->fetch()){
            
            echo "<h2 class = \"subheading\">" . $team_n . "</h2>";
            echo "<div>";
            echo "<table class = \"team-table\">\n";
            echo "<tr>\n";
            echo "<th>Player Name</th>\n";
            echo "<th>Captain?</th>\n";
            echo "</tr>\n";

            $query = "SELECT ut.GU_ID, u.user_n, ut.is_captain " . 
                     "FROM userOnTeam ut JOIN user u USING(GU_ID) " . 
                     "WHERE ut.team_n = ?;";
            // set up prepared statement
            //result = mysqli_query($conn, $query);
            $stmt = $conn->stmt_init();
            $stmt->prepare($query);
            $stmt->bind_param("s", $team_n);
            $stmt->execute();
            $stmt->bind_result($GU_ID, $user_n, $is_captain);

            while($stmt->fetch()) {
                echo "<tr>\n";
                echo "<td>" . $user_n . "</td>" . "\n";
                echo "<td>" . $is_captain . "</td>" . "\n";
                echo "</tr>\n";
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
    <form id = "add-player" action="myTeam.php" method="POST">
        <input class = "my-team-buttons" id = "add-player-btn" type="submit" value="Add Player">
        <input type="text" name="guid" id="guid" placeholder = "GUID">  
    </form>  
    <form id = "join-team" action="myTeam.php" method="POST">
        <input class = "my-team-buttons" id = "join-team-btn" type="submit" value="Join Team">
        <input type="text" name="team_n" id="team-n" placeholder = "Team Name"> 
    </form>  
    <form id = "join-team" action="myTeam.php" method="POST">
        <input class = "my-team-buttons" id = "create-team-btn" type="submit" value="Create Team">
        <input type="text" name="c_team_n" id="c_team-n" placeholder = "Team Name"> 
    </form>  
</body>

</html>