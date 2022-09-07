<?php
include('config.php');
if(isset($_SESSION['msg'])) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            '.$_SESSION['msg'].'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    unset($_SESSION['msg']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./assets/main.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/sign-in-up.css">
    <title>Digicard - Signup</title>
</head>

<body>

    <div class="main-card1 position-absolute top-50 start-50 translate-middle">
        <img id="login-chip1" src="./assets/chip.png" alt="">
        <a id="login-brand" href="./main.php">Digicard</a>
        <h1 id="login-2-h1">Hello X</h1>
        <h1 id="login-3-h1">XXXX XX</h1>
        <div class="container float-end pt-5" id="login-inner-div1">
            <h1>Welcome To Digicard</h1>
            <hr>
            <div class="container">
                <form action="./middleware/signup.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control bg-dark text-light" id="exampleInputEmail1" name="email_id" aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control bg-dark text-light" id="exampleInputPassword1" name="pass1" required>
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control bg-dark text-light" id="exampleInputPassword2" name="pass2" required>
                    </div>
                    <button type="submit" class="btn btn-outline-danger mt-3">Signup</button>
                </form>
            </div>
            <hr>
            <p>For queries contact <a href="mailto:digicard@gmail.com">digicard@gmail.com</a></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>