<?php
include('../config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email_id'];
    $pass = $_POST['pass'];
    
    $query = mysqli_query($con, "SELECT pid from `profile` where email = '$email' and password = '$pass';");
    $exists = mysqli_num_rows($query);
    if ($exists > 0) {
        $_SESSION['email'] = $email;
        $_SESSION['msg'] = "Welcome back to digicard!!!";
        header('location: ../main.php');
    } else {
        $_SESSION['msg'] = "Invalid account details!!!";
        header('location: ../login.php');
    }
}

?>