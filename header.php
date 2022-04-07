<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yum! - Let's eat some yummy food!</title>

    <link rel="stylesheet" href="styles/style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap Icon  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
            <div class="container-lg">
                <a class="navbar-brand h1 mb-0" href="index.php">
                    <img src="images/Yum!.png" alt="Yum.png" width="ms-auto" height="45" class="d-inline-block align-text-center"> YUM! Cafe
                </a>
                <!-- End of .navbar-brand -->

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- End of .navbar-toggler  -->

                <div class="collapse navbar-collapse justify-content-end flex-row-reverse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php" data-pathname="/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="menu.php" data-pathname="/menu.php">Menu</a>
                        </li>

                        <?php
                        if (isset($_SESSION["accountID"])) {
                        ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $_SESSION["email"] ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="./change-password.php">Change Password</a></li>
                                    <li><a class="dropdown-item" href="./order-history.php">Order History</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="./include/logout.php">Sign out</a></li>
                                </ul>
                            </li>

                        <?php
                        } else {
                        ?>

                            <a href="./login.php" class="btn btn-outline-primary navbar-btn" id="btn-signin">Sign In</a>

                        <?php
                        }
                        ?>
                    </ul>
                    <!-- End of .navbar-nav  -->
                </div>
                <!-- End of .collapse .navbar-collapse .flex-row-reverse  -->
            </div>
            <!-- End of .container-lg  -->
        </nav>
        <!-- End of .navbar .navbar-expand-lg .navbar-light .bg-light  -->
    </header>
    <!-- End of header tag -->