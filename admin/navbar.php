<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="shortcut icon" href="../assets/logo.jpg" type="image/x-icon">
    <style>
        .nav-item a:hover {
            background-color: dodgerblue;
            border-radius: 5px;
            width: 80%;
            margin-left: 10%;
        }

        .nav-item:hover .nav-link {
            color: white;
        }

        .sidebar {
            position: fixed;
            width: 15%;
            left: 0;
            padding: 10px 15px;
            height: 100vh;
            text-align: center;
            z-index: 10;
            transition: all 0.5s;
        }

        .nav-link {
            color: aliceblue;
            transform: scale(1.2);
        }

        @media only screen and (max-width:1024px) {
            .sidebar {
                position: fixed;
                width: 30%;
                padding: 10px 15px;
                height: 100%;
                text-align: center;
            }
        }

        .display {
            transform: translateX(-100%);
            transition: all 0.5s;
        }
    </style>
</head>

<body>

    <div class="d-inline">
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top w-100">
                <button class="btn"><i class="fas fa-bars fa-2x text-white"></i></button>

                <a href="./navbar.php" class="navbar-brand ml-auto">
                    DBR fitness
                    <img src="../assets/logo.jpg" class="rounded-circle" height="50" width="50">
                </a>
            </nav>
        </div>

        <div class="sidebar bg-dark" id="sidebar">
            <ul class="navbar-nav" id="links">
                <li class="nav-item">
                    <a href="./dashboard.php" class="nav-link my-3">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="./manageorders.php" class="nav-link my-3">Manage Orders</a>
                </li>
                <li class="nav-item">
                    <a href="./queries.php" class="nav-link my-3">Queries</a>
                </li>
                <li class="nav-item">
                    <a href="./category.php" class="nav-link my-3">New Category</a>
                </li>
                <li class="nav-item">
                    <a href="./add_products.php" class="nav-link my-3">Add products</a>
                </li>
                <li class="nav-item">
                    <a href="./foodcalories.php" class="nav-link my-3">Add food for calories</a>
                </li>
                <li class="nav-item">
                    <a href="./manage_products.php" class="nav-link my-3">Manage products</a>
                </li>
                <li class="nav-item">
                    <a href="./trainers.php" class="nav-link my-3"> Add New Trainers</a>
                </li>
                <li class="nav-item">
                    <a href="./managetrainers.php" class="nav-link my-3">Manage Trainers</a>
                </li>
                <li class="nav-item">
                    <a href="./salesreport.php" class="nav-link my-3">Sales Report</a>
                </li>


                <li class="nav-item">
                    <a href="../logout.php" class="nav-link my-3">Logout</a>
                </li>

            </ul>
        </div>
    </div>

    <script src="../bootstrap/js/Jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="../bootstrap/js/bs-custom-file-input.min.js"></script> -->
    <script>
        var btn = document.querySelector(".btn")
        links = document.querySelector(".sidebar")

        btn.addEventListener("click", () => {
            console.log("click")
            links.classList.toggle("display");
        })
    </script>

</body>

</html>