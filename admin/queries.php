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
        <h2>Manage Queries</h2>
        <div class="dropdown-divider"></div>

        <div class="row mt-3">
            <div class="col-12">
                <table class="table table-bordered">
                    <tr>
                        <th>customer name</th>
                        <th>customer email</th>
                        <th>cutomer mobile</th>
                        <th>customer message</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM contact";
                    $res = $con->query($sql);

                    if (mysqli_num_rows($res) > 0) {
                        while ($row = $res->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $row["cname"]; ?></td>
                                <td><?php echo $row["cemail"]; ?></td>
                                <td><?php echo $row["cphone"]; ?></td>
                                <td><?php echo $row["mes"]; ?></td>
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