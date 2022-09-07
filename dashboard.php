<?php 
include('config.php');

if(isset($_SESSION['msg'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            '.$_SESSION['msg'].'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    unset($_SESSION['msg']);
}

?>

<?php
$email = $_SESSION['email'];
$query = mysqli_query($con,"SELECT * FROM `profile` WHERE email = '$email';");

while ($get_details = mysqli_fetch_assoc($query)) {
    
    $name = $get_details['Name'];
    $dob = $get_details['Dob'];
    $sex = $get_details['gender'];
    $contact = $get_details['Phone'];
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
    <link rel="stylesheet" href="./css/dashboard.css">
    <title>Digicard</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./main.php"><span class="text-brand">Digicard</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./main.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./cards.php">Cards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./history.php">History</a>
                    </li>
                </ul>
                <a class="btn btn-outline-danger mx-2 ms-0" href="./logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="profile-details bg-shadow-set p-3">
        <!-- dp  -->
        <div style="display: flex; justify-content: center;">
            <button id="dp_update_btn" type="button" class="btn btn-primary rounded-circle" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <p>Update Image</p>
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-light text-center mt-2">
            <!-- email -->
            <h4 class="text-warning"><?php echo $_SESSION['email'] ?></h4>
        </div>
        <hr class="text-light m-1">
        <div class="ms-4 text-light">
            <!-- name -->
            <p class="m-0 text-secondary">Name:</p>
            <?php
            if($name){
                echo '<h2>'.$name.'</h2>';
            }else {
                echo '<form action="./middleware/update_details.php" method="post"><input type="text" name="name" required class="update_form name"><button type="submit" class="btn btn-outline-warning ms-5">Update</button></form>';
            }
            ?>
        </div>
        <hr class="text-light m-1">
        <div class="ms-4 text-light">
            <!-- dob -->
            <p class="m-0 text-secondary">Date of Birth:</p>
            <?php
            if($dob){
                echo '<h2>'.$dob.'</h2>';
            }else {
                echo '<form action="./middleware/update_details.php" method="post"><input type="date" required name="dob" class="update_form dob"><button type="submit" class="btn btn-outline-warning ms-5">Update</button></form>';
            }
            ?>
        </div>
        <hr class="text-light m-1">
        <div class="ms-4 text-light">
            <!-- sex -->
            <p class="m-0 text-secondary">Sex:</p>
            <?php
            if($sex){
                echo '<h2>'.$sex.'</h2>';
            }else {
                echo '<form action="./middleware/update_details.php" method="post"><select type="text" name="sex" class="update_form sex">
                <option value="male" class="bg-dark">Male</option><option value="female" class="bg-dark">Female</option><option value="other" class="bg-dark">Other</option></select><button type="submit" class="btn btn-outline-warning ms-5">Update</button></form>';
            }
            ?>
        </div>
        <hr class="text-light m-1">
        <div class="ms-4 text-light">
            <!-- contact -->
            <p class="m-0 text-secondary">Contact:</p>
            <?php
            if($contact){
                echo '<h2>'.$contact.'</h2>';
            }else {
                echo '<form action="./middleware/update_details.php" method="post"><input type="number" max="9999999999" min="1000000000" required name="contact" class="update_form contact"><button type="submit" class="btn btn-outline-warning ms-5">Update</button></form>';
            }
            ?>
        </div>
        <hr class="text-light m-1">
        <div class="ms-4 text-light">
            <!-- cards -->
            <p class="m-0 text-secondary">Cards:</p>
            <?php
            $query = mysqli_query($con,"SELECT COUNT(id) AS ct FROM `card_details` WHERE Pid = (SELECT Pid FROM `profile` WHERE Email = '$email')");
            $res = mysqli_fetch_assoc($query);
            echo '<h2>'.$res['ct'].'</h2>';
            ?>
            </div>
    </div>

    <div id="cd1" class="card1 bg-shadow-set cc">
        <img src="./assets/chip.png" alt="" height="50px" width="50px">
        <h1 id="c-type">DIGI</h1>
        <h2>Credit Digicard</h2>
        <h1 id="c-num">1234 5678 9012 3456</h1>
        <p id="c-from">FROM : 01/01/2002</p>
        <p id="c-to">TO : 01/01/2022</p>
    </div>

    <div id="cd1" class="card1 bg-shadow-set idc">
        <img src="./assets/id.png" alt="" height="50px" width="50px">
        <h1 id="c-type">DIGI</h1>
        <h2>Digicard Id</h2>
        <h1 id="c-num">1BM20IS155</h1>
        <p id="c-from">FROM : 01/01/2002</p>
        <p id="c-to">TO : 01/01/2022</p>
    </div>

    <div class="nots bg-shadow-set">
        <h1 class="text-center text-light">Notifications</h1>
        <hr class="text-light mx-4">
        <?php
        $query = mysqli_query($con,"SELECT * FROM `notifications` WHERE Pid = (SELECT Pid FROM `profile` WHERE Email = '$email') ORDER BY time_stamp DESC;");

        while ($get_details = mysqli_fetch_assoc($query)) {
            $head = $get_details['head'];
            $msg = $get_details['msg'];
            $type = $get_details['type'];
        }
        ?>
        <div class="position-absolute top-50 start-50 translate-middle">
            <img src="./assets/empty.png" alt="" height="100px" width="100px">
            <h3 class="text-light text-center">Empty</h3>
        </div>
    </div>


    <div id="just-img1">
        <img src="./assets/main.png" alt="">
    </div>
    <div id="just-img2">
        <img src="./assets/main.png" alt="">
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>
