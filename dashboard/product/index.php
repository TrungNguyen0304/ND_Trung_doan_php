<?php
include_once "../../dbconnect.php";
include_once "../../functions.php";
$product = showAllproducts();
?>
<?php include_once("../includes/head.php") ?>
<h1 class="fs-3 text-warning">Trang danh mục sản phẩm <a href="../index.php"><i class="fa-solid fa-house"></i></a></h1>
<style>
    img {
        height: 100px;
        width: 100  px;
        object-fit: cover;
    }
</style>

<a href="./create.php" class="btn btn-primary d-inline-flex"><i data-lucide="badge-plus"></i>Thêm</a>

<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>ID</th>
            <th>Tên</th>
            <th>Loại</th>
            <th>giá</th>
            <th>Mô tả</th>
            <th>hình ảnh</th>
            <th>lượt xem</th>
            <th>Ngày Tạo</th>
            <th>Ngày cập nhập</th>
            <th>##</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($product as $cat) { ?>
            <tr>
                <td><?php echo $cat['index'] ?></td>
                <td><?php echo $cat['id'] ?></td>
                <td><?php echo $cat['name'] ?></td>
                <td><?php echo $cat['categoryID'] ?></td>
                <td><?php echo $cat['price'] ?></td>
                <td><?php echo $cat['description'] ?></td>
                
                <td> <img src="<?php echo $cat['image']; ?>"></td>
                <td><?php echo $cat['view'] ?></td>
                <td><?php echo $cat['created_at'] ?></td>
                <td><?php echo $cat['updated_at'] ?></td>
                <td>
                    <a href="./edit.php?id=<?php echo $cat['id'] ?>" class="btn btn-primary"><i data-lucide="pencil"></i></a>
                    <a href="./delete.php?id=<?php echo $cat['id'] ?>" class="btn btn-danger"><i data-lucide="trash"></i></a>

                </td>

            </tr>
        <?php } ?>
    </tbody>

</table>
<?php include_once("../includes/footer.php") ?>