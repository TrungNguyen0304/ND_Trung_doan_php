<?php
session_start();
include_once "../dbconnect.php";
include_once "../functions.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_login'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    checkLogin($email, $password,$conn);
}


?>

