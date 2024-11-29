<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khách hàng</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .action-btns a {
            margin-right: 10px;
            text-decoration: none;
            padding: 5px 10px;
            color: white;
            border-radius: 4px;
        }

        .view-btn {
            background-color: #007bff;
        }

        .delete-btn {
            background-color: #d9534f;
        }
    </style>
</head>
<body>
    <h2>Danh sách khách hàng</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Loại người dùng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listkh as $khachhang): ?>
                <tr>
                    <td><?= $khachhang['nguoi_dung_id'] ?></td>
                    <td><?= htmlspecialchars($khachhang['ho_ten']) ?></td>
                    <td><?= htmlspecialchars($khachhang['email']) ?></td>
                    <td><?= htmlspecialchars($khachhang['dia_chi']) ?></td>
                    <td><?= htmlspecialchars($khachhang['sdt']) ?></td>
                    <td><?= $khachhang['loai_nguoi_dung'] == 1 ? 'Admin' : 'Khách hàng' ?></td>
                    <td class="action-btns">
                        <a class="view-btn" href="index.php?act=viewkh&id=<?= $khachhang['nguoi_dung_id'] ?>">Xem</a>
                        <a class="delete-btn" href="index.php?act=deletekh&id=<?= $khachhang['nguoi_dung_id'] ?>" 
                           onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>