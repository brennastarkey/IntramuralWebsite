
<html>

<head>
    <meta charset="utf-8" />
    <title>Gonzaga Intramurals</title>
    <link rel="stylesheet" href="homeStyle.css">
</head>

<script src = "homeJScript.js"></script>

<body class = "grid-container">
    <h1 class = "header">Zag Intramurals</h1>
    <button id = "my-team-button" class = "home_buttons" grid-row-start = "2" onclick = >My Team</button>
    <button id = "my-league-button" class = "home_buttons" grid-row-start = "3">My League</button>
    <button id = "schedule-button" class = "home_buttons" grid-row-start = "4">Schedule</button>
    <button id = "create-button" class = "home_buttons" grid-row-start = "5">Create</button>
    <h2 id = "results" class = "subheading">Results</h2>
    <div id = "results-query">
        <?php
            // get credentials (put your ini file somewhere private
            $config = parse_ini_file("config.ini");
            $server = $config["servername"];
            $username = $config["username"];
            $password = $config["password"];
            $database = "mason_starkey_DB";
        
            // connect
            $conn = mysqli_connect($server, $username, $password, $database);
        
            // check connection
            if (!$conn) {
            die('Error: ' . mysqli_connect_error());
            console.log("error"); 
            }
        
            // the query
            $query = "SELECT t1.team_n, t1.wins, t1.losses, t1.ties, l1.league_ID" .
                    "FROM team t1 JOIN teamInLeague l1 USING(team_n)" . 
                    "WHERE l1.league_ID = 101;";

            $result = mysqli_query($team_n, $wins, $losses, $ties, $league_id);
        
            // get the results (each row bound to the variables
            if (mysqli_num_rows($result) > 0) {
                echo "<p>League Results:\n";
                echo "<ol>\n";
                while($row = mysqli_fetch_assoc($result)) {
                echo "<li>". $row["team_n"] . $row["wins"] . $row["losses"] . "</li>\n";
                }
                echo "</ol>";
            }
            else {
                echo "<p class = \"center-class\">No Results<p>\n";
            }
        
            mysqli_close($conn);
        ?>
    </div>
    <h2 id = "upcoming" class = "subheading">Upcoming</h2> 
    <div id = "upcoming-query">

    </div>
</body>

</html>