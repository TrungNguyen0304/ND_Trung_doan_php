<?php
// Truy vấn database để lấy danh sách
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once "../../dbconnect.php";
include_once "../../functions.php";
if (!isset($_GET['id'])) {
    header('location:index.php');
}
$id = $_GET['id'];
$categoryRow = showCategories($id);
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    // Lấy ngày giờ hiện tại theo định dạng `Năm-Tháng-Ngày Giờ-Phút-Giây`. Vd: 2020-02-18 09:12:12
    $updated_at = date('Y-m-d H:i:s');


    $errors = validationEditCategories($name, $description);
    if (empty($errors)) {
        updateCategories($conn, $id, $name, $description, $updated_at);
       
    } else{
        foreach ($errors as $errorsField){
                echo $errors['msg']. "</br>";
            
        }
    }
}
?>
<?php include_once("../includes/head.php") ?>


                <h1 class="mt-5 fs-3 text-uppercase text-primary">Sửa Danh mục sản phẩm</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input value="<?php echo $categoryRow["id"]; ?>" readonly type="text" name="id" class="form-control" id="id">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Tên</label>
                        <input value="<?php echo $categoryRow["name"]; ?>" type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea class="form-control" id="description" name="description" rows="3"><?php echo $categoryRow["description"]; ?></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary" name="save" value="Lưu">
                </form>
                <?php include_once("../includes/footer.php") ?>



   