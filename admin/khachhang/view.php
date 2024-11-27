<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin khách hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .info-box {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .info-box p {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <h1>Thông tin chi tiết khách hàng</h1>
    <div class="info-box">
        <p><strong>Họ tên:</strong> <?= htmlspecialchars($customer['ho_ten']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($customer['email']) ?></p>
        <p><strong>Địa chỉ:</strong> <?= htmlspecialchars($customer['dia_chi'] ?? 'Không có') ?></p>
        <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($customer['sdt'] ?? 'Không có') ?></p>
        <p><strong>Loại người dùng:</strong> <?= $customer['loai_nguoi_dung'] == 'admin' ? 'Admin' : 'Khách hàng' ?></p>
        <p><strong>Ngày tạo:</strong> <?= $customer['created_at'] ?></p>
    </div>
</body>

</html>