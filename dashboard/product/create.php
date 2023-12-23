<?php
include_once "../../dbconnect.php";
include_once "../../functions.php";

$product = createProduct();


    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto ">
                <h1 class="fs-3 text-warning">Trang thêm danh mục sản phẩm</h1>
                <form action=""method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên của danh mục sản phẩm">
                    </div>
                    <div class="mb-3">
                        <label for="categoryID" class="form-label">Loại</label>
                        <textarea class="form-control" id="categoryID" name="categoryID" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Giá</label>
                        <textarea class="form-control" id="price" name="price" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Hình ảnh</label>
                        <input type="file" class="form-control" id="image_upload" name="fileToUpload" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="view" class="form-label">lượt xem</label>
                        <textarea class="form-control" id="view" name="view" rows="5"></textarea>
                    </div>
                    <input class="btn btn-primary" name="submit" type="submit" value="Thêm" />
                </form>
            </div>
        </div>
    </div>

</body>

</html>