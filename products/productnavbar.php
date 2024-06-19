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

                    <li class="nav-item">
                        <a href="../index.php" class="nav-link">Go home</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        <?php
        if (isset($_SESSION["message"])) {
        ?>
            <div class="alert alert-<?php echo $_SESSION["msgtype"]; ?> text-center">
                <?php
                echo $_SESSION["message"];
                unset($_SESSION["message"]);
                ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fas fa-xmark mt-1"></i>
                </button>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>