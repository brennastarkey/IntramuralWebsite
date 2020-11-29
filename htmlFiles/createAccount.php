

<head>
    <meta charset="utf-8" />
    <title>Create Account</title>
    <link rel="stylesheet" href="createAccountStyle.css">
</head>

<script src = "createAccountJScript.js"></script>

<body style = "background-color: whitesmoke;">
    <h1 class = "header">Create Account</h1>
    <div class = "center">
        <form class = "create-background" action="home.php" method="POST">
            <p>
                <label class = "ca-labels" for="first">First Name:</label>
                <input type="text" name="first" id="first">
            </p>

            <p>
                <label class = "ca-labels" for="last">Last Name:</label>
                <input type="text" name="last" id="last">
            </p>

            <p>
                <label class = "ca-labels" for="guid">GUID: </label>
                <input type="text" name="guid" id="guid">
            </p>

            <p>
                <label class = "ca-labels" for="username">Username:</label>
                <input type="text" name="username" id="username">
            </p>

            <p>
                <label class = "ca-labels" for="password">Password:</label>
                <input type="password" name="password" id="password">
            </p>

            <p>
                <label class = "ca-labels" for="confirm-password">Confirm Password:</label>
                <input type="password" name="confirm-password" id="confirm-password">
            </p>

            <input class = "create-btn-style center-buttons" id = "create-btn" type="submit" value="Create Account">
        </form>  
    </div>
</body>

</html>