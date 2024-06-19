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
        <h2>New category</h2>
        <div class="dropdown-divider"></div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card mt-3 border-primary shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">New category</h3>
                    </div>
                    <form action="./db.php" method="post" id="category" enctype="multipart/form-data">
                        <div class="card-body">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <label for="name">Category name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Category name" value="<?php echo $name; ?>">
                            </div>
                            <div id="errorname"></div>
                            <br>

                            <label for="desc">Category Description</label>
                            <textarea name="desc" id="desc" cols="30" rows="5" class="form-control"><?php echo $desc; ?></textarea>
                            <div id="errordesc"></div>
                        </div>
                        <div class="card-footer">
                            <?php
                            if ($update == true) {
                            ?>
                                <input type="submit" name="updatecategory" value="Update" class="btn btn-success btn-block">
                            <?php
                            } else {
                            ?>
                                <input type="submit" value="Add" name="category" class="btn btn-primary">
                                <input type="reset" value="clear" class="btn btn-danger">
                            <?php
                            }
                            ?>

                        </div>
                    </form>
                </div>
            </div>

            <div class="col-sm-6">
                <table class="table table-bordered mt-3 shadow">
                    <tr>
                        <th>Category</th>
                        <th>Discription</th>
                        <th colspan="2" class="text-center">Action</th>
                    </tr>

                    <?php
                    $query = "SELECT * FROM category";
                    $res = $con->query($query);
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = $res->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $row["category_name"]; ?></td>
                                <td><?php echo $row["description"]; ?></td>

                                <td class="text-center"><a href="category.php?edit=<?php echo $row["id"]; ?>" class="btn btn-success btn-sm">Edit</a></td>
                                <td class="text-center"><a href="category.php?delete=<?php echo $row["id"]; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
    <script>
        var catename = document.getElementById("name");
        var errorname = document.getElementById("errorname")
        var description = document.getElementById("desc");
        var errordesc = document.getElementById("errordesc")
        var form = document.getElementById("category");

        form.addEventListener("submit", (e) => {
            if (catename.value === "" || description.value === "") {
                e.preventDefault()

                catename.style.border = "1px solid red"
                errorname.innerHTML = "Enter the category name"
                errorname.style.color = "red"
                errorname.style.fontSize = "small"

                description.style.border = "1px solid red"
                errordesc.innerHTML = "Enter the description"
                errordesc.style.color = "red";
                errordesc.style.fontSize = "small"
            }

            if (catename.value != "") {
                catename.style.border = "1px solid green"
                errorname.innerHTML = ""
            }

            if (description.value != "") {
                description.style.border = "1px solid green"
                errordesc.innerHTML = ""
            }
        })
    </script>
</body>

</html>