<style>
/* Reset cơ bản */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    color: #333;
    line-height: 1.6;
    padding: 20px;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    background: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

/* Header */
header {
    background: #5cb85c;
    color: #fff;
    padding: 15px 20px;
    text-align: center;
    border-radius: 8px 8px 0 0;
}

header h1 {
    margin: 0;
    font-size: 24px;
}

/* Bảng danh sách */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 16px;
    text-align: left;
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
}

table th,
table td {
    padding: 15px;
    border: 1px solid #ddd;
}

table th {
    background-color: #5cb85c;
    color: white;
    text-transform: uppercase;
    font-weight: bold;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #f1f1f1;
    transition: 0.3s ease;
}

table td a {
    text-decoration: none;
    padding: 8px 12px;
    border-radius: 4px;
    color: #fff;
    font-size: 14px;
}

table td a:hover {
    opacity: 0.8;
}

table td a:first-child {
    background-color: #0275d8; /* Màu xanh cho nút Sửa */
}

table td a:last-child {
    background-color: #d9534f; /* Màu đỏ cho nút Xóa */
}

/* Nút bấm */
button,
input[type="submit"] {
    background: #5cb85c;
    color: #fff;
    border: none;
    padding: 10px 15px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    margin-right: 10px;
}

button:hover,
input[type="submit"]:hover {
    background: #4cae4c;
}

button.danger {
    background: #d9534f;
}

button.danger:hover {
    background: #c9302c;
}

/* Biểu mẫu */
form {
    margin: 20px 0;
}

form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

form input[type="text"],
form input[type="email"],
form input[type="password"],
form textarea,
form select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
}

form textarea {
    resize: vertical;
}

form .form-group {
    margin-bottom: 15px;
}

/* Phân trang */
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination a {
    padding: 10px 15px;
    margin: 0 5px;
    border: 1px solid #ddd;
    text-decoration: none;
    color: #333;
    border-radius: 4px;
}

.pagination a:hover {
    background: #5cb85c;
    color: #fff;
}

.pagination a.active {
    background: #5cb85c;
    color: #fff;
    border: none;
}


</style>
<?php

require_once "../model/khachhang.php";
$customers = load_all_customers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khách hàng</title>
</head>
<body>
    <h2>Danh sách khách hàng</h2>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Loại người dùng</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($customers as $customer): ?>
        <tr>
            <td><?= $customer['nguoi_dung_id'] ?></td>
            <td><?= $customer['ho_ten'] ?></td>
            <td><?= $customer['email'] ?></td>
            <td><?= $customer['dia_chi'] ?></td>
            <td><?= $customer['sdt'] ?></td>
            <td><?= $customer['loai_nguoi_dung'] == 1 ? 'Admin' : 'Khách hàng' ?></td>
            <td>
                <a href="index.php?act=editkh&id=<?= $customer['nguoi_dung_id'] ?>">Sửa</a>
                <a href="index.php?act=deletekh&id=<?= $customer['nguoi_dung_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>