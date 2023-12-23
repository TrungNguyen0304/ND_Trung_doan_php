<?php




// user
function showAllUsers()
{
    global $conn;
    $query = "SELECT * FROM user";
    // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
    $result = mysqli_query($conn, $query);
    // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tách để sử dụng
    // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
    // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về

    $user = array();

    if ($result->num_rows > 0) {
        $rowNum = 1;
        while ($row = $result->fetch_assoc()) {
            $user[] = array(
                "index" => $rowNum++,
                "id" => $row['id'],
                "name" => $row['name'],
               
                "email" => $row['email'],
                "password" => $row['password'],
                "address" => $row['address'],
                "phone" => $row['phone']

            );
        }
    }
    return $user;
}
function createUsers()
{
    global $conn;
    if (isset($_POST['submit'])) {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];


        // 4. Kiểm tra ràng buộc dữ liệu (Validation)
        // Tạo biến lỗi để chứa thông báo lỗi
        $errors = validationCreateUser( $name, $email, $password, $address, $phone);
        // 5. Kiểm tra xem có lỗi hay không
        if (empty($errors)) {
            // 6. Nếu không có lỗi, thực hiện câu lệnh SQL
            $queryInsert = "INSERT INTO user (name, email, password, address, phone) 
                            VALUES ('$name', '$email', '$password', '$address', '$phone')";


            if (mysqli_query($conn, $queryInsert)) {
                // Đóng kết nối
                mysqli_close($conn);

                // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
                header('location:index.php');
            } else {
                echo "Error: " . $queryInsert . "<br>" . mysqli_error($conn);
            }
        } else {
            // 7. Nếu có lỗi, xử lý lỗi (ví dụ: hiển thị thông báo lỗi)
            echo '<div style="color: red;">' . $errors['msg'] . '</div>';
        }
    }
}
function validationCreateUser( $name, $email, $password, $address, $phone)
{
    $errors = [];

    // --- Kiểm tra Tên của danh mục sản phẩm (validate)
    // required (bắt buộc nhập <=> không được rỗng)
    if ( empty($name) || empty($email) || empty($password) || empty($address) || empty($phone)) {
        $errors['fastname'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'rule' =>  $name . $email . $password . $address . $address,
            $errors['msg'] = 'Không được để trống thông tin',
        ];
    }

    if (strpos($email, '@gmail.com') === false) {
        $errors['email'][] = [
            'rule' => 'contains_at',
            'rule_value' => true,
            'value' => $email,
            $errors['msg'] = 'Địa chỉ email phải chứa ký tự "@gmail.com"',
        ];
    }
    if (!empty($password) && strlen($password) < 8) {
        $errors['password'][] = [
            'rule' => 'minlength',
            'rule_value' => true,
            'value' => $password,
            $errors['msg'] = 'Password phải có ít nhât 8 kí tự',
        ];
    }
    if (!empty($password) && strlen($password) > 26) {
        $errors['password'][] = [
            'rule' => 'minlength',
            'rule_value' => true,
            'value' => $password,
            $errors['msg'] = 'Password không quá 26 kí tự',
        ];
    }
    if (!preg_match('/[A-Z]/', $password)) {
        $errors['password'][] = [
            'rule' => 'contains_uppercase',
            'rule_value' => true,
            'value' => $password,
            $errors['msg'] = 'Mật khẩu phải chứa ít nhất một chữ hoa',
        ];
    }

    return $errors;
}
function deleteUsers()
{
    global $conn;
    // 2. Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
    // Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
    $id = $_GET['id'];
    $queryDelete = "DELETE FROM user WHERE id='$id';";

    // 3. Thực thi câu lệnh DELETE
    $result = mysqli_query($conn, $queryDelete);

    // 4. Đóng kết nối
    mysqli_close($conn);

    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    header('location:index.php');
}
function showUsers($id)
{
    global $conn;
    $queryGet = " SELECT * FROM user WHERE id=$id";
    $result = mysqli_query($conn, $queryGet);
    $usersRow = $result->fetch_assoc();
    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if (empty($usersRow)) { // empty dùng để xác định một biến có rổng hay ko
        echo "giá trị id: $id không tồn tại. Vui lòng kiểm tra laị ";
        // điều hướng về trang index.php
        header("Location:index.php");
    }
    return $usersRow;
}
function validationEditUser( $name, $email, $password, $address, $phone)
{
    $errors = [];

    // --- Kiểm tra Tên của danh mục sản phẩm (validate)
    // required (bắt buộc nhập <=> không được rỗng)
    if ( empty($name) || empty($email) || empty($password) || empty($address) || empty($phone)) {
        $errors['fastname'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $name . $email . $password . $address . $address,
            $errors['msg'] = 'Không được để trống thông tin',
        ];
    }

    if (strpos($email, '@gmail.com') === false) {
        $errors['email'][] = [
            'rule' => 'contains_at',
            'rule_value' => true,
            'value' => $email,
            $errors['msg'] = 'Địa chỉ email phải chứa ký tự "@gmail.com"',
        ];
    }
    if (!empty($password) && strlen($password) < 8) {
        $errors['password'][] = [
            'rule' => 'minlength',
            'rule_value' => true,
            'value' => $password,
            $errors['msg'] = 'Password phải có ít nhât 8 kí tự',
        ];
    }
    if (!empty($password) && strlen($password) > 26) {
        $errors['password'][] = [
            'rule' => 'minlength',
            'rule_value' => true,
            'value' => $password,
            $errors['msg'] = 'Password không quá 26 kí tự',
        ];
    }
    if (!preg_match('/[A-Z]/', $password)) {
        $errors['password'][] = [
            'rule' => 'contains_uppercase',
            'rule_value' => true,
            'value' => $password,
            $errors['msg'] = 'Mật khẩu phải chứa ít nhất một chữ hoa',
        ];
    }

    return $errors;
}

function updateUser($conn, $id, $name,  $email, $password, $address, $phone)
{

    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    $address = mysqli_real_escape_string($conn, $address);
    $phone = mysqli_real_escape_string($conn, $phone);
    $queryUpdate = "UPDATE user SET name = '$name', email= '$email', password= '$password', address='$address',phone='$phone' WHERE id='$id'";

    if (mysqli_query($conn, $queryUpdate)) {
        mysqli_close($conn);
        header('location:index.php');
    } else {
        echo "Error: " . $queryUpdate . "<br>" . mysqli_error($conn);
    }
}





// product
function showAllproducts()
{
    global $conn;
    $query = "SELECT * FROM product";
    // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
    $result = mysqli_query($conn, $query);
    // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tách để sử dụng
    // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
    // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về

    $product = array();
    $rowNum = 1;

    $domain_name = explode('/', $_SERVER['REQUEST_URI'])[1];


    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $product[] = array(
                "index" => $rowNum++,
                "id" => $row['id'],
                "name" => $row['name'],
                "categoryID" => $row['categoryID'],
                "price" => $row['price'],
                "description" => $row['description'],

                "image" => '/' . $domain_name . $row['image'],
                "view" => $row['view'],
                "created_at" => $row['created_at'],
                "updated_at" => $row['updated_at']

            );
        }
    }
    return $product;
}

function getProduct($id)
{
    global $conn;
    $queryGet = "SELECT * FROM product WHERE id=$id";
    $result = mysqli_query($conn, $queryGet);

    if (!$result) {
        // Handle the case where the query was not successful
        die("Query failed: " . mysqli_error($conn));
    }

    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        return $product;
    } else {
        // Handle the case where no product is found with the given id
        return null;
    }
}
function showAllHotproducts()
{
    global $conn;
    $query = "SELECT * FROM product WHERE VIEW > 50 ORDER BY VIEW DESC LIMIT 50";
    // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
    $result = mysqli_query($conn, $query);
    // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tách để sử dụng
    // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
    // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về

    $product_hot = array();
    $rowNum = 1;

    $domain_name = explode('/', $_SERVER['REQUEST_URI'])[1];


    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $product_hot[] = array(
                "index" => $rowNum++,
                "id" => $row['id'],
                "name" => $row['name'],
                "categoryID" => $row['categoryID'],
                "price" => $row['price'],
                "description" => $row['description'],

                "image" => '/' . $domain_name . $row['image'],
                "view" => $row['view'],
                "created_at" => $row['created_at'],
                "updated_at" => $row['updated_at']

            );
        }
    }
    return $product_hot;
}
function createProduct()
{
    global $conn;
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $categoryID = $_POST['categoryID'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $image = uploadImage();
        $view = $_POST['view'];
        echo "$name  $categoryID  $price  $description $image";
        $created_at = date('Y-m-d H:i:s'); // Lấy ngày giờ hiện tại theo định dạng `Năm-Tháng-Ngày Giờ-Phút-Giây`. Vd: 2020-02-18 09:12:12
        $updated_at = NULL;
        $errors =  validationCreateProduc($name, $price, $description);
        if (empty($errors)) {

            $queryInsert = "INSERT INTO product (name,categoryID,price,description,image,view,created_at,updated_at) 
            VALUES ('$name', '$categoryID','$price','$description','$image','$view','$created_at','$updated_at')";


            if (mysqli_query($conn, $queryInsert)) {
                // Đóng kết nối
                mysqli_close($conn);

                // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
                header('location:index.php');
            } else {
                echo "Error: " . $queryInsert . "<br>" . mysqli_error($conn);
            }
        } else {
            // 7. Nếu có lỗi, xử lý lỗi (ví dụ: hiển thị thông báo lỗi)
            echo '<div style="color: red;">' . $errors['msg'] . '</div>';
        }
    }
}
function deleteProduct()
{
    global $conn;
    // 2. Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
    // Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
    $id = $_GET['id'];
    $queryDelete = "DELETE FROM product WHERE id='$id';";

    // 3. Thực thi câu lệnh DELETE
    $result = mysqli_query($conn, $queryDelete);

    // 4. Đóng kết nối
    mysqli_close($conn);

    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    header('location:index.php');
}
function showProducts($id)
{
    global $conn;
    $queryGet = " SELECT * FROM product WHERE id=$id";
    $result = mysqli_query($conn, $queryGet);
    $productsRow = $result->fetch_assoc();
    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if (empty($productsRow)) { // empty dùng để xác định một biến có rổng hay ko
        echo "giá trị id: $id không tồn tại. Vui lòng kiểm tra laị ";
        // điều hướng về trang index.php
        header("Location:index.php");
    }
    return $productsRow;
}
function validationCreateProduc($name, $price, $description)
{
    $errors = [];

    // --- Kiểm tra Tên của danh mục sản phẩm (validate)
    // required (bắt buộc nhập <=> không được rỗng)
    if (empty($name) || empty($price) || empty($description)) {
        $errors['fastname'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'rule' => $name . $price . $description,
            $errors['msg'] = 'Không được để trống thông tin',
        ];
    }

    if (strlen($name) < 5) {
        $errors['name'][] = [
            'rule' => 'minlength',
            'rule_value' => 5,
            'value' => $name,
            $errors['msg'] = 'Tên sản phẩm phải có ít nhất 5 ký tự',
        ];
    }
    if (strlen($description) < 10) {
        $errors['name'][] = [
            'rule' => 'minlength',
            'rule_value' => 10,
            'value' => $description,
            $errors['msg'] = 'thông tin sản phẩm phải có ít nhất 5 ký tự',
        ];
    }


    return $errors;
}
function validationEditProduct($name, $price, $description,)
{
    $errors = [];

    // --- Kiểm tra Tên của danh mục sản phẩm (validate)
    // required (bắt buộc nhập <=> không được rỗng)
    if (empty($name)) {
        $errors['name'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'rule' => '$name',
            'msg' => 'vui lòng nhập tên sản phẩm'
        ];
    }
    if (empty($price)) {
        $errors['name'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'rule' => '$name',
            'msg' => 'vui lòng nhập giá sản phẩm'
        ];
    }

    if (empty($description)) {
        $errors['name'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'rule' => '$name',
            'msg' => 'vui lòng nhập thông tin sản phầm sản phẩm'
        ];
    }
    return $errors;
}
function updateProducts($conn, $id, $name, $categoryID, $price, $description, $image, $view, $updated_at)
{
    $name = mysqli_real_escape_string($conn, $name);
    $categoryID = mysqli_real_escape_string($conn, $categoryID);
    $price = mysqli_real_escape_string($conn, $price);
    $description = mysqli_real_escape_string($conn, $description);
    $image = mysqli_real_escape_string($conn, $image);
    $updated_at = mysqli_real_escape_string($conn, $updated_at);

    $queryUpdate = "UPDATE product SET name = '$name', categoryID = '$categoryID', price ='$price',  description = '$description', image = '$image',view='$view',updated_at = '$updated_at'  WHERE id='$id'";

    if (mysqli_query($conn, $queryUpdate)) {
        mysqli_close($conn);
        header('location:index.php');
    } else {
        echo "Error: " . $queryUpdate . "<br>" . mysqli_error($conn);
    }
}
// function appToCartProduct()
// {
//     global $conn;

//     session_start();

//     // Kiểm tra sự tồn tại của $_GET["id"]
//     if (isset($_GET["id"])) {
//         $id = $_GET["id"];
//         // Sử dụng Prepared Statements để tránh SQL Injection
//         $stmt = $conn->prepare("SELECT * FROM product WHERE id = ?");
//         $stmt->bind_param("i", $id);
//         $stmt->execute();
//         $result = $stmt->get_result();

//         // Kiểm tra xem có dữ liệu trả về hay không
//         if ($result->num_rows > 0) {
//             $product_cat = $result->fetch_assoc();

//             // Kiểm tra sự tồn tại của $_SESSION["cart"]
//             if (empty($_SESSION["cart"])) {
//                 $product_cat["quantity"] = 1;
//                 $_SESSION["cart"][$id] = $product_cat;
//             } else {
//                 // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
//                 if (array_key_exists($id, $_SESSION["cart"])) {
//                     $_SESSION["cart"][$id]["quantity"] += 1;
//                 } else {
//                     $product_cat["quantity"] = 1;
//                     $_SESSION["cart"][$id] = $product_cat;
//                 }
//             }

//             // Đóng kết nối CSDL
//             $stmt->close();

//             // Tính toán tổng cộng số lượng và tổng giá trị
//             $totalQuantity = 0;
//             $totalAmount = 0;
//             foreach ($_SESSION["cart"] as $item) {
//                 $totalQuantity += $item["quantity"];
//                 $totalAmount += $item["quantity"] * $item["price"];
//             }

//             // Lưu tổng cộng vào session (nếu cần)
//             $_SESSION["totalQuantity"] = $totalQuantity;
//             $_SESSION["totalAmount"] = $totalAmount;

//             // Chuyển hướng đến trang shopping.php
//             header("location: shopping.php");
//             exit();
//         } else {
//             // Đóng kết nối CSDL
//             $stmt->close();

//             // Xử lý khi không có dữ liệu sản phẩm tương ứng với id
//             // Ví dụ: Redirect hoặc hiển thị thông báo lỗi.
//             echo "Không tìm thấy sản phẩm.";
//         }
//     } else {
//         // Xử lý khi không có id được truyền vào.
//         // Ví dụ: Redirect hoặc hiển thị thông báo lỗi.
//         echo "Thiếu thông số id.";
//     }
// }

// chi tiết sản phầm





function uploadImage()
{
    $target_dir = __DIR__ . "/storage/";
    echo $target_dir;
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            return "/storage/" . basename($_FILES["fileToUpload"]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}





// categories
function showAllCategories()
{
    global $conn;
    $query = "SELECT * FROM categories";
    // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
    $result = mysqli_query($conn, $query);
    // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tách để sử dụng
    // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
    // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về

    $categories = array();

    if ($result->num_rows > 0) {
        $rowNum = 1;
        while ($row = $result->fetch_assoc()) {
            $categories[] = array(
                "index" => $rowNum++,
                "id" => $row['id'],
                "name" => $row['name'],
                "description" => $row['description'],
                "created_at" => $row['created_at'],
                "updated_at" => $row['updated_at']


            );
        }
    }
    return $categories;
}
function createCategories()
{
    global $conn;
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $created_at = date('Y-m-d H:i:s'); // Lấy ngày giờ hiện tại theo định dạng `Năm-Tháng-Ngày Giờ-Phút-Giây`. Vd: 2020-02-18 09:12:12
        $updated_at = NULL;
        $errors = validationCreateCategories($name, $description);
        if (empty($errors)) {
            $queryInsert = "INSERT INTO categories (name,description,created_at,updated_at) 
                            VALUES ('$name', '$description','$created_at','$updated_at')";



            if (mysqli_query($conn, $queryInsert)) {
                // Đóng kết nối
                mysqli_close($conn);
                // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
                header('location:index.php');
            } else {
                echo "Error: " . $queryInsert . "<br>" . mysqli_error($conn);
            }
        } else {
            // 7. Nếu có lỗi, xử lý lỗi (ví dụ: hiển thị thông báo lỗi)
            echo '<div style="color: red;">' . $errors['msg'] . '</div>';
        }
    }
}
function deleteCategories()
{
    global $conn;
    // 2. Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
    // Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
    $id = $_GET['id'];
    $queryDelete = "DELETE FROM categories WHERE id='$id';";

    // 3. Thực thi câu lệnh DELETE
    $result = mysqli_query($conn, $queryDelete);

    // 4. Đóng kết nối
    mysqli_close($conn);

    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    header('location:index.php');
}
function showCategories($id)
{
    global $conn;
    $queryGet = " SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($conn, $queryGet);
    $catRow = $result->fetch_assoc();
    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if (empty($catRow)) { // empty dùng để xác định một biến có rổng hay ko
        echo "giá trị id: $id không tồn tại. Vui lòng kiểm tra laị ";
        // điều hướng về trang index.php
        header("Location:index.php");
    }
    return $catRow;
}
function validationCreateCategories($name, $description)
{
    $errors = [];

    // --- Kiểm tra Tên của danh mục sản phẩm (validate)
    // required (bắt buộc nhập <=> không được rỗng)
    if (empty($name) || empty($description)) {
        $errors['name'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'rule' => $name  . $description,
            $errors['msg'] = 'Không được để trống thông tin',
        ];
    }
    if (strlen($name) < 5) {
        $errors['name'][] = [
            'rule' => 'minlength',
            'rule_value' => 5,
            'value' => $name,
            $errors['msg'] = 'Tên sản phẩm phải có ít nhất 5 ký tự',
        ];
    }
    if (strlen($description) < 10) {
        $errors['name'][] = [
            'rule' => 'minlength',
            'rule_value' => 10,
            'value' => $description,
            $errors['msg'] = 'thông tin sản phẩm phải có ít nhất 5 ký tự',
        ];
    }



    return $errors;
}
function validationEditCategories($name, $description)
{
    $errors = [];

    // --- Kiểm tra Tên của danh mục sản phẩm (validate)
    // required (bắt buộc nhập <=> không được rỗng)
    if (empty($name) || empty($description)) {
        $errors['fastname'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $name . $description,
            $errors['msg'] = 'Không được để trống thông tin',
        ];
    }

    if (strlen($name) < 5) {
        $errors['name'][] = [
            'rule' => 'minlength',
            'rule_value' => 5,
            'value' => $name,
            $errors['msg'] = 'Tên sản phẩm phải có ít nhất 5 ký tự',
        ];
    }
    if (strlen($description) < 10) {
        $errors['name'][] = [
            'rule' => 'minlength',
            'description' => 10,
            'value' => $description,
            $errors['msg'] = 'thông tin sản phẩm phải có ít nhất 10 ký tự',
        ];
    }

    return $errors;
}

function updateCategories($conn, $id, $name, $description, $updated_at)
{
    $name = mysqli_real_escape_string($conn, $name);
    $description = mysqli_real_escape_string($conn, $description);

    $updated_at = mysqli_real_escape_string($conn, $updated_at);


    $queryUpdate = "UPDATE categories SET name = '$name', description = '$description', updated_at = '$updated_at' WHERE id='$id'";

    if (mysqli_query($conn, $queryUpdate)) {
        mysqli_close($conn);
        header('location:index.php');
    } else {
        echo "Error: " . $queryUpdate . "<br>" . mysqli_error($conn);
    }
}




//order

function showAllOrders()
{
    global $conn;
    $query = "SELECT * FROM orders";
    // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
    $result = mysqli_query($conn, $query);
    // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tách để sử dụng
    // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
    // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về

    $orders = array();

    if ($result && $result->num_rows > 0) {
        $rowNum = 1;
        while ($row = $result->fetch_assoc()) {
            $orders[] = array(
                "index" => $rowNum++,
                "id" => $row['id'],
                "tota" => $row['tota'],
                "phone" => $row['phone'],
                "address" => $row['address']
            );
        }
    }
    return $orders;
}
function createOrders()
{
    global $conn;
    if (isset($_POST['submit'])) {
        $tota = $_POST['tota'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        // 4. Kiểm tra ràng buộc dữ liệu (Validation)
        // Tạo biến lỗi để chứa thông báo lỗi


        // 6. Nếu không có lỗi dữ liệu sẽ thực thi câu lệnh SQL
        // Câu lệnh INSERT

        $queryInsert = "INSERT INTO orders (tota, phone, address) VALUES ('$tota', '$phone','$address')";

        if (mysqli_query($conn, $queryInsert)) {
            // Đóng kết nối
            mysqli_close($conn);

            // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
            header('location:index.php');
        } else {
            echo "Error: " . $queryInsert . "<br>" . mysqli_error($conn);
        }
    }
}
function deleteOrders()
{
    global $conn;
    // 2. Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
    // Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
    $id = $_GET['id'];
    $queryDelete = "DELETE FROM orders WHERE id='$id';";

    // 3. Thực thi câu lệnh DELETE
    $result = mysqli_query($conn, $queryDelete);

    // 4. Đóng kết nối
    mysqli_close($conn);

    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    header('location:index.php');
}
function showOrders($id)
{
    global $conn;
    $queryGet = " SELECT * FROM orders WHERE id=$id";
    $result = mysqli_query($conn, $queryGet);
    $catRow = $result->fetch_assoc();
    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if (empty($catRow)) { // empty dùng để xác định một biến có rổng hay ko
        echo "giá trị id: $id không tồn tại. Vui lòng kiểm tra laị ";
        // điều hướng về trang index.php
        header("Location:index.php");
    }
    return $catRow;
}
function updateOrders($conn, $id, $tota, $phone, $address)
{
    $name = mysqli_real_escape_string($conn, $tota);
    $description = mysqli_real_escape_string($conn, $phone);

    $updated_at = mysqli_real_escape_string($conn, $address);


    $queryUpdate = "UPDATE orders SET tota = '$tota', phone = '$phone', address = '$address' WHERE id='$id'";

    if (mysqli_query($conn, $queryUpdate)) {
        mysqli_close($conn);
        header('location:index.php');
    } else {
        echo "Error: " . $queryUpdate . "<br>" . mysqli_error($conn);
    }
}





function checkLogin($email, $password, $conn)
{
    $query = "SELECT * FROM user WHERE email = ? AND password = ?";
    
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Fetch the user data
    $user = $result->fetch_assoc();

    // Check if the user exists
    if (empty($user)) {
        echo "Tài khoản không tồn tại!";
    } else {
        session_start();
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name']; 
        // Redirect to the index.php page upon successful login
        header("location: index.php");
        exit();
    }
}
function checkLoginAMD($email, $password, $conn)
{
    $query = "SELECT * FROM user WHERE email = ? AND password = ?";
    
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Fetch the user data
    $user = $result->fetch_assoc();

    // Check if the user exists
    if (empty($user)) {
        echo "Tài khoản không tồn tại!";
    } else {
        session_start();
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name']; 
        // luu user_id
        // Redirect to the index.php page upon successful login
        header("location: index.php");
        exit();
    }
}


function registerAMD($name, $email, $password, $address, $phone)
{
    global $conn;

    // Sử dụng prepared statement để ngăn chặn SQL injection
    $query = "INSERT INTO user (name, email, password, address, phone) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        // Biding tham số và thực hiện truy vấn
        mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $password, $address, $phone);
        $result = mysqli_stmt_execute($stmt);

        // Đóng statement
        mysqli_stmt_close($stmt);

        return $result;
    } else {
        // Xử lý lỗi nếu prepare statement thất bại
        echo "Lỗi prepare statement: " . mysqli_error($conn);
        return false;
    }
}

function register($name, $email, $password, $address, $phone)
{
    global $conn;

    // Sử dụng prepared statement để ngăn chặn SQL injection
    $query = "INSERT INTO user (name, email, password, address, phone) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        // Biding tham số và thực hiện truy vấn
        mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $password, $address, $phone);
        $result = mysqli_stmt_execute($stmt);

        // Đóng statement
        mysqli_stmt_close($stmt);

        return $result;
    } else {
        // Xử lý lỗi nếu prepare statement thất bại
        echo "Lỗi prepare statement: " . mysqli_error($conn);
        return false;
    }
}



function checkExistingUser($email) {
    global $conn;
    $stmt = $conn->prepare("SELECT id FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $numRows = $stmt->num_rows;
    $stmt->close();
    return $numRows > 0;
}
?>