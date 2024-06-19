<?php

include("../database/connection.php");


$tname = "";
$tage = "";
$tmobile = "";
$temail = "";
$texp = "";
$tpass = "";
$trainertype = "";
$taddress = "";
$dob = "";
$update = false;


// trainers form insertion
if (isset($_POST["trainer"])) {
    $tname = $_POST["tname"];
    $tage = $_POST["tage"];
    $tmobile = $_POST["tmobile"];
    $temail = $_POST["temail"];
    $texp = $_POST["texperience"];
    $tpass = $_POST["tpass"];
    $trainertype = $_POST["trainerstype"];
    $taddress = $_POST["taddress"];
    $dob = $_POST["tdob"];
    $trainertype = $_POST["usertype"];


    $trainer = "INSERT INTO trainer(tname,tage,tmobile,temail,taddress,texp,tpass,trainertype) VALUES('$tname',$tage,'$tmobile','$temail','$taddress',$texp,'$tpass','$trainertype')";

    $con->query($trainer);

    $trianerid = $con->query("SELECT * FROM trainer");
    if (mysqli_num_rows($trianerid) > 0) {
        while ($row = $trianerid->fetch_assoc()) {
            $_SESSION["id"] = $row["id"];
        }
    }

    $tid = $_SESSION["id"];

    $reg = "INSERT INTO registration(username,email,dob,phone,address,pass,usertype,trainerid) VALUES('$tname','$temail','$dob','$tmobile','$taddress','$tpass','$trainertype',$tid)";

    $con->query($reg);

    $_SESSION["message"] = "New trainer is added";
    $_SESSION["msgtype"] = "success";

    header("Location: ./trainers.php");
    exit();
}

// delete trainer in trainer table
if (isset($_GET["deletetrainer"])) {
    $id = $_GET["deletetrainer"];

    $delete = "DELETE FROM trainer WHERE id='$id'";
    $con->query($delete);

    $_SESSION["message"] = "One trainer is deleted";
    $_SESSION["msgtype"] = "danger";
}

// update trainer in trainer table
if (isset($_POST["updatetrainer"])) {
    $id = $_POST["id"];
    $update = true;
    $tname = $_POST["tname"];
    $tage = $_POST["tage"];
    $tmobile = $_POST["tmobile"];
    $temail = $_POST["temail"];
    $texp = $_POST["texperience"];
    $tpass = $_POST["tpass"];
    $trainertype = $_POST["trainerstype"];
    $taddress = $_POST["taddress"];
    $dob = $_POST["tdob"];

    $update = "UPDATE trainer SET tname='$tname',tage=$tage,tmobile='$tmobile',temail='$temail',texp=$texp,tpass='$tpass',trainertype='$trainertype',taddress='$taddress',dob='$dob' WHERE id='$id'";
    $con->query($update);

    $_SESSION["message"] = "trainer is updated";
    $_SESSION["msgtype"] = "success";
}
