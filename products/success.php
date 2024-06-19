<?php include("productnavbar.php"); ?>
<?php include("../database/connection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">
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

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 mt-5">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h3>payment successfull</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        $pid = $_SESSION["pid"];
                        $res = $con->query("SELECT * FROM product WHERE id=$pid");
                        while ($row = $res->fetch_assoc()) {
                            $productname = $row["pname"];
                            $price = $row["price"];
                            $description = $row["disc"];
                        }
                        ?>
                        <h4><b>product name</b> : <?php echo $productname; ?></h4><br>
                        <h4><b>product price</b> : <?php echo $price; ?></h4><br>
                        <h4><b>product description</b> : <?php echo $description; ?></h4><br>
                    </div>
                    <div class="card-footer">
                        <a href="product.php" class="btn btn-success">Go back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>