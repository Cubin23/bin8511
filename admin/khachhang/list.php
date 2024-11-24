<?php
require_once "../model/khachhang.php"; // Kết nối với model
$customers = load_all_customers(); // Gọi hàm từ model để lấy danh sách khách hàng
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khách hàng</title>
    <style>
        /* Reset mặc định */
        body, h2, table, a {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            padding: 20px;
        }

        /* Tiêu đề */
        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #444;
            text-align: center;
        }

        /* Bảng danh sách */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background: #fff;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        td {
            color: #555;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Nút hành động */
        a {
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 14px;
            margin-right: 5px;
        }

        a:hover {
            opacity: 0.9;
        }

        a[href*="editkh"] {
            background-color: #ff9800;
        }

        a[href*="deletekh"] {
            background-color: #f44336;
        }

        a[href*="addkh"] {
            background-color: #4CAF50;
            display: inline-block;
            margin-top: 10px;
            text-align: center;
        }

        /* Responsive */
        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }

            th, td {
                padding: 8px 10px;
            }

            a {
                font-size: 12px;
                padding: 4px 8px;
            }
        }
    </style>
</head>
<body>
    <h2>Danh sách khách hàng</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>SĐT</th>
            <th>Username</th>
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
            <td><?= $customer['username'] ?></td>
            <td><?= $customer['loai_nguoi_dung'] == 1 ? 'Admin' : 'Khách hàng' ?></td>
            <td>
                <a href="index.php?act=editkh&id=<?= $customer['nguoi_dung_id'] ?>">Sửa</a>
                <a href="index.php?act=deletekh&id=<?= $customer['nguoi_dung_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php?act=addkh">Thêm mới</a>
</body>
</html>
