<?php include("./productnavbar.php"); ?>
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

    <div class="container-fluid mt-5">
        <div class="row mt-5">
            <?php
            $product = "SELECT * FROM product";
            $res = $con->query($product);

            if (mysqli_num_rows($res) > 0) {
                while ($row = $res->fetch_assoc()) {
                    $_SESSION["pname"] = $row["pname"];
                    $_SESSION["price"] = $row["price"];
            ?>
                    <div class="col-3 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <img src="<?php echo $row["images"]; ?>" height="350" width="365"><br><br>
                                <?php
                                echo $_SESSION["pname"] . "<br>";
                                echo "Rs." . $_SESSION["price"] . "<br>";
                                echo "product description :" . "<br>";
                                echo $row["disc"];
                                ?>
                            </div>
                        </div>

                        <div class="card-footer">
                            <?php
                            if (isset($_SESSION["userid"])) {
                            ?>
                                <a type="button" href="./payment.php?buyproduct=<?php echo $row["id"]; ?>" class="btn btn-primary">buy</a>
                            <?php
                            } else {
                            ?>
                                <a type="button" href="./payment.php?buy=<?php echo $row["id"]; ?>" class="btn btn-primary disabled">buy</a>
                                <h5>you need to login</h5>
                            <?php
                            }
                            ?>
                        </div>
                    </div><br>
            <?php
                }
            }
            ?>
        </div>
    </div>




    <script src="../bootstrap/js/Jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>