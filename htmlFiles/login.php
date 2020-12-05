

<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="loginStyle.css">
</head>

<script src = "loginJScript.js"></script>

<?php
session_destroy();
session_start();
?>

<body style = "background-color: whitesmoke;">
    <h1 class = "header">Gonzaga Intramurals</h1>
    <div class = "center login-background">
        <form action = "home.php" method="POST">
            <p>
                <label class = "login-labels" for="username">Username:</label>
                <input type="text" name="username" id="username">
            </p>

            <input class = "login-btn-style center-buttons" id = "login-btn" type="submit" value="Login">
        </form>  
    </div>
</body>

</html>