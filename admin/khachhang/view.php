<?php
require_once "../model/khachhang.php";

// Lấy ID từ tham số GET
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Gọi hàm lấy thông tin khách hàng
$customer = load_customer_by_id($id);

// Kiểm tra nếu không tìm thấy khách hàng
if (!$customer) {
    echo "Không tìm thấy khách hàng.";
    exit; // Ngừng xử lý tiếp nếu không có dữ liệu
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin khách hàng</title>
</head>
<body>
    <h1>Thông tin chi tiết khách hàng</h1>
    <p><strong>Họ tên:</strong> <?= htmlspecialchars($customer['ho_ten']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($customer['email']) ?></p>
    <p><strong>Địa chỉ:</strong> <?= htmlspecialchars($customer['dia_chi']) ?></p>
    <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($customer['sdt']) ?></p>
    <p><strong>Tên đăng nhập:</strong> <?= htmlspecialchars($customer['username']) ?></p>
    <p><strong>Loại người dùng:</strong> <?= $customer['loai_nguoi_dung'] == 1 ? 'Admin' : 'Khách hàng' ?></p>
    <p><strong>Ngày tạo:</strong> <?= $customer['created_at'] ?></p>
</body>
</html>
