

<html>

<head>
    <meta charset="utf-8" />
    <title>Schedule</title>
    <link rel="stylesheet" href="scheduleStyle.css">
</head>

<script src = "scheduleJScript.js"></script>

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
            echo "<h2 class = \"header\"> Schedule For: </h2>\n";
            echo "<h2 class = \"subheading\">" . $team_n . "</h2>\n";
            echo "<div>\n";
            echo "<table class = \"schedule-table\">\n";
            echo "<tr>\n";
            echo "<th>Team One</th>\n";
            echo "<th>Team Two</th>\n";
            echo "<th>Date</th>\n";
            echo "<th>Location</th>\n";
            echo "</tr>\n";

            $stmt->close();

            $query = "SELECT  s.team_one, s.team_two, s.date_of_game, s.game_location " . 
                     "FROM schedule s " . 
                     "WHERE s.team_one = ? OR s.team_two = ?;";
            // set up prepared statement
            $stmt = $conn->stmt_init();
            $stmt->prepare($query);
            $stmt->bind_param("ss", $team_n, $team_n);
            $stmt->execute();
            $stmt->bind_result($team_one, $team_two, $date_of_game, $game_location);

            while($stmt->fetch()) {
                echo "<tr>\n";
                echo "<td>" . $team_one . "</td>" . "\n";
                echo "<td>" . $team_two . "</td>" . "\n";
                echo "<td>" . $date_of_game . "</td>" . "\n";
                echo "<td>" . $game_location . "</td>" . "\n";
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
</body>

</html>
