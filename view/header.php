<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();  // Khởi tạo session nếu chưa có session nào được bắt đầu
}

// Kiểm tra xem người dùng đã đăng nhập chưa
$isLoggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Tiny Garden</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="view/css/style.css">
  <style>
/* Menu chính */
.nav {
    background-color: #4CAF50;
    padding: 10px 20px;
    font-family: 'Arial', sans-serif;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    gap: 20px;
    align-items: center;
    justify-content: center;
}

.nav ul li {
    position: relative;
}

.nav ul li a {
    text-decoration: none;
    color: white;
    font-size: 16px;
    font-weight: 600;
    padding: 10px 20px;
    display: inline-block;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.nav ul li a:hover {
    background-color: #495057;
    transform: scale(1.1);
}

/* Dropdown danh mục */
.nav ul li .dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    padding: 10px 0;
    min-width: 220px;
    z-index: 1000;
    opacity: 0;
    transform: translateY(10px);
    transition: opacity 0.3s ease, transform 0.3s ease;
}

/* Hiển thị danh mục khi hover */
.nav ul li:hover .dropdown-menu {
    display: block;
    opacity: 1;
    transform: translateY(0);
}

/* Các mục trong danh mục */
.nav ul li .dropdown-menu li {
    list-style: none;
    margin: 0;
    padding: 10px 20px;
    font-size: 14px;
    transition: background-color 0.3s ease, padding-left 0.3s ease;
}

.nav ul li .dropdown-menu li:hover {
    background-color: #f8f9fa;
    padding-left: 30px;
}

.nav ul li .dropdown-menu li a {
    text-decoration: none;
    color: #343a40;
    display: block;
    font-weight: 500;
    transition: color 0.3s ease;
}

.nav ul li .dropdown-menu li a:hover {
    color: #007bff;
}

</style>
<?php $dsdm=loadall_danh_muc(); ?>
</head>
<body>
  <!-- Header Section -->
  <div class="header">
    <div class="search-bar">
      <input type="text" placeholder="Tìm kiếm..."/>
      <button><i class="fas fa-search"></i></button>
    </div>
    <div class="logo">
      <img src="view/img/z5997923336813_0615e09e211f5c43c27c0838175e2e29.jpg" alt="Tiny Garden Logo" width="150">
    </div>
    <?php
$isLoggedIn = isset($_SESSION['username']);
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
?>

<div class="cart">
      <a href="index.php?act=viewcart"><i class="fas fa-shopping-cart"></i> Thành tiền: 0 VND</a>
      <a href="index.php?act=dangky"><i class="fas fa-user"></i> Đăng ký</a>
      <a href="index.php?act=dangnhap"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
    </div>

  </div>

  <!-- Navigation Menu -->
  <div class="nav">
    <ul>
        <li><a href="index.php">TRANG CHỦ</a></li>
        <li><a href="index.php?act=gioithieu">GIỚI THIỆU</a></li>
        <li><a href="index.php?act=kienthuccaycanh">KIẾN THỨC CÂY CẢNH</a></li>
        <li>
            <a href="index.php?act=sanpham">SẢN PHẨM</a>
            <!-- Danh mục con -->
            <ul class="dropdown-menu">
                <?php 
                foreach ($dsdm as $dm) {
                    extract($dm);
                    $linkdm = "index.php?act=sanpham&danh_muc_id=" . $danh_muc_id;
                    echo '<li><a href="' . htmlspecialchars($linkdm) . '">' . htmlspecialchars($ten_danh_muc) . '</a></li>';
                }
                ?>
            </ul>
        </li>
        <li><a href="index.php?act=chinhsach">CHÍNH SÁCH</a></li>
        <li><a href="index.php?act=tintuc">TIN TỨC</a></li>
        <li><a href="index.php?act=lienhe">LIÊN HỆ</a></li>
    </ul>
</div>

</body>
</html>