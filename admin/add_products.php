<?php include("db.php"); ?>
<?php include("productdb.php"); ?>
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
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-8">
                <h2>Add products</h2>
                <div class="card border-primary shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Add new products</h3>
                    </div>
                    <form action="./productdb.php" method="post" id="product" enctype="multipart/form-data">
                        <div class="card-body">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <label for="pname">Enter the product name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-tags"></i>
                                    </span>
                                </div>
                                <input type="text" name="pname" id="pname" class="form-control" placeholder="Enter the product name" value="<?php echo $pname; ?>">
                            </div>
                            <div id="errorpname"></div>
                            <br>

                            <label for="price">Enter the price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-indian-rupee-sign"></i>
                                    </span>
                                </div>
                                <input type="number" name="price" id="price" class="form-control" placeholder="Enter the price" value="<?php echo $price; ?>">
                            </div>
                            <div id="errorprice"></div>
                            <br>

                            <label for="quantity">Enter the quantity</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-arrow-up-wide-short"></i>
                                    </span>
                                </div>
                                <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Enter the quantity" value="<?php echo $quantity; ?>">
                            </div>
                            <div id="errorquantity"></div>
                            <br>


                            <label for="category">Select the category</label>
                            <div class="input-group">
                                <select name="category" id="category" class="form-control">
                                    <option value="category" selected disabled><?php if ($update == true) {
                                                                                    echo $category;
                                                                                } else {
                                                                                ?>
                                            Choose the category
                                        <?php
                                                                                } ?></option>
                                    <?php
                                    $res = $con->query("SELECT * FROM category");
                                    if (mysqli_num_rows($res) > 0) {
                                        while ($row = $res->fetch_assoc()) {
                                    ?>
                                            <option value="<?php echo $row["category_name"] ?>"><?php echo $row["category_name"] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div id="errorcategory"></div>
                            <br>

                            <label for="disc">Enter the product description</label>
                            <textarea name="disc" id="disc" cols="30" rows="5" class="form-control"><?php echo $description; ?></textarea>
                            <div id="errorpdesc"></div>
                            <br>



                            <div class="custom-file">
                                <input type="file" name="pimage" id="pimage" class="custom-file-input">
                                <label for="pimage" class="custom-file-label">Choose image</label>
                            </div>
                            <div id="errorpimage"></div>
                        </div>
                        <div class="card-footer">
                            <?php
                            if ($update == true) {
                            ?>
                                <input type="submit" value="update" name="updateproducts" class="btn btn-success btn-block">
                            <?php
                            } else {
                            ?>
                                <input type="submit" value="Add product" name="addproducts" class="btn btn-primary">
                                <input type="reset" value="clear" class="btn btn-danger">
                            <?php
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var pname = document.getElementById("pname")
        var errorpname = document.getElementById("errorpname")
        var price = document.getElementById("price")
        var errorprice = document.getElementById("errorprice")
        var quantity = document.getElementById("quantity")
        var errorquantity = document.getElementById("errorquantity")
        var category = document.getElementById("category")
        var errorcategory = document.getElementById("errorcategory")
        var form = document.getElementById("product")
        var productdesc = document.getElementById("disc")
        var errorproduct = document.getElementById("errorpdesc")
        var pimage = document.getElementById("pimage")
        var errorpimage = document.getElementById("errorpimage")

        form.addEventListener("submit", (e) => {
            if (pname.value === "" || price.value === "" || quantity.value === "" || category.value === "category" || productdesc.value === "") {
                e.preventDefault()

                pname.style.border = "1px solid red"
                errorpname.innerHTML = "Enter the product name"
                errorpname.style.color = "red"
                errorpname.style.fontSize = "small"

                price.style.border = "1px solid red"
                errorprice.innerHTML = "Enter the product name"
                errorprice.style.color = "red"
                errorprice.style.fontSize = "small"

                quantity.style.border = "1px solid red"
                errorquantity.innerHTML = "Enter the product name"
                errorquantity.style.color = "red"
                errorquantity.style.fontSize = "small"

                category.style.border = "1px solid red"
                errorcategory.innerHTML = "select the product name"
                errorcategory.style.color = "red"
                errorcategory.style.fontSize = "small"

                productdesc.style.border = "1px solid red"
                errorproduct.innerHTML = "Enter the product name"
                errorproduct.style.color = "red"
                errorproduct.style.fontSize = "small"

                pimage.style.border = "1px solid red"
                errorpimage.innerHTML = "select the image"
                errorpimage.style.color = "red"
                errorpimage.style.fontSize = "small"
            }

            if (pname.value != "") {
                pname.style.border = "1px solid green"
                errorpname.innerHTML = ""
            }

            if (price.value != "") {
                price.style.border = "1px solid green"
                errorprice.innerHTML = ""
            }

            if (quantity.value != "") {
                quantity.style.border = "1px solid green"
                errorquantity.innerHTML = ""
            }

            if (category.value != "category") {
                category.style.border = "1px solid green"
                errorcategory.innerHTML = ""
            }

            if (productdesc.value != "") {
                productdesc.style.border = "1px solid green";
                errorproduct.innerHTML = ""
            }
        })
    </script>
</body>

</html>