<?php

include("./database/connection.php");

$id = 0;
$name = "";
$email = "";
$date = "";
$phone = "";
$address = "";
$password = "";

if (isset($_POST["register"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $date = $_POST["date"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $usertype = $_POST["usertype"];

    $res = $con->query("SELECT * FROM registration WHERE email='$email'");

    if (mysqli_num_rows($res)) {
        $_SESSION["message"] = "email is already taken";
        $_SESSION["msgtype"] = "warning";

        header("Location: index.php");
        exit();
    } else {
        $insert = "INSERT INTO registration(username,email,dob,phone,address,pass,usertype) VALUES('$name','$email','$date','$phone','$address','$password','$usertype')";

        $con->query($insert);

        $_SESSION["message"] = "registration successful and you are logged in";
        $_SESSION["msgtype"] = "success";

        $_SESSION["username"] = $name;

        $res = $con->query("SELECT * FROM registration WHERE email='$email'");
        if (mysqli_num_rows($res) > 0) {
            while ($row = $res->fetch_assoc()) {
                $_SESSION["user"] = true;
                $_SESSION["userid"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["address"] = $row["address"];
            }
        }

        header("Location: ./index.php");
        exit();
    }
}


if (isset($_POST["loginbtn"])) {

    $email = $_POST["Lemail"];
    $password = $_POST["Lpassword"];

    $check = "SELECT * FROM registration WHERE email='$email' AND pass='$password'";
    $res = $con->query($check);

    if (mysqli_num_rows($res) > 0) {
        while ($row = $res->fetch_assoc()) {
            if ($row["email"] === $email && $row["pass"] === $password) {
                $_SESSION["username"] = $row["username"];
                if ($row["usertype"] === "admin") {
                    $_SESSION["admin"] = true;

                    $_SESSION["message"] = "admin logged in";
                    $_SESSION["msgtype"] = "success";

                    header("Location: ./admin/dashboard.php");
                    exit();
                } elseif ($row["usertype"] === "user") {
                    $_SESSION["user"] = true;
                    $_SESSION["userid"] = $row["id"];
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["address"] = $row["address"];

                    $sel = "SELECT * FROM member";
                    $res = $con->query($sel);
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = $res->fetch_assoc()) {
                            $_SESSION["memuserid"] = $row["userid"];

                            if ($_SESSION["userid"] === $_SESSION["memuserid"]) {
                                $_SESSION["member"] = true;
                            }
                        }
                    }

                    $_SESSION["message"] = "you are logged in";
                    $_SESSION["msgtype"] = "success";
                    header("Location: ./index.php");
                    exit();
                } elseif ($row["usertype"] === "trainer") {
                    $_SESSION["trainer"] = true;

                    $_SESSION["tname"] = $row["tname"];

                    $_SESSION["message"] = "trainer logged In";
                    $_SESSION["msgtype"] = "success";

                    header("Location: ./trainer/navbar.php");
                    exit();
                } else {
                    $_SESSION["message"] = "invalid username or password";
                    $_SESSION["msgtype"] = "danger";

                    header("Location: ./index.php");
                    exit();
                }
            }
        }
    } else {
        $_SESSION["message"] = "invalid username or password";
        $_SESSION["msgtype"] = "danger";

        header("Location: ./index.php");
        exit();
    }
}




if (isset($_POST["paynow"])) {
    $memtype = $_POST["membertype"];
    $cardno = $_POST["cardno"];
    $expdate = $_POST["expdate"];
    $cvv = $_POST["cvvno"];

    $userid = $_SESSION["userid"];
    $username = $_SESSION["username"];

    $trainer = $_POST["trainer"];


    $insert = "INSERT INTO member(userid,username,membertype,cardno,expdate,cvv,trainer) VALUES($userid,'$username','$memtype','$cardno','$expdate',$cvv,'$trainer')";
    $con->query($insert);

    $res = $con->query("SELECT * FROM trainer WHERE tname='$trainer'");
    if (mysqli_num_rows($res) > 0) {
        while ($row = $res->fetch_assoc()) {
            if ($memtype === "membersilver") {
                $cursalary = 1000;
                $newsalary = $row["salary"] + $cursalary;
                $con->query("UPDATE trainer SET salary=$newsalary WHERE tname='$trainer'");
            } elseif ($memtype === "membergold") {
                $cursalary = 2000;
                $newsalary = $row["salary"] + $cursalary;
                $con->query("UPDATE trainer SET salary=$newsalary WHERE tname='$trainer'");
            }
        }
    }

    $_SESSION["message"] = "you become a member";
    $_SESSION["msgtype"] = "success";
    $_SESSION["member"] = true;

    header("Location: ./index.php");
    exit();
}


if (isset($_POST["mcl"])) {
    $weight = $_POST["weight"];
    $lifestyle = $_POST["lifestyle"];

    $baseline_multiplier = $weight * 22;

    if ($lifestyle === "sedentary") {
        $val1 = $baseline_multiplier * 1.3;
        $val2 = $baseline_multiplier * 1.6;

        $total_cal = ($val1 + $val2) / 2;
        $_SESSION["totalcal"] = $total_cal;
    }


    if ($lifestyle === "lightlyactive") {
        $val1 = $baseline_multiplier * 1.5;
        $val2 = $baseline_multiplier * 1.8;

        $total_cal = ($val1 + $val2) / 2;
        $_SESSION["totalcal"] = $total_cal;
    }


    if ($lifestyle === "active") {
        $val1 = $baseline_multiplier * 1.7;
        $val2 = $baseline_multiplier * 2.0;

        $total_cal = ($val1 + $val2) / 2;
        $_SESSION["totalcal"] = $total_cal;
    }

    if ($lifestyle === "veryactive") {
        $val1 = $baseline_multiplier * 1.9;
        $val2 = $baseline_multiplier * 2.2;

        $total_cal = ($val1 + $val2) / 2;
        $_SESSION["totalcal"] = $total_cal;
    }

    header("Location: ./index.php#goals");
    exit();
}

if (isset($_GET["unmember"])) {
    $userid = $_GET["unmember"];

    $con->query("DELETE FROM member WHERE userid=$userid");
    $_SESSION["message"] = "you are not member anymore";
    $_SESSION["msgtype"] = "danger";
    unset($_SESSION["member"]);

    header("Location: ./index.php");
    exit();
}

if (isset($_POST["contact"])) {
    $customername = $_POST["customername"];
    $customeremail = $_POST["customeremail"];
    $message = $_POST["message"];
    $phone = $_POST["customerphone"];

    $con->query("INSERT INTO contact(cname,cemail,cphone,mes) VALUES('$customername','$customeremail','$phone','$message')");

    $_SESSION["message"] = "message sent successfully";
    $_SESSION["msgtype"] = "success";

    header("Location: ./index.php");
    exit();
}


if (isset($_POST["exercise"])) {
    $customername = $_POST["customername"];
    $exercisename = $_POST["exercisename"];
    $exercisetype = $_POST["exercisetype"];
    $duration = $_POST["duration"];

    if ($exercisename === "running") {
        if ($exercisetype === "slow") {
            $cal = (2 * $duration) / 10 . " calories burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "moderate") {
            $cal = (3 * $duration) / 10 . " calories burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "vigourous") {
            $cal = (4 * $duration) / 10 . " calories burned";
            $_SESSION["cal"] = $cal;
        }
    }

    if ($exercisename === "walking") {
        if ($exercisetype === "slow") {
            $cal = (1 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "moderate") {
            $cal = (2 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "vigourous") {
            $cal = (3 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        }
    }

    if ($exercisename === "swimming") {
        if ($exercisetype === "slow") {
            $cal = (3 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "moderate") {
            $cal = (4 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "vigourous") {
            $cal = (5 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        }
    }

    if ($exercisename === "cycling") {
        if ($exercisetype === "slow") {
            $cal = (2 * $duration) / 10 . "calories burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "moderate") {
            $cal = (3 * $duration) / 10 . "calories burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "vigourous") {
            $cal = (4 * $duration) / 10 . "calories burned";
            $_SESSION["cal"] = $cal;
        }
    }

    if ($exercisename === "skipping") {
        if ($exercisetype === "slow") {
            $cal = (2 * $duration) / 10 . "calories burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "moderate") {
            $cal = (3 * $duration) / 10 . "calories burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "vigourous") {
            $cal = (4 * $duration) / 10 . "calories burned";
            $_SESSION["cal"] = $cal;
        }
    }

    if ($exercisename === "jumpingjacks") {
        if ($exercisetype === "slow") {
            $cal = (2 * $duration) / 10 . "calories burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "moderate") {
            $cal = (3 * $duration) / 10 . "calories burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "vigourous") {
            $cal = (4 * $duration) / 10 . "calories burned";
            $_SESSION["cal"] = $cal;
        }
    }

    if ($exercisename === "highknees") {
        if ($exercisetype === "slow") {
            $cal = (3 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "moderate") {
            $cal = (4 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "vigourous") {
            $cal = (5 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        }
    }

    if ($exercisename === "burpees") {
        if ($exercisetype === "slow") {
            $cal = (3 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "moderate") {
            $cal = (4 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "vigourous") {
            $cal = (5 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        }
    }

    if ($exercisename === "stepup") {
        if ($exercisetype === "slow") {
            $cal = (2 * $duration) / 10 . "calories burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "moderate") {
            $cal = (3 * $duration) / 10 . "calories burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "vigourous") {
            $cal = (4 * $duration) / 10 . "calories burned";
            $_SESSION["cal"] = $cal;
        }
    }

    if ($exercisename === "pushup") {
        if ($exercisetype === "slow") {
            $cal = (2 * $duration) / 10 . "calories burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "moderate") {
            $cal = (3 * $duration) / 10 . "calories burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "vigourous") {
            $cal = (4 * $duration) / 10 . "calories burned";
            $_SESSION["cal"] = $cal;
        }
    }

    if ($exercisename === "pullup") {
        if ($exercisetype === "slow") {
            $cal = (3 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "moderate") {
            $cal = (4 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "vigourous") {
            $cal = (5 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        }
    }

    if ($exercisename === "squat") {
        if ($exercisetype === "slow") {
            $cal = (3 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "moderate") {
            $cal = (4 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "vigourous") {
            $cal = (5 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        }
    }

    if ($exercisename === "benchpress") {
        if ($exercisetype === "slow") {
            $cal = (2 * $duration) / 10 . "calories burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "moderate") {
            $cal = (3 * $duration) / 10 . "calories burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "vigourous") {
            $cal = (4 * $duration) / 10 . "calories burned";
            $_SESSION["cal"] = $cal;
        }
    }

    if ($exercisename === "planks") {
        if ($exercisetype === "slow") {
            $cal = (1 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "moderate") {
            $cal = (2 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "vigourous") {
            $cal = (3 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        }
    }

    if ($exercisename === "barbellcurl") {
        if ($exercisetype === "slow") {
            $cal = (1 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "moderate") {
            $cal = (2 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "vigourous") {
            $cal = (3 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        }
    }

    if ($exercisename === "abscrunches") {
        if ($exercisetype === "slow") {
            $cal = (1 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "moderate") {
            $cal = (2 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "vigourous") {
            $cal = (3 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        }
    }

    if ($exercisename === "legraises") {
        if ($exercisetype === "slow") {
            $cal = (1 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "moderate") {
            $cal = (2 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "vigourous") {
            $cal = (3 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        }
    }

    if ($exercisename === "russiantwist") {
        if ($exercisetype === "slow") {
            $cal = (1 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "moderate") {
            $cal = (2 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "vigourous") {
            $cal = (3 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        }
    }

    if ($exercisename === "hangingleg") {
        if ($exercisetype === "slow") {
            $cal = (1 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "moderate") {
            $cal = (2 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "vigourous") {
            $cal = (3 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        }
    }

    if ($exercisename === "sprinting") {
        if ($exercisetype === "slow") {
            $cal = (3 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "moderate") {
            $cal = (4 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        } elseif ($exercisetype === "vigourous") {
            $cal = (5 * $duration) / 10 . " calaries burned";
            $_SESSION["cal"] = $cal;
        }
    }

    header("Location: ./index.php#calorie");
    exit();
}


if (isset($_POST["bodyfat"])) {
    $height = $_POST["height"];
    $gender = $_POST["gender"];
    $neck = $_POST["neck"];
    $waist = $_POST["waist"];
    $hip = $_POST["hip"];

    if ($gender === "male" && $height > 0 && $waist > 0 && $neck > 0) {
        $ibf = round((86.010 * (log($waist * 1 - $neck * 1) / log(10)) - 70.041 * (log($height) / log(10)) + 30.30 * 1) * 100) / 100;
        $_SESSION["bfp"] = $ibf;
        if ($ibf <= 5) {
            $bfc = "Essential";
            $_SESSION["bfc"] = $bfc;
        } else if ($ibf > 5 && $ibf <= 15) {
            $bfc = "Fit";
            $_SESSION["bfc"] = $bfc;
        } else if ($ibf > 15 && $ibf <= 23) {
            $bfc = "Acceptable";
            $_SESSION["bfc"] = $bfc;
        } else if ($ibf > 23) {
            $bfc = "Obese";
            $_SESSION["bfc"] = $bfc;
        }
    } else if ($gender === "female" && $height > 0 && $waist > 0 && $neck > 0) {
        $ibf = round((163.205 * (log($waist * 1 + $hip * 1 - $neck * 1) / log(10)) - 97.684 * (log($height) / log(10)) - 104.912 * 1) * 100) / 100;
        $_SESSION["bfp"] = $ibf;
        if ($ibf <= 15) {
            $bfc = "Essential";
            $_SESSION["bfc"] = $bfc;
        } else if ($ibf > 15 && $ibf <= 20) {
            $bfc = "Fit";
            $_SESSION["bfc"] = $bfc;
        } else if ($ibf > 20 && $ibf <= 27) {
            $bfc = "Acceptable";
            $_SESSION["bfc"] = $bfc;
        } else if ($ibf > 27) {
            $bfc = "Obese";
            $_SESSION["bfc"] = $bfc;
        }
    }
    header("Location: index.php#goals");
    exit();
}

// calories for food calculation

if (isset($_POST["foodcalorie"])) {
    $foodname = $_POST["foodname"];
    $foodqty = $_POST["foodqty"];

    $res = $con->query("SELECT * FROM trackcalories WHERE foodname='$foodname'");
    if (mysqli_num_rows($res) > 0) {
        while ($row = $res->fetch_assoc()) {
            $food = $row["foodname"];
            $calorie = $row["calories"];
        }
    }
    $foodcal = $food  .  ($calorie * $foodqty / 5);
    $_SESSION["food"] = $foodcal  . " calories in " .  $foodqty . " grams";

    header("Location: ./index.php#calorie");
    exit();
}

if (isset($_POST["forgotpassword"])) {
    $emailid = $_POST["emailid"];
    $newpassword = $_POST["conpassword"];

    $res = $con->query("SELECT * FROM registration WHERE email='$emailid'");

    if (mysqli_num_rows($res) > 0) {
        $con->query("UPDATE registration SET pass='$newpassword' WHERE email='$emailid'");
        $_SESSION["message"] = "New password has been updated";
        $_SESSION["msgtype"] = "success";

        header("Location: ./index.php");
        exit();
    } else {
        $_SESSION["message"] = "invalid email address";
        $_SESSION["msgtype"] = "danger";

        header("Location: ./forgotpassword.php");
        exit();
    }
}
