<?php include("./navbar.php"); ?>
<?php include("trainerdb.php"); ?>

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
        <h2>New category</h2>
        <div class="dropdown-divider"></div>
        <form action="./trainerdb.php" method="post">
            <div class="card">
                <div class="card-header">
                    <h3>trainer</h3>
                </div>
                <div class="card-body">
                    <input type="hidden" name="usertype" value="trianer">
                    <label for="tname">triner name</label>
                    <input type="text" name="tname" id="tname" class="form-control">
                    <br>
                    <label for="tpass">triner password</label>
                    <input type="password" name="tpass" id="tpass" class="form-control">
                    <br>
                </div>
                <div class="card-footer">
                    <input type="submit" value="submit" class="btn btn-primary" name="trainer">
                </div>
            </div>
        </form>
    </div>
</body>

</html>