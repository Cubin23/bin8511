<?php
require_once "../model/khachhang.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $customer = load_customer_by_id($id);

    if (!$customer) {
        echo "Không tìm thấy khách hàng.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;
    $ho_ten = trim($_POST['ho_ten'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $dia_chi = trim($_POST['dia_chi'] ?? '');
    $sdt = trim($_POST['sdt'] ?? '');
    $loai_nguoi_dung = $_POST['loai_nguoi_dung'] ?? 0;

    // Kiểm tra dữ liệu trước khi cập nhật
    if ($id && $ho_ten && $email) {
        update_customer($id, $ho_ten, $email, $dia_chi, $sdt, $loai_nguoi_dung);
        header("Location: index.php?act=dskh"); // Quay về danh sách khách hàng
        exit;
    } else {
        echo "Vui lòng nhập đầy đủ thông tin.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin khách hàng</title>
</head>
<body>
    <h2>Sửa thông tin khách hàng</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($customer['nguoi_dung_id']) ?>">
        <label>Họ tên:</label><br>
        <input type="text" name="ho_ten" value="<?= htmlspecialchars($customer['ho_ten']) ?>" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($customer['email']) ?>" required><br>
        <label>Địa chỉ:</label><br>
        <input type="text" name="dia_chi" value="<?= htmlspecialchars($customer['dia_chi']) ?>"><br>
        <label>Số điện thoại:</label><br>
        <input type="text" name="sdt" value="<?= htmlspecialchars($customer['sdt']) ?>"><br>
        <label>Loại người dùng:</label><br>
        <select name="loai_nguoi_dung">
            <option value="0" <?= $customer['loai_nguoi_dung'] == 0 ? 'selected' : '' ?>>Khách hàng</option>
            <option value="1" <?= $customer['loai_nguoi_dung'] == 1 ? 'selected' : '' ?>>Admin</option>
        </select><br>
        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>
