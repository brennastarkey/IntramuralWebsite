

<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="loginStyle.css">
</head>

<script src = "loginJScript.js"></script>

<body style = "background-color: whitesmoke;">
    <h1 class = "header">Gonzaga Intramurals</h1>
    <div class = "center login-background">
        <form action = "home.php" method="POST">
            <p>
                <label class = "login-labels" for="username">Username:</label>
                <input type="text" name="username" id="username">
            </p>

            <p>
                <label class = "login-labels" for="password">Password:</label>
                <input type="password" name="password" id="password">
            </p>

            <input class = "login-btn-style center-buttons" id = "login-btn" type="submit" value="Login">
        </form>  
        <button class = "login-btn-style center-buttons" id = "create-account">Create Account</button>
    </div>
</body>

</html>