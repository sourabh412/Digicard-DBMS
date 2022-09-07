<?php
include('config.php');
$email = $_SESSION['email'];
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
                        <a class="nav-link" href="./dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./cards.php">Cards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">History</a>
                    </li>
                </ul>
                <a class="btn btn-outline-danger mx-2 ms-0" href="./logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="table-responsive text-light">
    <table class="table table-striped table-dark table-hover" cellpadding="10">
        <thead>
            <th>#</th>
            <th>Card Name</th>
            <th>Card No.</th>
            <th>Valid</th>
            <th>Time Stamp</th>
        </thead>
        <tbody class="p-5">
        <?php
        $query = mysqli_query($con,"SELECT DISTINCT card_name,comp_name,card_num,from_date,to_date,history.time_stamp AS ts FROM `card_details` INNER JOIN `history` ON card_details.Pid = history.Pid AND card_details.Id = history.Card_id WHERE card_details.Pid = (SELECT Pid FROM `profile` WHERE Email = '$email') ORDER BY history.time_stamp DESC");
        $ct = mysqli_num_rows($query);
        if ($ct == 0) {
            echo '
            <div class="position-absolute top-50 start-50 translate-middle">
                <img src="./assets/empty.png" alt="" height="100px" width="100px">
                <h3 class="text-light text-center">Empty</h3>
            </div>
            ';
        }else{
        $i = 1;
            while ($get_details = mysqli_fetch_assoc($query)) {
                $card_name = $get_details['card_name'];
                $comp_name = $get_details['comp_name'];
                $card_num = $get_details['card_num'];
                $from_date = $get_details['from_date'];
                $to_date = $get_details['to_date'];
                $ts = $get_details['ts'];
                
                echo'
                <tr>
                    <td>'.$i.'</td>
                    <td>'.$card_name.'&emsp;<b>'.$comp_name.'</b></td>
                    <td>'.$card_num.'</td>
                    <td>'.$from_date.'  to  '.$to_date.'</td>
                    <td>'.$ts.'</td>
                </tr>';
                
                $i++;
            }
        }
        ?>
        </tbody>
    </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>