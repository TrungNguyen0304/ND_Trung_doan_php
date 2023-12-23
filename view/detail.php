<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burger</title>
    <link rel="shortcut icon" type="image" href="./public/images/logo.png">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap links -->
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- fonts links -->
    <?php
    include_once "../dbconnect.php";
    include_once "../functions.php";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $product_detail = getProduct($id);
    }

    ?>
</head>

<body>
    <!-- home section -->
    <div class="home-section">
        <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" id="logo"><img src="./public/image/logo.png" alt="" width="30px">BUR<span>GER</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fa-solid fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php" id="first-child">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Product-list">Product</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#categories" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                categories
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #ffc800;">
                                <li><a class="dropdown-item" href="categories.php?categoryId=1">Pizza</a></li>
                                <li><a class="dropdown-item" href="categories.php?categoryId=2">Hamburger</a></li>
                                <li><a class="dropdown-item" href="categories.php?categoryId=3">Fried Chicken</a></li>
                                <li><a class="dropdown-item" href="categories.php?categoryId=4">Drink</a></li>
                                <li><a class="dropdown-item" href="categories.php?categoryId=5">Rice & Spaghetti</a>
                                </li>
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
                            <a class="nav-link" href="login.php"><i class="fa-solid fa-user"></i></a>
                            <a class="nav-link" href="shopping.php"><i class="fa-solid fa-cart-shopping"></i></a>

                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
    <section class="py-5">
        <div class="container">
            <main role="main">
                <div class="container mt-4">
                    <div class="cart">

                        <style>
                            .cart {
                                border: 1px solid black;
                                border-radius: 20px;
                            }
                        </style>

                        <div class="container-fliud">

                            <div class="wrapper row">
                                <div class="preview col-md-6">
                                    <div class="preview-pic tab-content">
                                        <div class="tab-pane active" id="pic-3">
                                            <img src="<?php echo "/doan2" . $product_detail['image'] ?>" alt="">
                                        </div>
                                    </div>

                                </div>
                                <div class="details col-md-6 mt-5">
                                    <h3 class="product-title"><?php echo $product_detail['name'] ?></h3>
                                    <div class="rating">
                                        <div class="stars">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                    </div>
                                    <p class="product-description"><?php echo $product_detail['description'] ?></p>

                                    <h4 class="price">Giá hiện tại: <span><?php echo $product_detail['price'] ?><span></span></h4>
                                    <div class="d-flex  mt-3">
                                        <h5 class="sizes mt-1">sizes:
                                            <span class="size" data-toggle="tooltip" title="cỡ Nhỏ">s</span>
                                            <span class="size" data-toggle="tooltip" title="cỡ Trung bình">m</span>
                                            <span class="size" data-toggle="tooltip" title="cỡ Lớn">l</span>
                                            <span class="size" data-toggle="tooltip" title="cỡ Đại">xl</span>
                                        </h5>
                                    </div>
                                    <div class="col-md-4 col-6 mb-3">
                                        <label class="mb-2 d-block">Quantity</label>
                                        <div class="input-group mb-3" style="width: 170px; margin-top: 20px;">
                                            <input id="quantity" type="number" value="1" name="quantity" min="1" class="form-control quantity-input">
                                            <input type="hidden" name="id" value="<?php echo $product_detail['id'] ?>">
                                        </div>
                                    </div>
                                    <div class="button">
                                        <form action="cart.php?id=<?php echo $product_detail['id']; ?>" method="POST">
                                            <button class=" btn btn-default bg-primary text-light mt-4" type="submit" name="app-to-cart">Thêm vào giỏ hàng</button>
                                        </form>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </main>
        </div>
    </section>

    <!-- footer -->
    <?php include_once("../view/includes/footer.php") ?>