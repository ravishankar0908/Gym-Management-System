<?php

include_once("../database/connection.php");

$id = 0;
$update = false;
$edit = false;
$pname = "";
$price = "";
$quantity = "";
$description = "";

// inserting a new product
if (isset($_POST["addproducts"])) {
    $pname = $_POST["pname"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $category = $_POST["category"];
    $description = $_POST["disc"];
    $dir = "../product_images_uploaded/";
    $image = $dir . $_FILES["pimage"]["name"];

    $insert = "INSERT INTO product(pname,price,qty,category,disc,images) VALUES('$pname',$price,$quantity,'$category','$description','$image')";

    if ($con->query($insert)) {
        move_uploaded_file($_FILES["pimage"]["tmp_name"], $image);
    }

    $_SESSION["message"] = "product added successfully";
    $_SESSION["msgtype"] = "success";

    header("Location: ./add_products.php");
    exit();
}


// deleting the product
if (isset($_GET["deleteproduct"])) {
    $id = $_GET["deleteproduct"];
    $delete = "DELETE FROM product WHERE id='$id'";
    $con->query($delete);

    $_SESSION["message"] = "One product is deleted";
    $_SESSION["msgtype"] = "danger";

    header("Location: ./manage_products.php");
    exit();
}


// getting the id for the selected products
if (isset($_GET["editproduct"])) {
    $id = $_GET["editproduct"];
    $update = true;
    $select = "SELECT * FROM product WHERE id='$id'";
    $res = $con->query($select);

    if (mysqli_num_rows($res) > 0) {
        $row = $res->fetch_assoc();

        $pname = $row["pname"];
        $price = $row["price"];
        $quantity = $row["qty"];
        $category = $row["category"];
        $description = $row["disc"];
    }
}


// update or editing the product
if (isset($_POST["updateproducts"])) {
    $id = $_POST["id"];
    $pname = $_POST["pname"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $category = $_POST["category"];
    $description = $_POST["disc"];
    $dir = "../product_images_uploaded/";
    $image = $dir . $_FILES["pimage"]["name"];

    $update = "UPDATE product SET pname='$pname',price=$price,qty=$quantity,category='$category',disc='$description',images='$image' WHERE id='$id'";
    $con->query($update);


    if ($con->query($update)) {
        move_uploaded_file($_FILES["pimage"]["tmp_name"], $image);
    }

    $_SESSION["message"] = "product updated successfully";
    $_SESSION["msgtype"] = "success";

    header("Location: ./manage_products.php");
    exit();
}
