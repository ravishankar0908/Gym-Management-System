<?php

include("../database/connection.php");

if (isset($_GET["buyproduct"])) {
    $_SESSION["pid"] = $_GET["buyproduct"];
}

if (isset($_POST["pay"])) {
    $cardnumber = $_POST["cardnumber"];
    $expirydate = $_POST["expirydate"];
    $cvvnumber = $_POST["cvv"];
    $deliverto = $_POST["deliverto"];

    $pid = $_SESSION["pid"];
    $userid = $_SESSION["userid"];
    $status = "shipped";

    $qty = 1;

    $product = $con->query("SELECT * FROM product WHERE id=$pid");
    if (mysqli_num_rows($product)) {
        while ($row = $product->fetch_assoc()) {
            $price = $row["price"];
            $pname = $row["pname"];
            $pdesc = $row["disc"];
        }
    }

    $orders = "INSERT INTO orders(pid,pname,pdesc,userid,price,cardnumber,expirydate,cvvnumber,deliveryaddress,pstatus) VALUES($pid,'$pname','$pdesc',$userid,$price,$cardnumber,'$expirydate',$cvvnumber,'$deliverto','$status')";


    $sales = $con->query("SELECT * FROM sales WHERE pid=$pid");
    if (mysqli_num_rows($sales) > 0) {
        while ($row = $sales->fetch_assoc()) {
            $qty = $row["qty"] + 1;
        }
        $con->query("UPDATE sales SET qty=$qty WHERE pid=$pid");
    } else {
        $con->query("INSERT INTO sales(pid,pname,qty) VALUES($pid,'$pname',$qty)");
    }


    $con->query($orders);

    header("Location: success.php");
    exit();
}
