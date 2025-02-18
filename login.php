<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<body class="login">
    <div class="login-container">
        <div class="header">
            <h2>Welcome to the Website</h2>
            <p style="font-size:15px;">Reserve your seats now.!!</p>
        </div>
        <div class="login-box">
            <h3>USER LOGIN</h3>
            <form id="login-form">
                <div class="input-group">
                    <input type="text" id="username" placeholder="User name" required>
                </div>
                <div class="input-group">
                    <input type="password" id="password" placeholder="Password" required>
                </div>
                <div class="options">
                    <label><input type="checkbox" style="color:black;">Remember me</label>
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit">Log In</button>
            </form>
        </div>
    </div>
    
    <script src="admin/js/script.js"></script>


</body>
</html>