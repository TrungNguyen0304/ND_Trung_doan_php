<?php
// Truy vấn database để lấy danh sách
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once "../../dbconnect.php";
include_once "../../functions.php";
if (!isset($_GET['id'])) {
    header('location:index.php');
}
$id = $_GET['id'];
$user = showUsers($id);
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $errors = validationEditUser($name,$email,$password,$address,$phone);
    if (empty($errors)) {
        updateUser($conn, $id, $name, $email, $password, $address, $phone);
       
    } else{
        foreach ($errors as $errorsField){
                 $errors['msg']. "</br>";
            
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                    The best offer <br />
                    <span style="color: hsl(218, 81%, 75%)">for your business</span>
                </h1>

            </div>

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                        <form action="" method="post">
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label for="id" class="form-label">ID</label>
                                        <input value="<?php echo $user["id"]; ?>" type="text" class="form-control" id="id" name="id">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label for="name" class="form-label">Tên</label>
                                        <input value="<?php echo $user["name"]; ?>" type="text" class="form-control" id="name" name="name">
                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label for="email" class="form-label">email</label>
                                <input value="<?php echo $user["email"]; ?>" type="text" class="form-control" id="email" name="email">
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label for="email" class="form-label">password</label>
                                <input value="<?php echo $user["password"]; ?>" type="password" class="form-control" id="password" name="password">
                            </div>

                            <!-- address -->
                            <div class="form-outline mb-4">
                                <label for="address" class="form-label">address</label>
                                <input type="text" value="<?php echo $user["address"]; ?>" class="form-control" id="address" name="address">
                            </div>
                            <!-- Phone -->
                            <div class="form-outline mb-4">
                                <label for="phone" class="form-label">phone</label>
                                <input value="<?php echo $user["phone"]; ?>" type="text" class="form-control" id="phone" name="phone">
                                </di>

                                <!-- Submit button -->
                                <input type="submit" class="btn btn-primary w" name="save" value="Lưu">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>