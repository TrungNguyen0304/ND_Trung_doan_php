<?php

include_once "../dbconnect.php";
include_once "../functions.php";
$product = showAllproducts();
$product_hot = showAllHotproducts();
?>



<?php include_once("../view/includes/head.php") ?>

<section class="home">
    <div class="content">
        <h1>Super Delicious
            <br> <span>Burger</span>
        </h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, iste!</p>
        <div id="btn"><button>Order Now</button> <span>$100.50</span></div>
    </div>
    <div class="img">
        <img src="../public/image/burger.png" alt="">
    </div>
</section>
</div>
<!-- top icons -->
<div class="container" id="top-icons">
    <h1>OFFERS</h1>
    <div class="row">
        <div class="col-md-3 py-3 py-md-0">
            <i><img src="../public/image/offer1.png" alt=""></i>
            <h3>Burger 50% off</h3>
        </div>
        <div class="col-md-3 py-3 py-md-0">
            <i><img src="../public/image/offer2.png" alt=""></i>
            <h3>Free Delivery</h3>
        </div>
        <div class="col-md-3 py-3 py-md-0">
            <i><img src="../public/image/offer3.png" alt=""></i>
            <h3>Burger free fries</h3>
        </div>
        <div class="col-md-3 py-3 py-md-0">
            <i><img src="../public/image/offer4.png" alt=""></i>
            <h3>Burger with free cold drink</h3>
        </div>
    </div>
</div>
<!-- top icons -->



<!-- cards -->
<div class="container" id="cards">
    <div class="row">
        <div class="col-md-6 py-3 py-md-0">
            <div class="card">
                <img src="../public/image/cards1.png" alt="">
                <div class="card-img-overlay">
                    <h3>HamBurger</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <button id="rn">Order Now</button>
                </div>
            </div>
        </div>
        <div class="col-md-6 py-3 py-md-0">
            <div class="card">
                <img src="../public/image/cards2.png" alt="">
                <div class="card-img-overlay">
                    <h3>Pizza</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <button id="rn">Order Now</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 30px;">
        <div class="col-md-4 py-3 py-md-0">
            <div class="card">
                <img src="../public/image/cards3.png" alt="">
                <div class="card-img-overlay">
                    <h3>Italian pizza</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <button id="rn">Order Now</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
            <div class="card">
                <img src="../public/image/cards4.png" alt="">
                <div class="card-img-overlay">
                    <h3>Fried Chicken</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <button id="rn">Order Now</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
            <div class="card">
                <img src="../public/image/cards5.png" alt="">
                <div class="card-img-overlay">
                    <h3>Chesse Burger</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <button id="rn">Order Now</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cards -->



<div class="container" id="topcards">
    <h1 class="b1">PRODUCT</h1>
    
</div>


<div class="container" id="topcards">
    <h2 class="b2">TOP </h2>

    <div class="row" style="margin-top: 30px;" id="product-list">

        <?php
        foreach ($product_hot as $row) {
        ?>
            <div class="col-md-3 py-3 py-md-0">
                <a class="card" style="text-decoration: none" href="detail.php?id=<?php echo $row['id'] ?>">
                    <img src="<?php echo $row['image'] ?>" alt="">
                    <div class="card-body">
                        <h3><?php echo $row['name'] ?></h3>
                        <p><?php echo $row['description'] ?></p>
                        <h5><?php echo $row['price'] ?><span><i class="fa-solid fa-basket-shopping"></i></span></h5>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>

</div>



<!-- burger -->
<!-- <div class="container" id="categories">
    <h1 class="b1">CATEGORIES</h1>
    <div class="row" style="margin-top: 30px;" id="categories-list">
        <div class="col-md-3 py-3 py-md-0">
            <div class="card">
                <img src="../public/image/nuoc.jpg" alt="">
                <div class="card-body">
                    <h3>Tasty Burger</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <h5>$10.50 <span><i class="fa-solid fa-basket-shopping"></i></span></h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 py-3 py-md-0">
            <div class="card">
                <img src="../public/image/ga.jpg">
                <div class="card-body">
                    <h3>Onion burger</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <h5>$5.60 <span><i class="fa-solid fa-basket-shopping"></i></span></h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 py-3 py-md-0">
            <div class="card">
                <img src="../public/image/BG_New.jpg" alt="">
                <div class="card-body">
                    <h3>Classic Burger</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <h5>$3.20 <span><i class="fa-solid fa-basket-shopping"></i></span></h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 py-3 py-md-0">
            <div class="card">
                <img src="../public/image/p1.png" alt="">
                <div class="card-body">
                    <h3>Best Burger</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <h5>$1.50 <span><i class="fa-solid fa-basket-shopping"></i></span></h5>
                </div>
            </div>
        </div>
    </div>


</div> -->
<!-- burger -->





<!-- banner -->
<div class="banner">
    <h3>Other Product</h3>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto, voluptatibus?</p>
    <button id="btnorder">Order Now</button>
</div>
<!-- banner -->


<!-- product cards  hot-->










<!-- burger -->
<div class="container" id="burger">
    <h1 class="b1">DAILY DISCOVER</h1>
    <div class="row" style="margin-top: 30px;" id="product-list">

        <?php
        foreach ($product as $row) {
        ?>
            <div class="col-md-3 py-3 py-md-0">
            <a class="card" style="text-decoration: none" href="detail.php?id=<?php echo $row['id'] ?>">
                    <img src="<?php echo $row['image'] ?>" alt="">
                    <div class="card-body">
                        <h3><?php echo $row['name'] ?></h3>
                        <p><?php echo $row['description'] ?></p>
                        <h5><?php echo $row['price'] ?><span><i class="fa-solid fa-basket-shopping"></i></span></h5>
                    </div>
        </a>
            </div>
        <?php } ?>
    </div>
</div>
<!-- burger -->








<!-- about -->
<div class="container" id="about">
    <h1>ABOUT</h1>
    <div class="row">
        <div class="col-md-6 py-3 py-md-0">
            <div class="card">
                <img src="./image/about.png" alt="">
            </div>
        </div>
        <div class="col-md-6 py-3 py-md-0">
            <h2>Delicious Burger</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam accusamus exercitationem ut. Non
                assumenda nihil tempore minima consequatur corrupti numquam quia dolorum laborum praesentium vero
                commodi ex velit expedita, omnis adipisci? Exercitationem consequatur ducimus praesentium dolores
                rerum voluptatibus, nam illo quas modi deleniti iusto laboriosam adipisci enim excepturi, cupiditate
                quidem neque tempora sunt animi natus aliquid. Fugiat eligendi molestiae magnam vero dicta est
                praesentium unde ducimus eveniet commodi alias, pariatur quis quod saepe sed accusamus porro nemo
                doloribus cumque quos quo nihil! Numquam explicabo odit accusamus laudantium molestiae. Ipsum culpa
                dolor sequi dolore doloribus aperiam, earum maxime alias voluptates magni.</p>
            <div id="readmorebtn"><button>Read More...</button></div>
        </div>
    </div>
</div>
<!-- about -->






<!-- contact -->
<div class="container">
    <h2 id="h2">CONTACT</h2>
</div>
<div class="container" id="contact">
    <div class="row">
        <div class="col-md-6 py-3 py-md-0">
            <h3>CONTACT</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas dolorem sit excepturi, nemo
                reiciendis animi?</p>
            <input type="text" placeholder="Name"><br>
            <input type="email" placeholder="Email"><br>
            <input type="number" placeholder="Phone"><br>
            <button id="btnmessage">Send</button>
        </div>
        <div class="col-md-6 py-3 py-md-0">
            <h3>INFO</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, odio assumenda nostrum commodi at
                corporis!</p>
            <i class="fas fa-phone"> <span>+000000000000000</span></i><br>
            <i class="fa-solid fa-envelope"> <span>example@gmail.com</span></i><br>
            <i class="fa-solid fa-location-dot"> <span>Pakistan sindh Karachi</span></i><br>
        </div>
    </div>
</div>

<!-- contact -->

<?php include_once("../view/includes/footer.php") ?>