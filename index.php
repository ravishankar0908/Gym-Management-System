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

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-xl navbar-dark bg-dark fixed-top">
            <a href="#" class="navbar-brand">
                <img src="./assets/logo.jpg" height="30" width="30" class="d-inline-block rounded-circle">
                DBR Fitness Center
            </a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ml-auto">
                    <?php
                    if (!isset($_SESSION["user"])) {
                    ?>
                        <li class="nav-item">
                            <button class="btn btn-primary btn-sm mt-2" data-target="#register" data-toggle="modal">Register here</button>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item dropdown">
                            <div class="dropdown mt-2">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                    <?php echo $_SESSION["username"]; ?>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="profile.php">Profile</a>
                                    <a class="dropdown-item" href="myorders.php">My orders</a>
                                    <?php
                                    if (isset($_SESSION["member"])) {
                                    ?>
                                        <a class="dropdown-item disabled" href="#">you already have membership</a>

                                        <a href="./index.php?unmember=<?php echo $_SESSION["userid"]; ?>" class="btn btn-danger ml-3 mt-2">Un-member</a>
                                    <?php
                                    } else {
                                    ?>
                                        <button class="btn btn-success btn-sm ml-3 mt-2" data-target="#member" data-toggle="modal">Join course</button>
                                    <?php
                                    }

                                    ?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="./logout.php">Logout</a>
                                </div>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="nav-item">
                        <a href="#home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="./products/product.php" class="nav-link">Our Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="#facility" class="nav-link">Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a href="#goals" class="nav-link">Setting goals</a>
                    </li>
                    <li class="nav-item">
                        <a href="#calorie" class="nav-link">Calorie calculation</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link">About us</a>
                    </li>
                </ul>
            </div>
        </nav>


        <!--------------------------------------------- home page -------------------------------------->
        <section id="home">
            <div class="row">
                <div class="col-12">
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
                    <h1 class="text-center heading display-4">Welcome to worlds no. 1 fitness center</h1>
                </div>
            </div>
            <div class="row col-10">
                <div class="col-xl-6 col-12 order-1">
                    <h1 class="display-4">DBR fitness center <br><span>Exercise everyday</span></h1>
                    <p>As a general goal, aim for at least 30 minutes of moderate physical activity every day. If you want to lose weight, maintain weight loss or meet specific fitness goals, you may need to exercise more. Reducing sitting time is important, too. The more hours you sit each day, the higher your risk of metabolic problems.</p>

                    <?php if (!isset($_SESSION["user"])) { ?> <button class="btn btn-primary shadow-lg" data-target="#login" data-toggle="modal">Login here</button> <?php } ?>
                </div>

                <div class="col-xl-6 my-sm-5 my-xl-0 col-12 order-xl-2 big">
                    <img src="./assets/vectorimg2.png" class="img-fluid rounded">
                </div>
            </div>
        </section>

        <!--------------------------------------------------- icons ---------------------------------------->
        <div class="container mb-5 my-sm-5 my-xl-0">
            <div class="row">
                <div class="col-2">
                    <img src="./assets/icons/icon1.jpg" class="img-fluid rounded-circle" height="150" width="150">
                </div>
                <div class="col-2">
                    <img src="./assets/icons/icon2.jpg" class="img-fluid rounded-circle" height="150" width="150">
                </div>
                <div class="col-2">
                    <img src="./assets/icons/icon3.jpg" class="img-fluid rounded-circle" height="150" width="150">
                </div>
                <div class="col-2">
                    <img src="./assets/icons/icon4.webp" class="img-fluid rounded-circle" height="150" width="150">
                </div>
                <div class="col-2">
                    <img src="./assets/icons/icon5.webp" class="img-fluid rounded-circle" height="150" width="150">
                </div>
                <div class="col-2">
                    <img src="./assets/icons/icon6.jpg" class="img-fluid rounded-circle" height="150" width="150">
                </div>
            </div>
        </div>

        <!------------------------------------ Facility section ---------------------------------------->
        <section id="facility">
            <div class="row col-10 top">
                <div class="col-xl-6 my-sm-5 my-xl-0 col-12 order-sm-2 order-xl-0 big">
                    <img src="./assets/gif/gif1.gif" class="img-fluid rounded">
                </div>
                <div class="col-xl-6 col-12 order-1">
                    <h1 class="display-4 ">We provide <br><span class="heading">Best faculty</span></h1>
                    <p>Join our Faculty family and choose from a variety of curated Calisthenics, Yoga, Handstands, Mobility and Flexibility classes available every single day of the week. </p>

                </div>
            </div>
            <div class="row col-10">
                <div class="col-xl-6 col-12">
                    <h1 class="display-4">We provide <br><span class="heading">Personal Trainers</span></h1>
                    <p>Individualized attention is important to members, especially those looking for a Certified Personal Trainer. This position requires being personable, approachable and knowledgeable in exercise program design. Hire personal trainers who are certified, yet have a desire to continue learning new techniques and strategies to help their clients achieve their goals.</p>

                </div>
                <div class="col-xl-6 col-12 my-sm-5 big">
                    <img src="./assets/gif/gif6.gif" class="rounded" width="640" height="360">
                </div>
            </div>
        </section>



        <!------------------------------------ setting goals ---------------------------------------->
        <section id="goals">
            <div class="row col-10">
                <div class="col-12">
                    <h1 class="text-center heading">setting goals</h1>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <form action="./register.php" method="post" id="mcl">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title text-center">Maintanance calories level</h3>
                            </div>
                            <div class="card-body">

                                <label for="weight">Enter your weight</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-weight"></i>
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" id="weight" name="weight" placeholder="Enter your weight">
                                </div>
                                <div id="errorweight"></div><br>

                                <label for="">Select your lifestyle</label>
                                <div class="input-group">
                                    <select class="form-control" name="lifestyle" id="lifestyle">
                                        <option selected disabled value="Chooselifestyle">Choose lifestyle</option>
                                        <option value="sedentary">sedentary</option>
                                        <option value="lightlyactive">Lightly active</option>
                                        <option value="active">Active</option>
                                        <option value="veryactive">Very active</option>
                                    </select>
                                </div>
                                <div id="errorlifestyle"></div><br>

                                <?php
                                if (isset($_SESSION["totalcal"])) {
                                ?>
                                    <label for="totalcal">Total calories needed per day</label>
                                    <input type="text" class="form-control" value="<?php echo $_SESSION["totalcal"]; ?>" id="totalcal" disabled><br>
                                <?php
                                }
                                ?>

                                <?php unset($_SESSION["totalcal"]); ?>

                            </div>
                            <div class="card-footer">
                                <input type="submit" value="calculate" name="mcl" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title text-center">Body fat percentage</h3>
                        </div>
                        <form action="./register.php" method="post" id="bodyfat">
                            <div class="card-body">
                                <label for="height">Enter your height</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-height"></i>
                                        </span>
                                    </div>
                                    <input type="number" name="height" id="height" class="form-control" placeholder="Enter your height in CM">
                                </div>
                                <div id="errorheight"></div><br>

                                <label for="neck">Enter your neck size</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class=""></i>
                                        </span>
                                    </div>
                                    <input type="number" id="neck" name="neck" class="form-control" placeholder="Enter your neck size in CM">
                                </div>
                                <div id="errorneck"></div><br>

                                <label for="waist">Enter your waist size</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class=""></i>
                                        </span>
                                    </div>
                                    <input type="number" id="waist" name="waist" class="form-control" placeholder="Enter your waist size in CM">
                                </div>
                                <div id="errorwaist"></div><br>

                                <label for="hip">Enter your Hip size</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-size"></i>
                                        </span>
                                    </div>
                                    <input type="number" name="hip" id="hip" class="form-control" placeholder="Enter your hip size in CM">
                                </div>
                                <div id="errorhip"></div><br>

                                <label for="gender">Select your gender</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="gender" id="male" value="male" class="custom-control-input">
                                    <label class="custom-control-label" for="male">Male</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="gender" id="female" value="female" class="custom-control-input">
                                    <label for="female" class="custom-control-label">Female</label>
                                </div><br>
                                <br>
                                <?php
                                if (isset($_SESSION["bfp"]) && isset($_SESSION["bfc"])) {
                                ?>
                                    <label for="bfp">Body fat percentage</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class=""></i>
                                            </span>
                                        </div>
                                        <input type="number" class="form-control" value="<?php echo $_SESSION["bfp"]; ?>" id="bfp" disabled>
                                    </div><br>

                                    <label for="bfc">Body fat category</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class=""></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" value="<?php echo $_SESSION["bfc"]; ?>" id="bfc" disabled>
                                    </div>
                                <?php
                                }
                                ?>

                                <?php unset($_SESSION["bfp"]); ?>
                                <?php unset($_SESSION["bfc"]); ?>

                            </div>



                            <div class="card-footer">
                                <input type="submit" value="Calculate" name="bodyfat" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!------------------------------------ Calorie calculation ---------------------------------------->
        <section id="calorie">
            <div class="row col-10">
                <div class="col-12">
                    <h1 class="text-center heading">Calorie calculation</h1>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title text-center">For Food</h3>
                        </div>

                        <form action="./register.php" method="post" id="forfoodform">
                            <div class="card-body">
                                <label for="name">Food Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="Enter your name" name="foodname" id="foodname">
                                </div>
                                <div id="errorfoodname"></div><br>

                                <label for="name">Quantity in grams</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="number" placeholder="Enter food quantity in grams" name="foodqty" id="foodqty">
                                </div>
                                <div id="errorfoodqty"></div><br>

                                <label>Track calorie</label>
                                <div class="input-group">
                                    <select class="form-control" name="timing" id="timing">
                                        <option selected disabled value="choosefrom">Choose from</option>
                                        <option>Break fast</option>
                                        <option>Lunch</option>
                                        <option>Evening snack</option>
                                        <option>Dinner</option>
                                    </select>
                                </div>
                                <div id="errortiming"></div><br>
                                <?php
                                if (isset($_SESSION["food"])) {
                                ?>
                                    <label for="bfp">Total calories in that food</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class=""></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" value="<?php echo $_SESSION["food"]; ?>" id="bfp" disabled>
                                    </div><br>
                                <?php
                                }
                                ?>

                                <?php unset($_SESSION["food"]); ?>
                            </div>
                            <div class="card-footer">
                                <input type="submit" value="Calculate" name="foodcalorie" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>



                <div class="col-md-6 my-sm-3 my-lg-0 my-md-0">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title text-center">For Exercise</h3>
                        </div>
                        <form action="./register.php" method="post" id="forexercise">
                            <div class="card-body">
                                <label for="name">Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                            <span>
                                    </div>
                                    <input class="form-control" name="customername" type="text" placeholder="Enter your name" id="customername">
                                </div>
                                <div id="errorcustomername"></div><br>

                                <label for="exercisename">Exercise Name</label>
                                <div class="input-group">
                                    <select class="form-control" name="exercisename" id="exercisename">
                                        <option selected disabled value="choosename">Choose name</option>
                                        <option value="running">Running</option>
                                        <option value="walking">Walking</option>
                                        <option value="swimming">Swimming </option>
                                        <option value="cycling">cycling </option>
                                        <option value="skipping">Skipping </option>
                                        <option value="jumpingjacks">Jumping jacks </option>
                                        <option value="highknee">High knees </option>
                                        <option value="burpees">burpees </option>
                                        <option value="stepup">Stepup </option>
                                        <option value="pushup">Push ups </option>
                                        <option value="pullup">Pull ups </option>
                                        <option value="squat">Regular Squat </option>
                                        <option value="benchpress">Bench press </option>
                                        <option value="planks">Planks </option>
                                        <option value="barbellcurl">barbell curl </option>
                                        <option value="abscrunches">abs crunches </option>
                                        <option value="legraises">leg raises </option>
                                        <option value="russiantwist">russian twist </option>
                                        <option value="hangingleg">hanging leg raises</option>
                                        <option value="sprinting">sprinting</option>
                                    </select>
                                </div>
                                <div id="errorexercisename"></div><br>

                                <label for="exercisetype">Exercise Type</label>
                                <div class="input-group">
                                    <select class="form-control" id="exercisetype" name="exercisetype">
                                        <option selected disabled value="choosetype">Choose type</option>
                                        <option value="slow">Slow</option>
                                        <option value="moderate">moderate</option>
                                        <option value="vigourous">Vigourous</option>
                                    </select>
                                </div>
                                <div id="errorexercisetype"></div><br>


                                <label for="duration">Duration per hour</label>
                                <div class="input-group">
                                    <select class="form-control" id="duration" name="duration">
                                        <option selected disabled value="chooseduration">Choose Duration</option>
                                        <option value="10">10 seconds</option>
                                        <option value="30">30 seconds</option>
                                        <option value="60">1 minutes</option>
                                        <option value="300">5 minutes</option>
                                        <option value="600">10 minutes</option>
                                    </select>
                                </div>
                                <div id="errorduration"></div><br>
                                <?php
                                if (isset($_SESSION["cal"])) {
                                ?>
                                    <label for="totalcal">Total calories burned</label>
                                    <input type="text" class="form-control" value="<?php echo $_SESSION["cal"]; ?>" id="totalcal" disabled><br>
                                <?php
                                }
                                ?>
                                <?php unset($_SESSION["cal"]); ?>
                                <input type="submit" class="btn btn-primary" value="Calculate" name="exercise">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!------------------------------------ contact us---------------------------------------->
        <section id="contact">
            <div class="row col-10">
                <div class="col-12">
                    <h1 class="text-center heading">Contact us</h1>
                </div>
                <div class="col-md-6 mt-3">
                    <form action="./register.php" method="post" id="contact">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="text-center">Contact us</h3>
                            </div>
                            <div class="card-body">
                                <!-- customer name -->
                                <label for="concustomername">Enter your name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class=""></i>
                                        </span>
                                    </div>
                                    <input type="text" name="customername" id="concustomername" class="form-control" placeholder="Enter your name">
                                </div>
                                <div id="errorcname"></div><br>
                                <!-- customer email -->
                                <label for="customeremail">Enter your email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class=""></i>
                                        </span>
                                    </div>
                                    <input type="email" name="customeremail" id="customeremail" class="form-control" placeholder="Enter your email">
                                </div>
                                <div id="errorcemail"></div><br>
                                <!-- mobile number -->
                                <label for="customerphone">Enter your phone number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class=""></i>
                                        </span>
                                    </div>
                                    <input type="number" name="customerphone" id="customerphone" class="form-control" placeholder="Enter your phone number">
                                </div>
                                <div id="errorcphone"></div><br>
                                <!-- Enter the queries -->
                                <label for="message">Enter the message</label>
                                <textarea name="message" id="message" cols="30" rows="7" class="form-control"></textarea>
                                <div id="errormessage"></div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" value="Send" name="contact" class="btn btn-primary">
                                <input type="reset" value="Cancel" class="btn btn-danger">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">Address and contact details</h3>
                    <div class="dropdown-divider mt-3"></div><br>
                    <div class="text-center mt-5">
                        <h4><b>Street :</b> 278, south masi street simmakkal</h4><br>

                        <h4><b>City :</b> Madurai</h4><br>

                        <h4><b>State/province/area :</b> tamil nadu</h4><br>

                        <h4><b>Phone number :</b> 8015823119</h4><br>

                        <h4><b>Zip code :</b> 625001</h4><br>

                        <h4><b>Country :</b> India</h4>
                    </div>
                </div>
            </div>
        </section>
    </div>



    <!------------------------------------ About us  ---------------------------------------->
    <section id="about">
        <div class="row col-10">
            <div class="col-12">
                <h1 class="text-center heading">About us</h1><br>
            </div><br>
            <div class="col-md-12">
                <h2 class="text-center"><b>WE ARE GYM AND FITNESS</b></h2>
                <h3 class="text-center">Make people live longer,healthier lives for 20 years.</h3><br>
                <div class="dropdown-divider"></div><br>
                <h2 class="text-center"><b>OUR STORY</b></h2>
                <h3>Gym and Fitness was founded in 2002 as a family owned and operated business specialising in supplying high-quality gym equipment at great prices.</h3><br>

                <div class="dropdown-divider"></div><br>
                <h2 class="text-center"><b>OUR CULTURE</b></h2>
                <h3>We know that building a positive culture is incredibly important. We believe in encouraging, supporting, challenging, learning and growing to be the best! Our flexible working solutions, gym rebates and educational opportunities create a positive work/life balance for all our employees.</h3><br>

            </div>
        </div>
    </section>

    <!----------------------------------------- register here---------------------------------------->
    <div class="modal fade" id="register" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="./register.php" method="post" id="Rform">
                    <div class="card border-danger">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title text-center">Register Here</h3>
                        </div>
                        <div class="card-body">
                            <!-- username -->
                            <label for="name">Enter your name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
                            </div>
                            <div id="errorname"></div>
                            <br>

                            <!-- email address -->
                            <label for="email">Enter your email address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address">
                            </div>
                            <div id="erroremailr"></div>
                            <br>

                            <!-- date of birth -->
                            <label for="date">Enter your date of birth</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-calendar-days"></i>
                                    </span>
                                </div>
                                <input type="date" name="date" id="date" class="form-control" placeholder="Enter your DOB">
                            </div>
                            <div id="errordate"></div>
                            <br>

                            <!-- phone number -->
                            <label for="phone">Enter your phone number</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </span>
                                </div>
                                <input type="number" name="phone" id="phone" class="form-control" placeholder="Enter your phone number">
                            </div>
                            <div id="errorphone"></div>
                            <br>

                            <!-- address -->
                            <label for="address">Enter your Address</label>
                            <div class="input-group">
                                <textarea name="address" id="address" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div id="erroraddress"></div>
                            <br>

                            <!-- password -->
                            <label for="password">Enter your password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                            </div>
                            <div id="errorregpass"></div>
                            <br>

                            <input type="hidden" name="usertype" value="user">
                        </div>

                        <div class="card-footer">
                            <input type="submit" value="Register" name="register" class="btn btn-success">
                            <input type="button" value="cancel" class="btn btn-danger" data-dismiss="modal">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-----------------------------------------login here---------------------------------------->
    <div class="modal fade" id="login" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="./register.php" method="post" id="Lform">
                    <div class="card border-danger">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title text-center">Login Here</h3>
                        </div>
                        <div class="card-body">
                            <!-- email address -->
                            <label for="Lemail">Enter your email address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" name="Lemail" id="Lemail" class="form-control" placeholder="Enter your email address">
                            </div>
                            <div id="erroremail"></div>
                            <br>

                            <!-- password -->
                            <label for="Lpassword">Enter your password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                                <input type="password" name="Lpassword" id="Lpassword" class="form-control" placeholder="Enter your password">
                            </div>
                            <div id="errorpass"></div>
                            <small><a href="./forgotpassword.php">Forgot Password?</a></small>
                            <br>
                        </div>

                        <div class="card-footer">
                            <input type="submit" value="Login" name="loginbtn" class="btn btn-success">
                            <input type="button" value="cancel" class="btn btn-danger" data-dismiss="modal">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!---member---->
    <div class="modal fade" id="member" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="./register.php" method="post" id="memberform">
                    <div class="card border-danger">
                        <div class="card-header bg-success text-white">
                            <h3 class="card-title text-center">Join course become member</h3>
                        </div>
                        <div class="card-body">
                            <label>Select your member type</label>
                            <div class="input-group">
                                <select class="form-control" name="membertype" id="membertype">
                                    <option selected disabled value="choosemembertype">Choose member type</option>
                                    <option value="membersilver">Member Silver</option>
                                    <option value="membergold">Member Gold</option>
                                </select>
                            </div>
                            <div id="errormembertype"></div><br>

                            <label>Select your Trainer</label>
                            <div class="input-group">
                                <select class="form-control" name="trainer" id="trainer">
                                    <option selected disabled value="chooseyourtrainer">Choose your trainer</option>
                                    <?php
                                    $res = $con->query("SELECT * FROM trainer");
                                    if (mysqli_num_rows($res) > 0) {
                                        while ($row = $res->fetch_assoc()) {
                                    ?>
                                            <option value="<?php echo $row["tname"]; ?>"><?php echo $row["tname"]; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div id="errortrainer"></div><br>

                            <label for="cardno">Card number</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-number"></i>
                                    </span>
                                </div>
                                <input type="number" name="cardno" id="cardno" class="form-control" placeholder="Enter your card number">
                            </div>
                            <div id="errorcardno"></div><br>

                            <label for="cardno">Expiry date</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-calender"></i>
                                    </span>
                                </div>
                                <input type="month" name="expdate" id="expdate" class="form-control">
                            </div>
                            <div id="errorexpdate"></div><br>

                            <label for="cvvno">CVV number</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-number"></i>
                                    </span>
                                </div>
                                <input type="password" name="cvvno" id="cvvno" class="form-control" placeholder="Enter your CVV number">
                            </div>
                            <div id="errorcvvno"></div><br>
                        </div>
                        <div class="card-footer">
                            <input type="submit" value="Pay now" class="btn btn-success" name="paynow">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="./bootstrap/js/Jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>

    <script>
        var email = document.getElementById("Lemail");
        var erroremail = document.getElementById("erroremail");
        var pass = document.getElementById("Lpassword");
        var errorpass = document.getElementById("errorpass");
        var Lform = document.getElementById("Lform");


        Lform.addEventListener("submit", (e) => {
            if (email.value === "" || pass.value === "") {
                e.preventDefault()

                email.style.border = "1px solid red"
                erroremail.innerHTML = "Enter the valid email"
                erroremail.style.color = "red"
                erroremail.style.fontSize = "small"

                pass.style.border = "1px solid red"
                errorpass.innerHTML = "Enter the password"
                errorpass.style.color = "red"
                errorpass.style.fontSize = "small"
            }

            if (email.value != "") {
                email.style.border = "1px solid green"
                erroremail.innerHTML = ""
            }

            if (pass.value != "") {
                pass.style.border = "1px solid green"
                errorpass.innerHTML = ""
            }
        });



        // registration form validation
        var Rform = document.getElementById("Rform");
        var regemail = document.getElementById("email");
        var errorregemail = document.getElementById("erroremailr");
        var username = document.getElementById("name");
        var errorname = document.getElementById("errorname");
        var date = document.getElementById("date");
        var errordate = document.getElementById("errordate");
        var phone = document.getElementById("phone");
        var errorphone = document.getElementById("errorphone");
        var address = document.getElementById("address");
        var erroraddress = document.getElementById("erroraddress");
        var password = document.getElementById("password");
        var errorpassword = document.getElementById("errorregpass");

        var phonecheck = /^[6-9][0-9]{9}$/g;


        Rform.addEventListener("submit", (e) => {
            if (username.value === "" || regemail.value === "" || date.value === "" || address.value === "" || password.value === "" || phone.value === "") {
                e.preventDefault()

                username.style.border = "1px solid red"
                errorname.innerHTML = "Enter the username"
                errorname.style.color = "red"
                errorname.style.fontSize = "small"

                regemail.style.border = "1px solid red"
                errorregemail.innerHTML = "Enter the email"
                errorregemail.style.color = "red"
                errorregemail.style.fontSize = "small"

                date.style.border = "1px solid red"
                errordate.innerHTML = "select your date of bith"
                errordate.style.color = "red"
                errordate.style.fontSize = "small"

                address.style.border = "1px solid red"
                erroraddress.innerHTML = "Enter the address"
                erroraddress.style.color = "red"
                erroraddress.style.fontSize = "small"

                password.style.border = "1px solid red"
                errorpassword.innerHTML = "Enter the password"
                errorpassword.style.color = "red"
                errorpassword.style.fontSize = "small"

                phone.style.border = "1px solid red"
                errorphone.innerHTML = "Enter the phone number"
                errorphone.style.color = "red"
                errorphone.style.fontSize = "small"
            }

            if (phone.value.length === 0) {
                phone.style.border = "1px solid red"
                errorphone.innerHTML = "Enter your phone number"
                errorphone.style.color = "red"
                errorphone.style.fontSize = "small"
            }

            if (username.value != "") {
                username.style.border = "1px solid green";
                errorname.innerHTML = "";
            }

            if (regemail.value != "") {
                regemail.style.border = "1px solid green";
                errorregemail.innerHTML = "";
            }

            if (date.value != "") {
                date.style.border = "1px solid green"
                errordate.innerHTML = ""
            }

            if (phone.value != "") {
                phone.style.border = "1px solid green"
                errorphone.innerHTML = ""
            }

            if (phone.value.length > 10 || phone.value.length < 10) {
                e.preventDefault()
                phone.style.border = "1px solid red"
                errorphone.innerHTML = "phone number must be 10 digits"
                errorphone.style.color = "red"
                errorphone.style.fontSize = "small"
            }
            if (phonecheck.test(phone.value)) {
                phone.style.border = "1px solid green"
                errorphone.innerHTML = ""
            } else {
                e.preventDefault();
                phone.style.border = "1px solid red"
                errorphone.innerHTML = "invalid number"
                errorphone.style.color = "red"
                errorphone.style.fontSize = "small"
            }
        });

        // contact form validation
        var Cform = document.getElementById("contact");
        var concustomername = document.getElementById("concustomername");
        var customeremail = document.getElementById("customeremail");
        var customerphone = document.getElementById("customerphone");
        var cmessage = document.getElementById("message");
        var errorcname = document.getElementById("errorcname");
        var errorcemail = document.getElementById("errorcemail");
        var errorphone = document.getElementById("errorcphone");
        var errormessage = document.getElementById("errormessage");

        Cform.addEventListener("submit", (e) => {
            if (concustomername.value === "" || customeremail.value === "" || customerphone === "" || cmessage === "") {
                e.preventDefault();

                concustomername.style.border = "1px solid red";
                errorcname.innerHTML = "Enter your name";
                errorcname.style.fontSize = "small"
                errorcname.style.color = "red";

                customeremail.style.border = "1px solid red";
                errorcemail.innerHTML = "Enter your email";
                errorcemail.style.fontSize = "small"
                errorcemail.style.color = "red";

                customerphone.style.border = "1px solid red";
                errorphone.innerHTML = "Enter your phone";
                errorphone.style.fontSize = "small"
                errorphone.style.color = "red";

                cmessage.style.border = "1px solid red";
                errormessage.innerHTML = "Enter your message";
                errormessage.style.fontSize = "small"
                errormessage.style.color = "red";
            }

            if (concustomername.value != "") {
                concustomername.style.border = "1px solid green";
                errorcname.innerHTML = "";
            }

            if (customeremail.value != "") {
                customeremail.style.border = "1px solid green";
                errorcemail.innerHTML = "";
            }

            if (customerphone.value != "") {
                customerphone.style.border = "1px solid green";
                errorcphone.innerHTML = "";
            }

            if (cmessage.value != "") {
                cmessage.style.border = "1px solid green";
                errormessage.innerHTML = "";
            }

            if (phonecheck.test(customerphone.value)) {
                customerphone.style.border = "1px solid green";
                errorcphone.innerHTML = "";
            } else {
                customerphone.style.border = "1px solid red";
                errorphone.innerHTML = "invalid number";
                errorphone.style.fontSize = "small"
                errorphone.style.color = "red";
            }
        })

        // bodyfat form validation
        var bodyfat = document.getElementById("bodyfat");
        var height = document.getElementById("height");
        var errorheight = document.getElementById("errorheight");
        var neck = document.getElementById("neck");
        var errorneck = document.getElementById("errorneck")
        var waist = document.getElementById("waist")
        var errorwaist = document.getElementById("errorwaist");
        var hip = document.getElementById("hip");
        var errorhip = document.getElementById("errorhip");


        bodyfat.addEventListener("submit", (e) => {
            if (height.value === "" || waist.value === "" || neck.value === "" || hip.value === "") {
                e.preventDefault();

                height.style.border = "1px solid red";
                errorheight.innerHTML = "Enter the height";
                errorheight.style.color = "red";
                errorheight.style.fontSize = "small";

                hip.style.border = "1px solid red";
                errorhip.innerHTML = "Enter the hip size";
                errorhip.style.color = "red";
                errorhip.style.fontSize = "small";

                neck.style.border = "1px solid red";
                errorneck.innerHTML = "Enter the neck size";
                errorneck.style.color = "red";
                errorneck.style.fontSize = "small";

                waist.style.border = "1px solid red";
                errorwaist.innerHTML = "Enter the waist size";
                errorwaist.style.color = "red";
                errorwaist.style.fontSize = "small";

            }

            if (height.value != "") {
                height.style.border = "1px solid green";
                errorheight.innerHTML = "";
            }

            if (hip.value != "") {
                hip.style.border = "1px solid green";
                errorhip.innerHTML = "";
            }

            if (neck.value != "") {
                neck.style.border = "1px solid green";
                errorneck.innerHTML = "";
            }

            if (waist.value != "") {
                waist.style.border = "1px solid green";
                errorwaist.innerHTML = "";
            }

        })

        var mcl = document.getElementById("mcl");
        var weight = document.getElementById("weight");
        var errorweight = document.getElementById("errorweight");
        var lifestyle = document.getElementById("lifestyle");
        var errorlifestyle = document.getElementById("errorlifestyle");

        mcl.addEventListener("submit", (e) => {
            if (weight.value === "" || lifestyle.value === "Chooselifestyle") {
                e.preventDefault();

                weight.style.border = "1px solid red";
                errorweight.innerHTML = "Enter the weight";
                errorweight.style.color = "red";
                errorweight.style.fontSize = "small";

                lifestyle.style.border = "1px solid red";
                errorlifestyle.innerHTML = "Select the lifestyle";
                errorlifestyle.style.color = "red";
                errorlifestyle.style.fontSize = "small";
            }

            if (weight.value != "") {
                weight.style.border = "1px solid green";
                errorweight.innerHTML = "";
            }

            if (lifestyle.value != "Chooselifestyle") {
                lifestyle.style.border = "1px solid green";
                errorlifestyle.innerHTML = "";
            }
        })


        var memberform = document.getElementById("memberform")
        var membertype = document.getElementById("membertype")
        var trainer = document.getElementById("trainer")
        var errormembertype = document.getElementById("errormembertype");
        var errortrainer = document.getElementById("errortrainer")
        var cardno = document.getElementById("cardno")
        var errorcardno = document.getElementById("errorcardno")
        var expdate = document.getElementById("expdate")
        var errorexpdate = document.getElementById("errorexpdate")
        var cvvno = document.getElementById("cvvno")
        var errorcvvno = document.getElementById("errorcvvno")

        memberform.addEventListener("submit", (e) => {
            if (membertype.value === "choosemembertype" || trainer.value === "chooseyourtrainer" || cardno.value === "" || expdate.value === "" || cvvno.value === "") {
                e.preventDefault();

                membertype.style.border = "1px solid red";
                errormembertype.innerHTML = "Select the member type"
                errormembertype.style.color = "red"
                errormembertype.style.fontSize = "small"

                trainer.style.border = "1px solid red";
                errortrainer.innerHTML = "Select your trainer"
                errortrainer.style.color = "red"
                errortrainer.style.fontSize = "small"

                cardno.style.border = "1px solid red"
                errorcardno.innerHTML = "Enter the card number"
                errorcardno.style.color = "red"
                errorcardno.style.fontSize = "small"

                expdate.style.border = "1px solid red"
                errorexpdate.innerHTML = "Enter the expiry date"
                errorexpdate.style.fontSize = "small"
                errorexpdate.style.color = "red"

                cvvno.style.border = "1px solid red"
                errorcvvno.style.color = "red"
                errorcvvno.style.fontSize = "small"
                errorcvvno.innerHTML = "Enter the cvv number"
            }

            if (membertype.value != "choosemembertype") {
                membertype.style.border = "1px solid green";
                errormembertype.innerHTML = ""
            }

            if (trainer.value != "chooseyourtrainer") {
                trainer.style.border = "1px solid green";
                errortrainer.innerHTML = ""
            }

            if (cardno.value != "") {
                cardno.style.border = "1px solid green"
                errorcardno.innerHTML = ""
            }

            if (expdate.value != "") {
                expdate.style.border = "1px solid green"
                errorexpdate.innerHTML = ""
            }

            if (cvvno.value != "") {
                cvvno.style.border = "1px solid green"
                errorcvvno.innerHTML = ""
            }

            if (cvvno.value.length > 3 || cvvno.value.length < 3) {
                e.preventDefault()
                cvvno.style.border = "1px solid red"
                errorcvvno.style.color = "red"
                errorcvvno.style.fontSize = "small"
                errorcvvno.innerHTML = "Invalid cvv number"
            }

            if (cardno.value.length === 0) {
                e.preventDefault();
                cardno.style.border = "1px solid red";
                errorcardno.innerHTML = "Enter the cardnumber";
                errorcardno.style.color = "red"
                errorcardno.style.fontSize = "small"
            }

            if (cardno.value.length > 16 || cardno.value.length < 16) {
                e.preventDefault();
                cardno.style.border = "1px solid red";
                errorcardno.innerHTML = "invalid card number";
                errorcardno.style.color = "red"
                errorcardno.style.fontSize = "small"
            }

        })

        var forfoodform = document.getElementById("forfoodform");
        var foodname = document.getElementById("foodname");
        var errorfoodname = document.getElementById("errorfoodname")
        var foodqty = document.getElementById("foodqty")
        var errorfoodqty = document.getElementById("errorfoodqty")
        var timing = document.getElementById("timing");
        var errortiming = document.getElementById("errortiming")

        forfoodform.addEventListener("submit", (e) => {

            if (foodname.value === "" || foodqty.value === "" || timing.value === "choosefrom") {
                e.preventDefault()

                foodname.style.border = "1px solid red"
                errorfoodname.innerHTML = "Enter the food name"
                errorfoodname.style.color = "red"
                errorfoodname.style.fontSize = "small"

                foodqty.style.border = "1px solid red"
                errorfoodqty.innerHTML = "Enter the food name"
                errorfoodqty.style.color = "red"
                errorfoodqty.style.fontSize = "small"

                timing.style.border = "1px solid red"
                errortiming.innerHTML = "select your eating timing"
                errortiming.style.color = "red"
                errortiming.style.fontSize = "small"
            }

            if (foodname.value != "") {
                foodname.style.border = "1px solid green"
                errorfoodname.innerHTML = ""
            }

            if (foodqty.value != "") {
                foodqty.style.border = "1px solid green"
                errorfoodqty.innerHTML = ""
            }

            if (timing.value != "choosefrom") {
                timing.style.border = "1px solid red"
                errortiming.innerHTML = "select your eating timing"
            }
        })

        var forexercise = document.getElementById("forexercise")
        var customername = document.getElementById("customername")
        var exercisename = document.getElementById("exercisename")
        var exercisetype = document.getElementById("exercisetype")
        var exerciseduration = document.getElementById("duration")
        var errorcustomername = document.getElementById("errorcustomername")
        var errorexercisename = document.getElementById("errorexercisename")
        var errorexercisetype = document.getElementById("errorexercisetype")
        var errorduration = document.getElementById("errorduration")

        forexercise.addEventListener("submit", (e) => {
            if (customername.value === "" || exercisename.value === "choosename" || exercisetypes.value === "choosetype" || exerciseduration.value === "chooseduration") {
                e.preventDefault();

                customername.style.border = "1px solid red"
                errorcustomername.innerHTML = "Enter the customer name"
                errorcustomername.style.color = "red"
                errorcustomername.style.fontSize = "small"

                exercisename.style.border = "1px solid red"
                errorexercisename.innerHTML = "Select your exercise"
                errorexercisename.style.color = "red"
                errorexercisename.style.fontSize = "small"

                exercisetype.style.border = "1px solid red"
                errorexercisetype.innerHTML = "Select your exercise type"
                errorexercisetype.style.color = "red"
                errorexercisetype.style.fontSize = "small"

                exerciseduration.style.border = "1px solid red"
                errorduration.innerHTML = "Select your duration"
                errorduration.style.color = "red"
                errorduration.style.fontSize = "small"
            }

            if (customername.value != "") {
                customername.style.border = "1px solid green"
                errorcustomername.innerHTML = ""
            }

            if (exercisename.value != "choosename") {
                exercisename.style.border = "1px solid green"
                errorexercisename.innerHTML = ""
            }

            if (exercisetype.value != "choosetype") {
                exercisetype.style.border = "1px solid green"
                errorexercisetype.innerHTML = ""
            }

            if (duration.value != "chooseduration") {
                duration.style.border = "1px solid green"
                errorduration.innerHTML = ""
            }
        })
    </script>

</body>


</html>