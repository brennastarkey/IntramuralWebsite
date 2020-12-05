


<html>

<head>
    <meta charset="utf-8" />
    <title>My Team</title>
    <link rel="stylesheet" href="tournamentStyle.css">
</head>

<script src = "tournamentJScript.js"></script>

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
    <h1 class = "header">Tournaments</h1>
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

        $query = "SELECT  t.tourney_n, t.tourney_date " . 
                "FROM tournament t ";
            // set up prepared statement

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<table class = \"tournament-table\">\n";
            echo "<tr>\n";
            echo "<th>Tournament Name</th>\n";
            echo "<th>Tournament Date</th>\n";
            echo "<th>Join</th>\n";
            echo "</tr>\n";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>\n";
                echo "<td>" . $row["tourney_n"] . "</td>" . "\n";
                echo "<td>" . $row["tourney_date"] . "</td>" . "\n";
                echo "<td><button class = \"join-btn\" id = \"join-coed-basketball\">Join</button></td>";
                echo "</tr>\n";
            }
            echo "</table>";
        }
        else {
            echo "<p class = \"center-class\">No Results<p>\n";
        }
        
        mysqli_close($conn);
    ?>
</body>

</html>