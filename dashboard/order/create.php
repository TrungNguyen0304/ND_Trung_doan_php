<?php
include_once "../../dbconnect.php";
include_once "../../functions.php";
$orders = createOrders();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto ">
                <h1 class="fs-3 text-warning">Trang thêm orders</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="tota" class="form-label">Tổng cộng</label>
                        <input type="text" class="form-control" id="tota" name="tota" placeholder="Tổng cộng"/>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Điện thoại</label>
                        <textarea class="form-control" id="phone" name="phone" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">địa chỉ</label>
                        <textarea class="form-control" id="address" name="address" rows="5"></textarea>
                    </div>
                    <input class="btn btn-primary" name="submit" type="submit" value="Thêm" />
                </form>
            </div>
        </div>
    </div>

</body>

</html>