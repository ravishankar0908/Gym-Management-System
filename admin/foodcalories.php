<?php include("./foodcaloriedb.php"); ?>
<?php include("./navbar.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>food calories</title>
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

        <h2>Add food for calories</h2>
        <div class="dropdown-divider"></div>

        <div class="row mt-3">
            <!-- <div class="col-sm-3 mt-3"></div> -->
            <div class="col-sm-6">
                <form action="./foodcaloriedb.php" method="post" id="foodcalorieform">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3>Add food items to track calories</h3>
                        </div>
                        <div class="card-body">
                            <label for="food">Enter the food items</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i></i>
                                    </span>
                                </div>
                                <input type="text" name="food" id="food" class="form-control" placeholder="Enter the food items">
                            </div>
                            <div id="errorfood"></div><br>

                            <label for="food">Enter the calories for food items</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i></i>
                                    </span>
                                </div>
                                <input type="text" name="foodcalorie" id="foodcalorie" class="form-control" placeholder="Enter the calories for food items">
                            </div>
                            <div id="errorfoodcalorie"></div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" value="Add" name="fooditems" class="btn btn-primary">
                            <input type="reset" value="Cancel" class="btn btn-danger">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    var form = document.getElementById("foodcalorieform");
    var food = document.getElementById("food");
    var errorfood = document.getElementById("errorfood")
    var foodcalorie = document.getElementById("foodcalorie");
    var errorfoodcalorie = document.getElementById("errorfoodcalorie");


    form.addEventListener("submit", (e) => {
        if (food.value === "" || foodcalorie.value === "") {
            e.preventDefault();

            food.style.border = "1px solid red"
            errorfood.innerHTML = "Enter the food name"
            errorfood.style.color = "red"
            errorfood.style.fontSize = "small"

            foodcalorie.style.border = "1px solid red"
            errorfoodcalorie.innerHTML = "Enter the foodcalorie"
            errorfoodcalorie.style.color = "red"
            errorfoodcalorie.style.fontSize = "small"
        }

        if (food.value != "") {
            food.style.border = "1px solid green"
            errorfood.innerHTML = ""
        }

        if (foodcalorie.value != "") {
            foodcalorie.style.border = "1px solid green"
            errorfoodcalorie.innerHTML = ""
        }
    })
</script>

</html>