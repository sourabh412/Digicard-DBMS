<?php
include('../config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_SESSION['email'];
    if ($_POST['name']) {
        $name = $_POST['name'];
        $query = mysqli_query($con,"UPDATE `profile` SET Name = '$name' WHERE Email = '$email';");
    }
    if ($_POST['dob']) {
        $dob = $_POST['dob'];
        $query = mysqli_query($con,"UPDATE `profile` SET Dob = '$dob' WHERE Email = '$email';");
    }
    if ($_POST['sex']) {
        $gender = $_POST['sex'];
        $query = mysqli_query($con,"UPDATE `profile` SET gender = '$gender' WHERE Email = '$email';");
    }
    if ($_POST['contact']) {
        $contact = $_POST['contact'];
        $query = mysqli_query($con,"UPDATE `profile` SET Phone = '$contact' WHERE Email = '$email';");
    }
    header('location: ../dashboard.php');
}
?>