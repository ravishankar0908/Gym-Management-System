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
            <h2>Sales report</h2>
            <div class="dropdown-divider"></div>

            <table class="table table-bordered ">
                <tr class="text-center">
                    <th>Product Name</th>
                    <th>Items Quantity</th>
                </tr>
                <?php
                $res = $con->query("SELECT * FROM sales");
                if (mysqli_num_rows($res)) {
                    while ($row = $res->fetch_assoc()) {
                ?>
                        <tr class="text-center">
                            <td><?php echo $row["pname"]; ?></td>
                            <td><?php echo $row["qty"] . " ordered"; ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </table>

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