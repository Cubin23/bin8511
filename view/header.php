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
  <link rel="stylesheet" href="view/file.css/m2.css">
</head>
<body>
  <!-- Header Section -->
  <div class="header">
    <div class="search-bar">
      <input type="text" placeholder="Tìm kiếm..."/>
      <button><i class="fas fa-search"></i></button>
    </div>
    <div class="logo">
      <img src="view/image/z5997923336813_0615e09e211f5c43c27c0838175e2e29.jpg" alt="Tiny Garden Logo" width="150">
    </div>
    <div class="cart">
      <a href="#"><i class="fas fa-shopping-cart"></i> Thành tiền: 0 VND</a>
      <?php if ($isLoggedIn): ?>
        <!-- Hiển thị tên tài khoản và nút đăng xuất nếu đã đăng nhập -->
        <a href="index.php?act=logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
        <span>Xin chào, <?= htmlspecialchars($_SESSION['username']); ?>!</span> <!-- Hiển thị tên tài khoản -->
      <?php else: ?>
        <!-- Hiển thị các liên kết Đăng ký và Đăng nhập nếu chưa đăng nhập -->
        <a href="index.php?act=dangky"><i class="fas fa-user"></i> Đăng ký</a>
        <a href="index.php?act=dangnhap"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
      <?php endif; ?>
    </div>
  </div>

  <!-- Navigation Menu -->
  <div class="nav">
    <ul>
      <li><a href="index.php">TRANG CHỦ</a></li>
      <li><a href="index.php?act=gioithieu">GIỚI THIỆU</a></li>
      <li><a href="index.php?act=kienthuccaycanh">KIẾN THỨC CÂY CẢNH</a></li>
      <li><a href="index.php?act=sanpham">SẢN PHẨM</a></li>
      <li><a href="index.php?act=chinhsach">CHÍNH SÁCH</a></li>
      <li><a href="index.php?act=tintuc">TIN TỨC</a></li>
      <li><a href="index.php?act=lienhe">LIÊN HỆ</a></li>
    </ul>
  </div>
</body>
</html>
