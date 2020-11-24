

window.onload = function() {
    var createAccountBtn = document.getElementById("create-account");

    createAccountBtn.addEventListener("click", function() {
        document.location.href = "createAccount.php";
    })
}