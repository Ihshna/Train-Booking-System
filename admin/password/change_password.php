

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    

    <div class="form-container">
        <h2>Change Your Account Password</h2>
        <form action="" method="POST">

          <div class="form-group">
            <label>New Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
            <div class="form-group">
            <label>Confirm Password:</label>
            <input type="password" name="confirm" id="confirm" required>
            </div>

            <div class="btn-container">
            <button type="submit" name="change_password" class="btn btn-submit">Change Password</button>
            <button type="reset" class="btn btn-reset">Reset</button>
            </div>
        </form>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>

<?php
include('../config/database.php'); // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password=$_POST['password'];
    $confirm=$_POST['confirm'];

    if($password==$confirm){
        
        echo"<h4>Password changed successfully!!</h4>";
    }
    else{
        echo"Error";
    }
}
?>
