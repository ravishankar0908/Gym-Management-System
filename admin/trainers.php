<?php include("trainerdb.php"); ?>
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
        <h2>Trainers</h2>
        <div class="dropdown-divider"></div>

        <div class="row">
            <div class="col-sm-3 mt-3"></div>
            <div class="col-sm-8">
                <form action="./trainerdb.php" method="post" id="trainer">
                    <input type="hidden" name="id">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Add trainers</h3>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="usertype" value="trainer">
                            <label for="tname">Enter trainer name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-useraa"></i>
                                    </span>
                                </div>
                                <input type="text" name="tname" id="tname" class="form-control" placeholder="Trainers name">
                            </div>
                            <div id="errortname"></div>
                            <br>

                            <div class="row">
                                <div class="col-6">
                                    <label for="tage">Enter trainer age</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-number"></i>
                                            </span>
                                        </div>
                                        <input type="number" name="tage" id="tage" class="form-control" placeholder="Trainers age">
                                    </div>
                                    <div id="errortage"></div>
                                    <br>
                                </div>
                                <div class="col-6">
                                    <label for="texperience">Enter trainer Experience</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-number"></i>
                                            </span>
                                        </div>
                                        <input type="number" name="texperience" id="texperience" class="form-control" placeholder="Trainers Experience">
                                    </div>
                                    <div id="errortexp"></div>
                                    <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label for="tmobile">Enter trainer mobile number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-number"></i>
                                            </span>
                                        </div>
                                        <input type="tel" name="tmobile" id="tmobile" class="form-control" placeholder="Trainers mobile number">
                                    </div>
                                    <div id="errortmobile"></div>
                                    <br>
                                </div>
                                <div class="col-6">
                                    <label for="temail">Enter trainer Email address</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-number"></i>
                                            </span>
                                        </div>
                                        <input type="email" name="temail" id="temail" class="form-control" placeholder="Trainers email address">
                                    </div>
                                    <div id="errortemail"></div>
                                    <br>

                                </div>
                            </div>

                            <label for="taddress">Enter the address</label>
                            <textarea name="taddress" id="taddress" cols="30" rows="3" class="form-control"></textarea>
                            <div id="errortaddress"></div>
                            <br>


                            <label for="tpass">Enter the password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-number"></i>
                                    </span>
                                </div>
                                <input type="password" name="tpass" id="tpass" class="form-control" placeholder="Enter the password">
                            </div>
                            <div id="errortpass"></div>
                            <br>

                            <div class="row">
                                <div class="col-6">
                                    <label for="trainerstype">Enter trainers type</label>
                                    <select name="trainerstype" id="trainerstype" class="form-control">
                                        <option value="member" selected disabled>Choose member type</option>
                                        <option value="membersilver">Member silver</option>
                                        <option value="membergold">Member gold</option>
                                    </select>
                                    <div id="errortrainertype"></div>
                                </div>
                                <div class="col-6">
                                    <label for="tdob">Enter the date of birth</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-calender"></i>
                                            </span>
                                        </div>
                                        <input type="date" name="tdob" id="tdob" class="form-control">
                                    </div>
                                    <div id="errortdob"></div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <input type="submit" value="Add" class="btn btn-primary" name="trainer">
                            <input type="reset" value="cancel" class="btn btn-danger">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var form = document.getElementById("trainer")
        var tname = document.getElementById("tname")
        var errortname = document.getElementById("errortname")
        var tage = document.getElementById("tage")
        var errortage = document.getElementById("errortage")
        var texperience = document.getElementById("texperience")
        var errortexp = document.getElementById("errortexp")
        var tmobile = document.getElementById("tmobile")
        var errortmobile = document.getElementById("errortmobile")
        var temail = document.getElementById("temail")
        var errortemail = document.getElementById("errortemail")
        var taddress = document.getElementById("taddress")
        var errortaddress = document.getElementById("errortaddress")
        var tpass = document.getElementById("tpass")
        var errortpass = document.getElementById("errortpass")
        var trainertype = document.getElementById("trainerstype")
        var errortrainertype = document.getElementById("errortrainertype")
        var tdob = document.getElementById("tdob")
        var errortdob = document.getElementById("errortdob")

        form.addEventListener("submit", (e) => {
            if (tname.value === "" || tage.value === "" || texperience.value === "" || tmobile.value === "" | temail.value === "" || taddress.value === "" || tpass.value === "" || trainertype.value === "member" || tdob.value === "") {
                e.preventDefault()

                tname.style.border = "1px solid red"
                errortname.innerHTML = "Enter the trainer name"
                errortname.style.color = "red"
                errortname.style.fontSize = "small"

                tage.style.border = "1px solid red"
                errortage.innerHTML = "Enter the age"
                errortage.style.color = "red"
                errortage.style.fontSize = "small"

                texperience.style.border = "1px solid red"
                errortexp.innerHTML = "Enter the trainer experience"
                errortexp.style.color = "red"
                errortexp.style.fontSize = "small"

                tmobile.style.border = "1px solid red"
                errortmobile.innerHTML = "Enter the mobile number"
                errortmobile.style.color = "red"
                errortmobile.style.fontSize = "small"

                temail.style.border = "1px solid red"
                errortemail.innerHTML = "Enter the trainer email"
                errortemail.style.color = "red"
                errortemail.style.fontSize = "small"

                taddress.style.border = "1px solid red"
                errortaddress.innerHTML = "Enter the trainer address"
                errortaddress.style.color = "red"
                errortaddress.style.fontSize = "small"

                tpass.style.border = "1px solid red"
                errortpass.innerHTML = "Enter the password"
                errortpass.style.color = "red"
                errortpass.style.fontSize = "small"

                trainertype.style.border = "1px solid red"
                errortrainertype.innerHTML = "select the member type"
                errortrainertype.style.color = "red"
                errortrainertype.style.fontSize = "small"

                tdob.style.border = "1px solid red"
                errortdob.innerHTML = "choose your dob"
                errortdob.style.color = "red"
                errortdob.style.fontSize = "small"
            }

            if (tname.value != "") {
                tname.style.border = "1px solid green"
                errortname.innerHTML = ""
            }

            if (tage.value != "") {
                tage.style.border = "1px solid green"
                errortage.innerHTML = ""
            }

            if (temail.value != "") {
                temail.style.border = "1px solid green"
                errortemail.innerHTML = ""
            }

            if (texperience.value != "") {
                texperience.style.border = "1px solid green"
                errortexp.innerHTML = ""
            }

            if (tmobile.value != "") {
                tmobile.style.border = "1px solid green"
                errortmobile.innerHTML = ""
            }

            if (taddress.value != "") {
                taddress.style.border = "1px solid green"
                errortaddress.innerHTML = ""
            }

            if (tpass.value != "") {
                tpass.style.border = "1px solid green"
                errortpass.innerHTML = ""
            }

            if (tdob.value != "") {
                tdob.style.border = "1px solid green"
                errortdob.innerHTML = ""
            }

            if (trainertype.value != "member") {
                trainertype.style.border = "1px solid green"
                errortrainertype.innerHTML = ""
            }

            if (tmobile.value.length > 10 || tmobile.value.length < 10) {
                e.preventDefault()
                tmobile.style.border = "1px solid red"
                errortmobile.innerHTML = "mobile number must be 10 digits"
                errortmobile.style.color = "red"
                errortmobile.style.fontSize = "small"
            }
        })
    </script>
</body>

</html>