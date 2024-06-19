<?php include("./database/connection.php"); ?>

<?php

if (isset($_GET["cancel"])) {
    $id = $_GET["cancel"];

    $con->query("UPDATE orders SET pstatus='canceled' WHERE orderid=$id");

    $_SESSION["message"] = "order has been canceled";
    $_SESSION["msgtype"] = "danger";

    header("Location: ./myorders.php");
    exit();
}

?>
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

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <?php
                if (isset($_SESSION["message"])) {
                ?>
                    <div class="alert alert-<?php echo $_SESSION["msgtype"]; ?> text-center mt-5">
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
                <h2 class="mt-5">Your orders :</h2>

                <table class="table table-bordered mt-5">
                    <tr class="text-center">
                        <th>product name</th>
                        <th>product price</th>
                        <th>product description</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $userid = $_SESSION["userid"];
                    $res = $con->query("SELECT * FROM orders WHERE userid=$userid");
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = $res->fetch_assoc()) {
                            $status = $row["pstatus"];
                    ?>
                            <tr class="text-center">
                                <td><?php echo $row["pname"]; ?></td>
                                <td><?php echo $row["price"]; ?></td>
                                <td><?php echo $row["pdesc"]; ?></td>
                                <td <?php if ($status === "canceled") { ?>class="text-danger" <?php } else { ?>class="text-success" <?php } ?>><b><?php echo $status; ?></b></td>

                                <td><a href="./myorders.php?cancel=<?php echo $row["orderid"] ?>" class="btn btn-danger <?php if ($status === "canceled") { ?> disabled <?php } ?>">Cancel</a></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>


    <script src="./bootstrap/js/Jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>

</html>