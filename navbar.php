<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <ul class="navbar-nav ml-auto">
                    <?php
                    if (!isset($_SESSION["user"])) {
                    ?>
                        <li class="nav-item">
                            <button class="btn btn-primary btn-sm mt-2" data-target="#register" data-toggle="modal">Register here</button>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item dropdown">
                            <div class="dropdown mt-2">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                    <?php echo $_SESSION["username"]; ?>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="./myorders.php">My orders</a>
                                    <?php
                                    if (isset($_SESSION["member"])) {
                                    ?>
                                        <a class="dropdown-item disabled" href="#">you already have membership</a>
                                    <?php
                                    } else {
                                    ?>
                                        <button class="btn btn-success btn-sm ml-3 mt-2" data-target="#member" data-toggle="modal">Join course</button>
                                    <?php
                                    }

                                    ?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="./logout.php">Logout</a>
                                </div>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="nav-item">
                        <a href="./products/product.php" class="nav-link">Our Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="./index.php" class="nav-link">Home</a>
                    </li>


                </ul>
            </div>
        </nav>
</body>

</html>