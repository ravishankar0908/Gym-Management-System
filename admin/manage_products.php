<?php include("db.php"); ?>
<?php include("navbar.php"); ?>

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
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>

        <h2>Manage products</h2>
        <table class="table table-bordered shadow">
            <tr>
                <th>Product name</th>
                <th>Price</th>
                <th>stock</th>
                <th>category</th>
                <th>Description</th>
                <th>image</th>
                <th colspan="2" class="text-center">Action</th>
            </tr>

            <?php
            $res = $con->query("SELECT * FROM product");
            if (mysqli_num_rows($res) > 0) {
                while ($row = $res->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $row["pname"]; ?></td>
                        <td><?php echo $row["price"]; ?></td>
                        <td><?php echo $row["qty"]; ?></td>
                        <td><?php echo $row["category"]; ?></td>
                        <td><?php echo $row["disc"]; ?></td>
                        <td><img src="<?php echo $row["images"]; ?>" height="50" width="50"></td>
                        <td class="text-center"><a href="./add_products.php?editproduct=<?php echo $row["id"]; ?>" class="btn btn-success">Edit</a></td>
                        <td class="text-center"><a href="./productdb.php?deleteproduct=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</body>

</html>