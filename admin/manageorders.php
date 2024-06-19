<?php include("db.php"); ?>
<?php include("./navbar.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <h2>manage orders</h2>
        <div class="dropdown-divider"></div>

        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <tr class="text-center">
                        <th>User id</th>
                        <th>Product name</th>
                        <th>Price</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                    </tr>
                    <?php
                    $res = $con->query("SELECT * FROM orders");
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = $res->fetch_assoc()) {
                            $status = $row["pstatus"];
                    ?>
                            <tr class="text-center">
                                <td><?php echo $row["userid"]; ?></td>
                                <td><?php echo $row["pname"]; ?></td>
                                <td><?php echo $row["price"]; ?></td>
                                <td><?php echo $row["deliveryaddress"]; ?></td>
                                <td <?php if ($status === "canceled") { ?>class="text-danger" <?php } else { ?>class="text-success" <?php } ?>><?php echo $status; ?></td>

                                <td><a href="manageorders.php?approve=<?php echo $row["orderid"]; ?>" class="btn btn-success <?php if ($status === "canceled") { ?> disabled <?php } elseif ($status === "delivered") { ?> disabled <?php } ?>">Approve</a></td>

                                <td><a href="manageorders.php?cancel=<?php echo $row["orderid"]; ?>" class="btn btn-danger <?php if ($status === "canceled") { ?> disabled <?php } elseif ($status === "delivered") { ?> disabled <?php } ?>">cancel</a></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>