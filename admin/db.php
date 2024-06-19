<?php

include("../database/connection.php");

$id = 0;
$update = false;
$name = "";
$desc = "";
$edit = false;
$pname = "";
$price = "";
$quantity = "";
$description = "";



if (isset($_POST["category"])) {
    $name = $_POST["name"];
    $desc = $_POST["desc"];

    $query = "INSERT INTO category(category_name,description) VALUES('$name','$desc')";
    $con->query($query);

    $_SESSION["message"] = "New category is added";
    $_SESSION["msgtype"] = "success";

    header("Location: ./category.php");
    exit();
}

// deleting the category
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $delete = "DELETE FROM category WHERE id='$id'";
    $con->query($delete);

    $_SESSION["message"] = "One category is deleted";
    $_SESSION["msgtype"] = "danger";
}


// getting the id for the selected product category
if (isset($_GET["edit"])) {
    $id = $_GET["edit"];
    $update = true;
    $select = "SELECT * FROM category WHERE id='$id'";
    $res = $con->query($select);

    if (mysqli_num_rows($res) > 0) {
        $row = $res->fetch_assoc();

        $name = $row["category_name"];
        $desc = $row["description"];
    }
}

// update or editing the product category
if (isset($_POST["updatecategory"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $desc = $_POST["desc"];

    $update = "UPDATE category SET categoryname='$name',description='$desc' WHERE id='$id'";
    $con->query($update);

    $_SESSION["message"] = "category is updated";
    $_SESSION["msgtype"] = "success";

    header("Location: ./category.php");
    exit();
}


// managing orders

if (isset($_GET["cancel"])) {
    $id = $_GET["cancel"];

    $con->query("UPDATE orders SET pstatus='canceled' WHERE orderid=$id");

    $_SESSION["message"] = "order has been canceled";
    $_SESSION["msgtype"] = "danger";


    header("Location: ./manageorders.php");
    exit();
}

if (isset($_GET["approve"])) {
    $id = $_GET["approve"];

    $con->query("UPDATE orders SET pstatus='delivered' WHERE orderid=$id");

    $_SESSION["message"] = "orders has been approved";
    $_SESSION["msgtype"] = "success";


    header("Location: ./manageorders.php");
    exit();
}
