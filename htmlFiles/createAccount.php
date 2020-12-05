

<head>
    <meta charset="utf-8" />
    <title>Create Account</title>
    <link rel="stylesheet" href="createAccountStyle.css">
</head>

<script src = "createAccountJScript.js"></script>

<body style = "background-color: whitesmoke;">
    <?php
        function checkIfRepeat($GU_ID, $userName) {
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

            $authentication = "SELECT u.user_n " .
                              "FROM user u " .
                              "WHERE u.GU_ID = ?";

            $stmt = $conn->stmt_init();
            $stmt->prepare($authentication);
            $stmt->bind_param("i", $GU_ID);
            $stmt->execute();
            $stmt->bind_result($user_n);

            if($stmt->fetch()) {
                echo '<script>alert("That username is already taken")</script>';
            }
            else {
                $conn = mysqli_connect($server, $username, $password, $database);
    
                // check connection
                if (!$conn) {
                    die('Error: ' . mysqli_connect_error());
                    console.log("error"); 
                }
                $stmt = $conn->prepare("INSERT INTO user (GU_ID, user_n, is_admin) VALUES (?, ?, ?)");
                $stmt->bind_param("isb", $GU_ID, $userName, FALSE);
                $insert = "INSERT INTO user VALUES (" . $GU_ID . ", " . $userName . ")";
                $conn->query($insert);
                $_POST['username'] = $GU_ID;
                header("Location: http://barney.gonzaga.edu/~lmason2/htmlFiles/home.php");
            }
        }


        if(isset($_POST["guid"]) && isset($_POST["username"])) {
            checkIfRepeat($_POST["guid"], $_POST["username"]);
        }
    ?>
    <h1 class = "header">Create Account</h1>
    <div class = "center">
        <form class = "create-background" action="createAccount.php" method="POST">
            <p>
                <label class = "ca-labels" for="guid">GUID: </label>
                <input type="text" name="guid" id="guid">
            </p>

            <p>
                <label class = "ca-labels" for="username">Username:</label>
                <input type="text" name="username" id="username">
            </p>

            <input class = "create-btn-style center-buttons" id = "create-btn" type="submit" value="Create Account">
        </form>  
    </div>
</body>

</html>