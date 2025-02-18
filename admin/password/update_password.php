<?php
session_start();
include ('../config/database.php');

if (isset($_POST['change_password'])) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $user_id = $_SESSION['user_id'];

    if ($new_password !== $confirm_password) {
        echo "<script>('Passwords do not match!');window.location='dashboard.php?page=reports/system_user_report';</script>";
        exit();
    }

    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
    $query = "UPDATE users SET password='$hashed_password' WHERE id='$user_id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>('Password changed successfully!'); window.location='change_password.php';</script>";
    } else {
        echo "<script>alert('Error updating password!'); window.location='../dashboard.php';</script>";
    }
}
?>
