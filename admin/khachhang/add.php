<h2>Thêm mới khách hàng</h2>
<form action="index.php?act=addkh" method="POST">
    <label for="ho_ten">Họ tên:</label>
    <input type="text" name="ho_ten" required><br>
    
    <label for="email">Email:</label>
    <input type="email" name="email" required><br>
    
    <label for="dia_chi">Địa chỉ:</label>
    <input type="text" name="dia_chi"><br>
    
    <label for="sdt">SĐT:</label>
    <input type="text" name="sdt"><br>
    
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>
    
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    
    <label for="loai_nguoi_dung">Loại người dùng:</label>
    <select name="loai_nguoi_dung">
        <option value="0">Khách hàng</option>
        <option value="1">Admin</option>
    </select><br>
    
    <button type="submit" name="add">Thêm</button>
</form>
