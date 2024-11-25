<style>
/* Định dạng tổng thể cho form */
form {
    width: 100%;
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
}

/* Định dạng tiêu đề */
h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

/* Định dạng label */
form label {
    font-weight: bold;
    margin-bottom: 8px;
    display: block;
    color: #555;
    font-size: 14px;
}

/* Định dạng input và select */
form input[type="text"],
form input[type="email"],
form select {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    background: #f9f9f9;
    transition: all 0.3s ease;
}

/* Hiệu ứng khi focus */
form input[type="text"]:focus,
form input[type="email"]:focus,
form select:focus {
    border-color: #5cb85c;
    box-shadow: 0 0 5px rgba(92, 184, 92, 0.5);
    outline: none;
}

/* Định dạng nút */
form button {
    background: #5cb85c;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease;
    display: block;
    width: 100%;
    text-align: center;
}

form button:hover {
    background: #4cae4c;
}

/* Căn chỉnh các phần tử */
form input[type="hidden"] {
    display: none;
}

form select {
    background-color: #f8f8f8;
}

/* Định dạng cho thông báo lỗi (nếu cần) */
form .error {
    color: red;
    font-size: 14px;
    margin-bottom: 10px;
}


</style>

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
