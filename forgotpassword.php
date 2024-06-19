<?php include("./register.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./fontawesome/css/all.css">
    <link rel="shortcut icon" href="./assets/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>DBR Fitness Center</title>
</head>

<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-3"></div>
            <div class="col-6">
                <?php
                if (isset($_SESSION["message"])) {
                ?>
                    <div class="alert alert-<?php echo $_SESSION["msgtype"]; ?> text-center">
                        <?php
                        echo $_SESSION["message"];
                        unset($_SESSION["message"]);
                        ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="fas fa-xmark mt-1"></i>
                        </button>
                    </div>
                <?php
                }
                ?>
                <form action="./register.php" method="post" id="forgotpassword">
                    <div class="card mt-5">
                        <div class="card-header bg-primary text-white">
                            <h3>Forgot Password</h3>
                        </div>
                        <div class="card-body">
                            <label for="emailid">Enter your email id</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class=""></i>
                                    </span>
                                </div>
                                <input type="text" name="emailid" id="emailid" class="form-control" placeholder="Enter your email id">
                            </div>
                            <div id="erroremailid"></div><br>


                            <label for="conpassword">Enter your New password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class=""></i>
                                    </span>
                                </div>
                                <input type="password" name="conpassword" id="conpassword" class="form-control" placeholder="Enter your new password">
                            </div>
                            <div id="errorconpassword"></div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" value="submit" class="btn btn-primary" name="forgotpassword">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="./bootstrap/js/Jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>

    <script>
        var form = document.getElementById("forgotpassword")
        var emailid = document.getElementById("emailid")
        var erroremailid = document.getElementById("erroremailid")
        var conpassword = document.getElementById("conpassword")
        var errorconpassword = document.getElementById("errorconpassword")

        form.addEventListener("submit", (e) => {
            if (emailid.value === "" || conpassword.value === "") {
                e.preventDefault()

                emailid.style.border = "1px solid red"
                erroremailid.innerHTML = "Enter the email address"
                erroremailid.style.color = "red"
                erroremailid.style.fontSize = "small"

                conpassword.style.border = "1px solid red"
                errorconpassword.innerHTML = "Enter the new password"
                errorconpassword.style.color = "red"
                errorconpassword.style.fontSize = "small"
            }

            if (emailid.value != "") {
                emailid.style.border = "1px solid green"
                erroremailid.innerHTML = ""
            }

            if (conpassword.value != "") {
                conpassword.style.border = "1px solid green"
                errorconpassword.innerHTML = ""
            }
        })
    </script>

</body>

</html>