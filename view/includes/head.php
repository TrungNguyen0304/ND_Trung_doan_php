<?php
session_start();
include_once "../dbconnect.php";
include_once "../functions.php";

$categories = showAllCategories();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burger</title>
    <link rel="shortcut icon" type="image" href="../public/image/logo.png">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap links -->
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <!-- fonts links -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

</head>

<body>

    <!-- home section -->
    <div class="home-section">
        <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" id="logo"><img src="../public/image/logo.png" alt="" width="30px">BUR<span>GER</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fa-solid fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php" id="first-child">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#topcards">Product</a>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#categories" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                categories
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #ffc800;">
                                <?php
                                foreach ($categories as $cat) {
                                ?>
                                    <li><a class="dropdown-item" href="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact Us</a>
                        </li>
                    </ul>



                    <form class="d-flex" id="search" action="search.php">
                        <input name="key" type="search" class="form-control rounded" placeholder="Search" aria-label="Search">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search" ></i></button>
                        <div class="icons">
                            <!-- <a class="nav-link" href="login.php"><i class="fa-solid fa-user"></i></a> -->
                            <div class="top-navbar">
                                <div class="icons">
                                    <?php
                                    // Kiểm tra xem có phiên đăng nhập hay không
                                    if (isset($_SESSION['name'])) {
                                        echo '' . $_SESSION['name'] . '<a href="logout.php" class="btn btn-primary  ">Đăng Xuất</a>';
                                    } else {
                                        echo '<a href="./login.php"><img src="path/to/your/image.jpg" alt="" ><i class="fa-solid fa-user mt-3 "></i></a>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <a class="nav-link" href="shopping.php"><i class="fa-solid fa-cart-shopping"></i></a>

                        </div>
                    </form>
                </div>
            </div>
        </nav>


        <!-- home content -->

        <!-- home content -->

        <!-- home section -->