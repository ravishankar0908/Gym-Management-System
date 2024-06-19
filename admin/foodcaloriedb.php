<?php

include("../database/connection.php");


if (isset($_POST["fooditems"])) {
    $food = $_POST["food"];
    $foodcalories = $_POST["foodcalorie"];

    $food = "INSERT INTO trackcalories(foodname,calories) VALUES('$food',$foodcalories)";
    $con->query($food);

    $_SESSION["message"] = "food calorie inserted successfully";
    $_SESSION["msgtype"] = "success";

    header("Location: ./foodcalories.php");
    exit();
}
