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

        table th,
        table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #f4f4f4;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .action-btn a {
            text-decoration: none;
            color: #fff;
            padding: 5px 10px;
            border-radius: 4px;
            margin-right: 5px;
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
    <h1>Danh sách khách hàng</h1>
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
            <?php foreach ($list_customers as $customer): ?>
                <tr>
                    <td><?= $customer['nguoi_dung_id'] ?></td>
                    <td><?= htmlspecialchars($customer['ho_ten']) ?></td>
                    <td><?= htmlspecialchars($customer['email']) ?></td>
                    <td><?= htmlspecialchars($customer['dia_chi'] ?? 'Không có') ?></td>
                    <td><?= htmlspecialchars($customer['sdt'] ?? 'Không có') ?></td>
                    <td><?= $customer['loai_nguoi_dung'] == 'admin' ? 'Admin' : 'Khách hàng' ?></td>
                    <td class="action-btn">
                        <a class="view-btn" href="index.php?act=viewkh&id=<?= $customer['nguoi_dung_id'] ?>">Xem</a>
                        <a class="delete-btn" href="index.php?act=deletekh&id=<?= $customer['nguoi_dung_id'] ?>"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này?');">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>