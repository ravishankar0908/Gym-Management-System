<?php include("./database/connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./fontawesome/css/all.css">
    <link rel="shortcut icon" href="./assets/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-xl navbar-dark bg-dark fixed-top">
            <a href="#" class="navbar-brand">
                <img src="./assets/logo.jpg" height="30" width="30" class="d-inline-block rounded-circle">
                DBR Fitness Center
            </a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="./index.php" class="nav-link">Home</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <?php
    $userid = $_SESSION["userid"];
    $res = $con->query("SELECT * FROM registration WHERE id=$userid");
    if (mysqli_num_rows($res) > 0) {
        while ($row = $res->fetch_assoc()) {
            $name = $row["username"];
            $email = $row["email"];
            $dob = $row["dob"];
            $phone = $row["phone"];
            $address = $row["address"];
        }
    }
    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-7">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3>profile</h3>
                            </div>
                            <div class="card-body text-center">
                                <h4><b>Name :</b> <?php echo $name ?></h4><br>
                                <div class="dropdown-divider"></div>
                                <h4><b>Email :</b> <?php echo $email ?></h4><br>
                                <div class="dropdown-divider"></div>
                                <h4><b>D.O.B :</b> <?php echo $dob ?></h4><br>
                                <div class="dropdown-divider"></div>
                                <h4><b>Phone number :</b> <?php echo $phone ?></h4><br>
                                <div class="dropdown-divider"></div>
                                <h4><b>Address :</b> <?php echo $address ?></h4><br>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="./bootstrap/js/Jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>

</html>