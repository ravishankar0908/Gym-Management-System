<?php include("db.php"); ?>
<?php include("./navbar.php"); ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage trainers</title>
</head>

<body>
    <div class="container mt-3">
        <h2>Manage trainers</h2>
        <div class="dropdown-divider"></div>

        <div class="row mt-3">
            <div class="col-12">
                <table class="table table-bordered">
                    <tr>
                        <th>Trainer name</th>
                        <th>Trainer age</th>
                        <th>Trainer mobile</th>
                        <th>Trainer email</th>
                        <th>Trainer address</th>
                        <th>Trainer experience</th>
                        <th>Trainer type</th>
                        <th class="text-center">Action</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM trainer";
                    $res = $con->query($sql);

                    if (mysqli_num_rows($res) > 0) {
                        while ($row = $res->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $row["tname"]; ?></td>
                                <td><?php echo $row["tage"]; ?></td>
                                <td><?php echo $row["tmobile"]; ?></td>
                                <td><?php echo $row["temail"]; ?></td>
                                <td><?php echo $row["taddress"]; ?></td>
                                <td><?php echo $row["texp"]; ?></td>
                                <td><?php echo $row["trainertype"]; ?></td>

                                <td><a href="./managetrainers.php?deletetrainer=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a></td>
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