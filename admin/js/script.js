function showChangePasswordForm(){
    window.location.href="admin/password/change_password.php";
}


document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault();
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    if (username === "admin" && password === "1234") {
        window.location.href = "admin/dashboard.php";
    } else if (username === "user" && password === "1234") {
        window.location.href = "user/dashboard2.php";
    } else {
        alert("Invalid username or password.");
    }
});

