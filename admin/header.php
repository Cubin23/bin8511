<?php
session_start();  // Đảm bảo session được bắt đầu

// Kiểm tra nếu người dùng chưa đăng nhập hoặc không phải admin
if (!isset($_SESSION['username']) || $_SESSION['loai_dung_id'] != 1) {
    header("Location: index.php?act=dangnhap");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="../view/css/style.css">
    <title>ADMIN</title>
    <style>
      .logout-btn {
    background-color: #dc3545;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px;
    margin-top: 20px;
}

.logout-btn:hover {
    background-color: #c82333;
}

    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <div class="logo">
            <img src="../view/img/z5997923336813_0615e09e211f5c43c27c0838175e2e29.jpg" alt="Tiny Garden Logo" width="150">
        </div>
        <div>
    <?php
    // Kiểm tra nếu người dùng đã đăng nhập
    if (isset($_SESSION['username'])) {
        echo "<h1>Chào mừng Admin, " . $_SESSION['username'] . "!</h1>";
        // Hiển thị nút đăng xuất
        echo '<a href="index.php?act=logout" class="logout-btn">Đăng xuất</a>';
    } else {
        echo "<h1>Vui lòng đăng nhập</h1>";
    }
    ?>
</div>



    </div>

    <!-- Navigation Menu -->
    <div class="nav">
        <ul>
            <li><a href="index.php?act=adddm">DANH MỤC</a></li>
            <li><a href="index.php?act=addsp">SẢN PHẨM</a></li>
            <li><a href="index.php?act=adddh">ĐƠN HÀNG</a></li>
            <li><a href="index.php?act=dskh">KHÁCH HÀNG</a></li>
            <li><a href="index.php?act=dsbl">BÌNH LUẬN</a></li>
            <li><a href="index.php?act=thongke">THỐNG KÊ</a></li>
        </ul>
    </div>
</body>
</html>
