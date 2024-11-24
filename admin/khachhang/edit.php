<?php
if (isset($customer)) {
?>
<h2>Sửa thông tin khách hàng</h2>
<form action="index.php?act=editkh" method="POST">
    <input type="hidden" name="id" value="<?= $customer['nguoi_dung_id'] ?>">
    
    <label for="ho_ten">Họ tên:</label>
    <input type="text" name="ho_ten" value="<?= $customer['ho_ten'] ?>" required><br>
    
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?= $customer['email'] ?>" required><br>
    
    <label for="dia_chi">Địa chỉ:</label>
    <input type="text" name="dia_chi" value="<?= $customer['dia_chi'] ?>"><br>
    
    <label for="sdt">SĐT:</label>
    <input type="text" name="sdt" value="<?= $customer['sdt'] ?>"><br>
    
    <label for="username">Username:</label>
    <input type="text" name="username" value="<?= $customer['username'] ?>" required><br>
    
    <label for="password">Password:</label>
    <input type="password" name="password" placeholder="Nhập mật khẩu mới nếu muốn đổi"><br>
    
    <label for="loai_nguoi_dung">Loại người dùng:</label>
    <select name="loai_nguoi_dung">
        <option value="0" <?= $customer['loai_nguoi_dung'] == 0 ? 'selected' : '' ?>>Khách hàng</option>
        <option value="1" <?= $customer['loai_nguoi_dung'] == 1 ? 'selected' : '' ?>>Admin</option>
    </select><br>
    
    <button type="submit" name="edit">Cập nhật</button>
</form>
<?php } ?>
