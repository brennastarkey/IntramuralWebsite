


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
    <div>
        <table class = "tournament-table">
            <tr>
                <th>Sport</th>
                <th>Gender</th>
                <th>Dates</th>
                <th>Join</th>
            </tr>
            <tr>
                <td>Soccer</td>
                <td>CoEd</td>
                <td>8/8-8/10</td>
                <td><button class = "join-btn" id = "join-coed-soccer">Join</button></td>
            </tr>
            <tr>
                <td>Soccer</td>
                <td>Female</td>
                <td>8/8-8/10</td>
                <td><button class = "join-btn" id = "join-female-soccer">Join</button></td>
            </tr>
            <tr>
                <td>Soccer</td>
                <td>Male</td>
                <td>8/8-8/10</td>
                <td><button class = "join-btn" id = "join-male-soccer">Join</button></td>
            </tr>
            <tr>
                <td>Basketball</td>
                <td>CoEd</td>
                <td>11/9-11/11</td>
                <td><button class = "join-btn" id = "join-coed-basketball">Join</button></td>
            </tr>
            <tr>
                <td>Basketball</td>
                <td>Female</td>
                <td>11/9-11/11</td>
                <td><button class = "join-btn" id = "join-female-basketball">Join</button></td>
            </tr>
            <tr>
                <td>Basketball</td>
                <td>Male</td>
                <td>11/9-11/11</td>
                <td><button class = "join-btn" id = "join-male-basketball">Join</button></td>
            </tr>
        </table>
    </div>
</body>

</html>