<?php
// session_start();

// // Kiểm tra nếu người dùng đã đăng nhập trước đó
// if (isset($_SESSION['name'])) {
//     // Hủy toàn bộ session
//     session_destroy();
    
//     // Chuyển hướng về trang đăng nhập
//     header("Location: login.php");
//     exit();
// } else {
//     // Nếu người dùng chưa đăng nhập, có thể chuyển hướng hoặc xử lý theo cách khác tùy thuộc vào yêu cầu của bạn
//     header("Location: login.php");
//     exit();
// }

session_start();
// Hủy toàn bộ session
session_destroy();
// Chuyển hướng về trang đăng nhập 
header("Location: login.php");
exit();

?>