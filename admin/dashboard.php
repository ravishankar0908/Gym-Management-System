<?php include("db.php"); ?>
<?php include("./navbar.php"); ?>



<?php
if (isset($_SESSION["admin"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
    </head>

    <body>
        <div class="container mt-3">
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
            <h2>Dashboard</h2>
            <div class="dropdown-divider"></div>
            <div class="row">
                <!-- total no. of users registered -->
                <div class="col-4">
                    <div class="card">
                        <?php
                        $usercount = "SELECT * FROM registration WHERE usertype='user'";
                        $res = $con->query($usercount);
                        $row = mysqli_num_rows($res);
                        // $zero = "000" . $row;
                        ?>
                        <div class="card-body bg-primary text-white">
                            <h2 class="text-center">Total number of users</h2><br>
                            <h3 class="text-center"> <?php echo $row; ?></h3>
                        </div>
                    </div>
                </div>
                <!-- total no. of trainers -->
                <div class="col-4">
                    <div class="card">
                        <?php
                        $trainercount = "SELECT * FROM registration WHERE usertype='trainer'";
                        $res = $con->query($trainercount);
                        $row = mysqli_num_rows($res);
                        ?>
                        <div class="card-body bg-warning text-white">
                            <h2 class="text-center">Total number of trainers</h2><br>
                            <h3 class="text-center"> <?php echo $row; ?></h3>
                        </div>
                    </div>
                </div>
                <!-- total no. of members -->
                <div class="col-4">
                    <div class="card">
                        <?php
                        $membercount = "SELECT * FROM member";
                        $res = $con->query($membercount);
                        $row = mysqli_num_rows($res);
                        ?>
                        <div class="card-body bg-info text-white">
                            <h2 class="text-center">Total number of members</h2><br>
                            <h3 class="text-center"> <?php echo $row; ?></h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <!-- total no. of categories -->
                <div class="col-4">
                    <div class="card">
                        <?php
                        $categorycount = "SELECT * FROM category";
                        $res = $con->query($categorycount);
                        $row = mysqli_num_rows($res);
                        ?>
                        <div class="card-body bg-info text-white">
                            <h2 class="text-center">Total number of category</h2><br>
                            <h3 class="text-center"> <?php echo $row; ?></h3>
                        </div>
                    </div>
                </div>
                <!-- total no. of products -->
                <div class="col-4">
                    <div class="card">
                        <?php
                        $productcount = "SELECT * FROM product";
                        $res = $con->query($productcount);
                        $row = mysqli_num_rows($res);
                        ?>
                        <div class="card-body bg-primary text-white">
                            <h2 class="text-center">Total number of products</h2><br>
                            <h3 class="text-center"> <?php echo $row; ?></h3>
                        </div>
                    </div>
                </div>
                <!-- total no. of silver members -->
                <div class="col-4">
                    <div class="card">
                        <?php
                        $silvermembercount = "SELECT * FROM member WHERE membertype='membersilver'";
                        $res = $con->query($silvermembercount);
                        $row = mysqli_num_rows($res);
                        ?>
                        <div class="card-body bg-warning text-white">
                            <h2 class="text-center">Total number of silver member</h2><br>
                            <h3 class="text-center"> <?php echo $row; ?></h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-4">
                    <div class="card">
                        <?php
                        $orders = "SELECT * FROM orders";
                        $res = $con->query($orders);
                        $row = mysqli_num_rows($res);
                        ?>
                        <div class="card-body bg-warning text-white">
                            <h2 class="text-center">Total number of orders</h2><br>
                            <h3 class="text-center"> <?php echo $row; ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <?php
                        $goldmembercount = "SELECT * FROM member WHERE membertype='membergold'";
                        $res = $con->query($goldmembercount);
                        $row = mysqli_num_rows($res);
                        ?>
                        <div class="card-body bg-info text-white">
                            <h2 class="text-center">Total number of Gold member</h2><br>
                            <h3 class="text-center"> <?php echo $row; ?></h3>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card">
                        <?php
                        $contact = "SELECT * FROM contact";
                        $res = $con->query($contact);
                        $row = mysqli_num_rows($res);
                        ?>
                        <div class="card-body bg-primary text-white">
                            <h2 class="text-center">Total number of Queries</h2><br>
                            <h3 class="text-center"> <?php echo $row; ?></h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>

    </html>
<?php
} else {
    $_SESSION["message"] = "Access denied you do not have the permission";
    $_SESSION["msgtype"] = "danger";
    header("Location: ../index.php");
    exit();
}

?>