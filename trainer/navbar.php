<?php include("../database/connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="shortcut icon" href="../assets/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
    <title>product</title>
</head>

<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-xl navbar-dark bg-dark fixed-top">
            <a href="#" class="navbar-brand">
                <img src="../assets/logo.jpg" height="30" width="30" class="d-inline-block rounded-circle">
                DBR Fitness Center
            </a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <div class="dropdown mt-2">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                <?php echo "Welcome MR." . $_SESSION["username"]; ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="../logout.php">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <?php
    $tname = $_SESSION["username"];

    $trainer = $con->query("SELECT * FROM trainer WHERE tname='$tname'");
    if (mysqli_num_rows($trainer) > 0) {
        while ($row = $trainer->fetch_assoc()) {
            $_SESSION["salary"] = $row["salary"];
        }
    }
    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 mt-5">
                <h3>Current salary : <span class="text-success"><?php echo $_SESSION["salary"]; ?></span></h3>
                <table class="table table-bordered mt-3">
                    <tr class="text-center">
                        <th>Member name</th>
                        <th>member type</th>
                    </tr>
                    <?php
                    $res = $con->query("SELECT * FROM member WHERE trainer='$tname'");
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = $res->fetch_assoc()) {
                    ?>
                            <tr class="text-center">
                                <td><?php echo $row["username"]; ?></td>
                                <td><?php echo $row["membertype"]; ?></td>

                            </tr>
                    <?php
                        }
                    } else {
                        echo "<b>you have no Members</b>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>



    <script src="../bootstrap/js/Jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>