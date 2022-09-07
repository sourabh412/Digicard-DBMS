<?php
include('../config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email_id'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    if ($pass1 != $pass2) {
        $_SESSION['msg'] = "Passwords do not match!!!";
        header('location: ../signup.php');
        return;
    }
    $query = mysqli_query($con, "SELECT pid from `profile` where email = '$email';");
    $exists = mysqli_num_rows($query);
    if ($exists > 0) {
        $_SESSION['msg'] = "Account already exists!!!";
        header('location: ../signup.php');
        return;
    } else {
        $cmd = "INSERT INTO profile (`email`,`password`) VALUES ('$email','$pass1');";
        mysqli_query($con, $cmd);
        $_SESSION['email'] = $email;
        $_SESSION['msg'] = "Profile created successfully!!!";
        header('location: ../main.php');
    }
}

?>