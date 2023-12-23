<?php
include_once "../../dbconnect.php";
include_once "../../functions.php";
$categories = createCategories();




?>
<?php include_once("../includes/head.php") ?>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto ">
                <h1 class="fs-3 text-warning">Trang thêm danh mục sản phẩm</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên của danh mục sản phẩm">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                    </div>
                    <input class="btn btn-primary" name="submit" type="submit" value="Thêm" />
                </form>
                <?php include_once("../includes/footer.php") ?>
</body>

</html>