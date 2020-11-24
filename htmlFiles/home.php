
<html>

<head>
    <meta charset="utf-8" />
    <title>Gonzaga Intramurals</title>
    <link rel="stylesheet" href="homeStyle.css">
</head>

<script src = "homeJScript.js"></script>

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
    <h1 class = "header">Zag Intramurals</h1>
    <h2 id = "results" class = "subheading">Results</h2>
    <div id = "results-query">
    <?php
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

        // the query
        $query = "SELECT *
                FROM results r;";

        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<table class = \"home-table\">\n";
            echo "<tr>\n";
            echo "<th>Team One</th>\n";
            echo "<th>Team Two</th>\n";
            echo "<th>Team One Score</th>\n";
            echo "<th>Team Two Score</th>\n";
            echo "<th>Date-Time</th>\n";
            echo "</tr>\n";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>\n";
                echo "<td>" . $row["team_one"] . "</td>" . "\n";
                echo "<td>" . $row["team_two"] . "</td>" . "\n";
                echo "<td>" . $row["team_one_score"] . "</td>" . "\n";
                echo "<td>" . $row["team_two_score"] . "</td>" . "\n";
                echo "<td>" . $row["date_of_game"] . "</td>" . "\n";
                echo "</tr>\n";
            }
            echo "</table>";
        }
        else {
            echo "<p class = \"center-class\">No Results<p>\n";
        }
        
        mysqli_close($conn);
    ?>
    <h2 id = "upcoming" class = "subheading">Upcoming</h2> 
    <div id = "upcoming-query">
    <?php
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

        // the query
        $query = "SELECT *
                FROM schedule s;";

        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<table class = \"home-table\">\n";
            echo "<tr>\n";
            echo "<th>Team One</th>\n";
            echo "<th>Team Two</th>\n";
            echo "<th>Date</th>\n";
            echo "<th>Location</th>\n";
            echo "</tr>\n";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>\n";
                echo "<td>" . $row["team_one"] . "</td>" . "\n";
                echo "<td>" . $row["team_two"] . "</td>" . "\n";
                echo "<td>" . $row["date_of_game"] . "</td>" . "\n";
                echo "<td>" . $row["game_location"] . "</td>" . "\n";
                echo "</tr>\n";
            }
            echo "</table>";
        }
        else {
            echo "<p class = \"center-class\">No Results<p>\n";
        }
        
        mysqli_close($conn);
    ?>
    </div>
</body>

</html>