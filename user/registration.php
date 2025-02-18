<?php
include('../config/database.php'); // Database connection

// Initialize variables
$name =$role=$username=$mobile= $email=$dob = $address = "";
$updateMode = false;
$id = "";

// Check if an ID is provided (for editing)
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $role=$row['role'];
        $username=$row['username'];
        $mobile=$row['mobile_no'];
        $email = $row['email'];
        $dob=$row['date_of_birth'];
        $address = $row['address'];
        $updateMode = true;
    }
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $role=$_POST['role'];
    $username=$_POST['username'];
    $mobile=$_POST['mobile'];
    $email = $_POST['email'];
    $dob=$_POST['dob'];
    $address = $_POST['address'];

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Update existing customer
        $id = $_POST['id'];
        $query = "UPDATE users SET 
                    name = '$name',
                    role='$role',
                    username='$username',
                    mobile_no='$mobile', 
                    email = '$email', 
                    date_of_birth='$dob',
                    address = '$address'
                    WHERE id = $id";
    } else {
        // Insert new customer
        $query="INSERT INTO users(name,role,username,password,mobile_no,email,date_of_birth,address,profile_picture)
    VALUES('$name','$role','$username','$password','$mobile','$email','$dob','$address','$profile_picture')";

    }

    if ($conn->query($query) === TRUE) {
        header("Location: dashboard.php?page=reports/customer_report"); // Redirect to the report page
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $updateMode ? "Edit Customer" : "Add Customer"; ?></title>
</head>
<body>
<div class="form-container">
<h2>Register</h2>

<form action="add_customer.php" method="POST">

    <div class="form-group">
       <label>Name:</label>
       <input type="text" id="name" name="name" value="<?=$name;?>" required>
    </div>

    <div class="form-group">
        <label>User Role:</label>
        <select name="role" value="<?=$role;?>">
            <option value="customer">Customer</option>
            
        </select>
    </div>

    <div class="form-group">
        <label>Username:</label>
        <input type="text" name="username" value="<?=$username;?>"required>
    </div>

    <div class="form-group">
        <label>Password:</label>
        <input type="password" name="password" value="<?=$password;?>"required>
    </div>


    <div class="form-group">
        <label>Mobile:</label>
        <input type="text" name="mobile" value="<?=$mobile;?>"required>

    </div>

    <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email" value="<?=$email;?>"required>
    </div>

    <div class="form-group">
        <label>Date of Birth:</label>
        <input type="date" name="dob" value="<?=$dob;?>"required>
    </div>

    <div class="form-group">
        <label>Address:</label>
        <input type="text" name="address" value="<?=$address;?>"required>
    </div>

    <div class="form-group">
        <label>Profile picture</label>
        <input type="file" name="profile_picture" value="<?=$profile_picture;?>">
    </div>

    <div class="btn-container">
        <button type="submit" class="btn btn-submit">Register</button>
        <button type="reset" class="btn btn-reset">Reset</button>
    </div>

     
</form>
</div>
