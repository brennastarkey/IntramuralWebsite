

window.onload = function() {
    var loginBtn = document.getElementById("login");
    var createAccountBtn = document.getElementById("create-account");

    createAccountBtn.addEventListener("click", function() {
        document.location.href = "createAccount.php";
    })
}