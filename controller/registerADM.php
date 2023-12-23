<?php
include_once "../dbconnect.php";
include_once "../functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_register'])) {
    // Kiểm tra xem khóa "name" có tồn tại trong mảng $_POST hay không
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];  
    $phone = $_POST["phone"];

    // Kiểm tra hợp lệ
    $errors = array();

    if (empty($name)) {
        $errors[] = "Vui lòng nhập tên.";
    }

    if (empty($email)) {
        $errors[] = "Vui lòng nhập email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Định dạng email không hợp lệ.";
    }

    if (empty($password)) {
        $errors[] = "Vui lòng nhập mật khẩu.";
    } elseif (!preg_match('/[A-Z]/', $password)) {
        $errors[] = "Mật khẩu phải chứa ít nhất một chữ cái in hoa.";
    }

    if (empty($address)) {
        $errors[] = "Vui lòng nhập địa chỉ.";
    }

    if (empty($phone)) {
        $errors[] = "Vui lòng nhập số điện thoại.";
    }

    // Nếu có lỗi kiểm tra, hiển thị và ngừng xử lý tiếp
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        exit();
    }

    // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu hay chưa
    $existingUser = checkExistingUser($email);
    if ($existingUser) {
        echo "Email đã tồn tại. Vui lòng chọn email khác.";
        exit();
    }

    // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu

    // Gọi hàm register để thêm người dùng mới vào cơ sở dữ liệu
    if (register($name, $email, $password, $address, $phone)) {
        // Đăng ký thành công
        header("location: login.php");
        exit();
    } else {
        // Đăng ký thất bại
        echo "Đăng ký không thành công!";
    }
}