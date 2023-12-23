<?php
// Truy vấn database để lấy danh sách
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once "../../dbconnect.php";
include_once "../../functions.php";
if (!isset($_GET['id'])) {
    header('location:index.php');
}
// tạo biến id để chứa các id dc gọi
$id = $_GET['id'];
$product = showProducts($id);
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $categoryID = $_POST['categoryID'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $view = $_POST['view'];
    $image = $_POST['image'];
    $updated_at = date('Y-m-d H:i:s');
    $errors = validationEditProduct($name,$description,$price);
    if (empty($errors)) {
        updateProducts($conn,$id, $name, $categoryID, $price, $description, $image,$view,$updated_at);
    } else{
        foreach ($errors as $errorsField){
            foreach($errorsField as $errors){
                echo $errors['msg']. "</br>";
            }
        }
    }
}

?>
<?php include_once("../includes/head.php") ?>
<h1 class="mt-5 fs-3 text-uppercase text-primary">Sửa Danh mục sản phẩm</h1>
<form action="" method="post">
    <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input value="<?php echo $product["id"]; ?>" readonly type="text" name="id" class="form-control" id="id">
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Tên</label>
        <input value="<?php echo $product["name"]; ?>" type="text" name="name" class="form-control" id="name">
    </div>
    <div class="mb-3">
        <label for="categoryID" class="form-label">Loại</label>
        <textarea class="form-control" id="categoryID" name="categoryID" rows="3"><?php echo $product["categoryID"]; ?></textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Giá</label>
        <textarea class="form-control" id="price" name="price" rows="3"><?php echo $product["price"]; ?></textarea>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">mô tả</label>
        <textarea class="form-control" id="description" name="description" rows="3"><?php echo $product["description"]; ?></textarea>
    </div>
   
    <div class="mb-3">
        <label for="image" class="form-label">hình ảnh</label>
        <textarea class="form-control" id="image" name="image" rows="3"><?php echo $product["image"]; ?></textarea>
    </div>
    <div class="mb-3">
        <label for="view" class="form-label">lượt xem</label>
        <textarea class="form-control" id="view" name="view" rows="3"><?php echo $product["view"]; ?></textarea>
    </div>
    <input type="submit" class="btn btn-primary" name="save" value="Lưu">
</form>
<?php include_once("../includes/footer.php") ?>