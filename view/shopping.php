<?php

session_start();
require_once "../dbconnect.php";
include_once "../functions.php";

$categories = showAllCategories();

// if (!isset($_SESSION['email'])) {
//     // Redirect to the login page or any other page you prefer
//     header("Location: ./login.php");
//     exit();


// }

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
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        <div class="icons">

                            <!-- <a class="nav-link" href="login.php"><i class="fa-solid fa-user"></i></a> -->
                            <div class="top-navbar">
                                <div class="icons">
                                    <?php
                                    // Kiểm tra xem có phiên đăng nhập hay không
                                    if (isset($_SESSION['name'])) {
                                        echo '' . $_SESSION['name'] . '<a href="logout.php" class="btn btn-primary ">Đăng Xuất</a>';
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
    </div>
    <section class=" gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center my-4">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class=" text-center">
                            <h1>SHOPPING</h1>
                        </div>
                        <?php
                        if (isset($_SESSION["cart"])) {
                            foreach ($_SESSION["cart"] as $value) { ?>
                                <hr class="my-4" />
                                <div class="card-body">
                                    <!-- Single item -->
                                    <div class="row">
                                        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                            <!-- Image -->
                                            <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                                <img src="<?php echo "/doan2" . $value['image'] ?>" class="w-100" alt="" />

                                            </div>
                                            <!-- Image -->
                                        </div>

                                        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0 mt-5 ">
                                            <!-- Data -->
                                            <h4><?php echo $value['name'] ?></h4>
                                            <p>Mô tả: <?php echo $value['description'] ?></p>
                                            <div class="text-start  ">
                                                <h4> Giá :<?php echo $value['price'] ?>$</h4>
                                            </div>

                                            <!-- Data -->
                                        </div>

                                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0  mt-5">
                                            <!-- Quantity -->
                                            <form action="cart.php">
                                                <div class="d-flex mb-4" style="max-width: 100px">
                                                    <input type="hidden" name="action" value="update">
                                                    <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                                                    <input type="number" min="1" name="quantity" value="<?php echo $value['quantity'] ?>" class="form-control quantity-input">

                                                </div>
                                                <a class="btn btn-primary btn-sm me-1 mb-2" href="delete.php?id=<?php echo $value["id"];  ?>">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-sm mb-2"> Update</button>
                                                <!-- Quantity -->
                                            </form>


                                        </div>
                                    </div>
                                    <!-- Single item -->
                                </div>

                        <?php
                            }
                        }

                        ?>


                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Summary</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Số lượng
                                    <span><?php echo isset($_SESSION["totalQuantity"]) ? $_SESSION["totalQuantity"] : 0; ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Tổng giá trị</strong>

                                    </div>
                                    <span><strong><?php echo isset($_SESSION["totalAmount"]) ? number_format($_SESSION["totalAmount"], 0, ',', '.') . " VNĐ" : "0 VNĐ"; ?></strong></span>
                                </li>
                            </ul>

                            <!-- <button type="button" class="btn btn-primary btn-lg btn-block">
                                Go to checkout
                            </button> -->
                            <a href="checkout.php" class="btn btn-primary"> Go to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer" style="margin-top: 50px;">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <a class="navbar-brand" href="#" id="logo2"><img src="./public/images/logo.png" alt="" width="30px">Burger</a>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, libero.</p><br>
                        <p>
                            Karachi <br><br>
                            Sindh <br><br>
                            Pakistan <br><br>
                        </p>
                        <strong><i class="fa-solid fa-phone"></i> Phone:
                            <strong>+0000000000000000</strong></strong><br>
                        <strong><i class="fa-solid fa-envelope"></i> Email:
                            <strong>example@gmail.com</strong></strong>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Privacy policay</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, aperiam.</p>
                        <ul>
                            <li><a href="#">Pizza</a></li>
                            <li><a href="#">Fried chicken</a></li>
                            <li><a href="#">Fries</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Socail Links</h4>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perferendis, minus.</p>
                        <div class="socail-links mt-3">
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#"><i class="fa-brands fa-google-plus"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <hr>
        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong>Burger</strong>.All Rights reserved
            </div>
            <div class="credits">
                Designed By <a href="#">SA coding</a>
            </div>
        </div>
    </footer>

</body>