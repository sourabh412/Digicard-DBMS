<?php
include('config.php');

if (isset($_SESSION['msg'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            ' . $_SESSION['msg'] . '
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
    <link rel="stylesheet" href="./css/main.css">
    <title>Digicard</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><span class="text-brand">Digicard</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=<?php if (isset($_SESSION['email'])) {echo './dashboard.php';} else {echo './login.php';} ?>>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=<?php if (isset($_SESSION['email'])) {echo './cards.php';} else {echo './login.php';} ?>>Cards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=<?php if (isset($_SESSION['email'])) {echo './history.php';} else {echo './login.php';} ?>>History</a>
                    </li>
                </ul>
                <?php
                if (isset($_SESSION['email'])) {
                    echo '<a class="btn btn-outline-danger mx-2 ms-0" href="./logout.php">Logout</a>';
                } else {
                    echo '<a class="btn btn-outline-warning mx-2 ms-0" href="./login.php">Login</a>
                        <a class="btn btn-outline-warning mx-2" href="./signup.php">Signup</a>';
                }
                ?>
            </div>
        </div>
    </nav>

    <div id="img1-2-shade"></div>

    <div id="main-text" class="p-3">
        <h1>FUTURE.</h1>
        <p>We present to you the most <span>SECURE</span> and<br> <span>SIMPLE</span> way to carry your cards.<br>Digital cards.</p>
        
        <a class="btn btn-outline-warning mx-2 ms-0" href=<?php if (isset($_SESSION['email'])) {echo './dashboard.php';} else {echo './login.php';} ?>>Dashboard</a>
    </div>

    <div id="card-img1">
        <img src="./assets/main.png" alt="">
    </div>
    <div id="card-img2">
        <img src="./assets/main.png" alt="">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>