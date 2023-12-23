<?php
// Truy vấn database để lấy danh sách
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once "../../dbconnect.php";
include_once "../../functions.php";

// 2. Chuẩn bị câu truy vấn $querySelect, lấy dữ liệu ban đầu của record cần update
if (!isset($_GET['id'])) {
    header('location:index.php');
}
$id = $_GET['id'];


$orders = showOrders($id);
if (isset($_POST['save'])) {
    // 4. Nếu người dùng có bấm nút `Lưu` thì thực thi câu lệnh INSERT
    // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
    $tota = $_POST['tota'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    // 5. Kiểm tra ràng buộc dữ liệu (Validation)
    // Tạo biến lỗi để chứa thông báo lỗi


    if (updateOrders($conn,$id, $tota, $phone, $address)) {
        // Đóng kết nối
      
        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
        header('location:index.php');
    }
}
?>
<?php include_once("../includes/head.php") ?>


                <h1 class="mt-5 fs-3 text-uppercase text-primary">Sửa Danh mục sản phẩm</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="id" class="form-label">id</label>
                        <input value="<?php echo $orders["id"]; ?>" readonly type="text" name="id" class="form-control" id="id">
                    </div>

                    <div class="mb-3">
                        <label for="tota" class="form-label">Tổng cộng</label>
                        <input value="<?php echo $orders["tota"]; ?>" type="text" name="tota" class="form-control" id="tota">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Địa thoại</label>
                        <textarea class="form-control" id="phone" name="phone" rows="3"><?php echo $orders["phone"]; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <textarea class="form-control" id="address" name="address" rows="3"><?php echo $orders["address"]; ?></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary" name="save" value="Lưu">
                </form>
                <?php include_once("../includes/footer.php") ?>
  
    
