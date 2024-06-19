<?php include("productnavbar.php"); ?>
<?php include("./order.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-3"></div>
            <div class="col-5 mt-5">
                <form action="./order.php" method="post" id="payment">
                    <div class="card border-success">
                        <div class="card-header bg-success text-white">
                            <h3>payment</h3>
                        </div>
                        <div class="card-body">
                            <label for="cardnumber">Enter the card number</label>
                            <!-- card number -->
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class=""></i>
                                    </span>
                                </div>
                                <input type="number" name="cardnumber" id="cardnumber" class="form-control" placeholder="Enter the card number">
                            </div>
                            <div id="errorcardnumber"></div><br>

                            <!-- expiry details -->
                            <label for="expirydate">Enter the expiry date</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class=""></i>
                                    </span>
                                </div>
                                <input type="month" name="expirydate" id="expirydate" class="form-control">
                            </div>
                            <div id="errorexpirydate"></div><br>

                            <!-- cvv number -->
                            <label for="cvv">Enter the cvv number</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class=""></i>
                                    </span>
                                </div>
                                <input type="password" name="cvv" id="cvv" class="form-control" placeholder="Enter the cvv number">
                            </div>
                            <div id="errorcvv"></div><br>

                            <!-- deliver address -->
                            <label for="deliverto">Delivery address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class=""></i>
                                    </div>
                                </div>
                                <input type="text" name="deliverto" id="deliverto" class="form-control" value="<?php echo $_SESSION["address"]; ?>">
                            </div>
                            <div id="errordeliverto"></div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" value="pay" name="pay" class="btn btn-primary">
                            <a href="./product.php" class="btn btn-danger">cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var cardnumber = document.getElementById("cardnumber");
        var errorcardnumber = document.getElementById("errorcardnumber");
        var expirydate = document.getElementById("expirydate");
        var errorexpirydate = document.getElementById("errorexpirydate");
        var cvv = document.getElementById("cvv");
        var errorcvv = document.getElementById("errorcvv");
        var deliverto = document.getElementById("deliverto");
        var errordeliverto = document.getElementById("errordeliverto");
        var form = document.getElementById("payment");

        form.addEventListener("submit", (e) => {
            if (cardnumber.value === "" || expirydate.value === "" || cvv.value === "" || deliverto.value === "") {
                e.preventDefault();

                cardnumber.style.border = "1px solid red";
                errorcardnumber.innerHTML = "Enter the cardnumber";
                errorcardnumber.style.color = "red"
                errorcardnumber.style.fontSize = "small"

                expirydate.style.border = "1px solid red";
                errorexpirydate.innerHTML = "Enter the expiry date"
                errorexpirydate.style.color = "red"
                errorexpirydate.style.fontSize = "small"

                cvv.style.border = "1px solid red"
                errorcvv.innerHTML = "Enter the cvv number"
                errorcvv.style.fontSize = "small"
                errorcvv.style.color = "red"

                deliverto.style.border = "1px solid red"
                errordeliverto.style.color = "red"
                errordeliverto.style.fontSize = "small"
                errordeliverto.innerHTML = "Enter the address for deliver"
            }


            if (cardnumber.value != "") {
                cardnumber.style.border = "1px solid green";
                errorcardnumber.innerHTML = ""
            }

            if (expirydate.value != "") {
                expirydate.style.border = "1px solid green";
                errorexpirydate.innerHTML = ""
            }

            if (cvv.value != "") {
                cvv.style.border = "1px solid green";
                errorcvv.innerHTML = ""
            }

            if (deliverto.value != "") {
                deliverto.style.border = "1px solid green";
                errordeliverto.innerHTML = ""
            }

            if (cvv.value.length > 3 || cvv.value.length < 3) {
                e.preventDefault()
                cvv.style.border = "1px solid red"
                errorcvv.style.color = "red"
                errorcvv.style.fontSize = "small"
                errorcvv.innerHTML = "Invalid cvv number"
            }

            if (cardnumber.value.length === 0) {
                e.preventDefault();
                cardnumber.style.border = "1px solid red";
                errorcardnumber.innerHTML = "Enter the cardnumber";
                errorcardnumber.style.color = "red"
                errorcardnumber.style.fontSize = "small"
            }

            if (cardnumber.value.length > 16 || cardnumber.value.length < 16) {
                e.preventDefault();
                cardnumber.style.border = "1px solid red";
                errorcardnumber.innerHTML = "Invalid cardnumber";
                errorcardnumber.style.color = "red"
                errorcardnumber.style.fontSize = "small"
            }

        })
    </script>
</body>

</html>