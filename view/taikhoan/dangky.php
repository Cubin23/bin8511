<style>
/* Container chính */
.container {
    max-width: 450px;
    margin: 50px auto;
    padding: 25px;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

/* Tiêu đề */
.container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #2c3e50;
    font-size: 24px;
    font-weight: bold;
}

/* Form Group */
.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #34495e;
}

.form-group input {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.form-group input:focus {
    border-color: #3498db;
    box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
    outline: none;
}

/* Nút đăng ký */
.register-btn {
    width: 100%;
    padding: 12px;
    font-size: 18px;
    font-weight: bold;
    color: #fff;
    background-color: #27ae60;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.register-btn:hover {
    background-color: #218c53;
}

/* Liên kết tiện ích */
.extra-links {
    margin-top: 15px;
    text-align: center;
    font-size: 14px;
    color: #7f8c8d;
}

.extra-links a {
    color: #3498db;
    text-decoration: none;
    transition: color 0.3s ease;
}

.extra-links a:hover {
    color: #2980b9;
}

.extra-links span {
    color: #bdc3c7;
}

/* Thông báo */
.alert {
    margin-top: 15px;
    padding: 10px;
    color: #e74c3c;
    background-color: #fdecea;
    border: 1px solid #e5b7b5;
    border-radius: 5px;
    font-size: 14px;
    text-align: center;
}

/* Toàn bộ trang */
body {
    font-family: Arial, sans-serif;
    background-color: #ecf0f1;
    margin: 0;
    padding: 0;
}

</style>

<div class="container">
    <h2>Đăng ký tài khoản</h2>
    <form action="index.php?act=dangky" method="POST">
    <div class="form-group">
            <label for="ho_ten">Họ và Tên</label>
            <input type="text" id="ho_ten" name="ho_ten" placeholder="Nhập họ và tên" required>
        </div>
        <div class="form-group">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
        </div>
        <div class="form-group">
            <label for="dia_chi">Địa Chỉ:</label>
            <input type="address" id="dia_chi" name="dia_chi" placeholder="Nhập Địa Chỉ" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Nhập email" required>
        </div>
        <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <input type="tel" id="sdt" name="sdt" placeholder="Nhập số điện thoại" required>
        </div>
        <button type="submit" class="register-btn" name="dangky" value="dangky">Đăng ký</button>
    </form>

    <!-- Thông báo -->
    <?php 
    if (isset($thongbao) && $thongbao != "") {
        echo "<div class='alert'>$thongbao</div>";
    }
    ?>

    <!-- Liên kết tiện ích -->
    <div class="extra-links">
        <a href="index.php?act=dangnhap">Đã có tài khoản? Đăng nhập</a>
        <span>|</span>
        <a href="index.php?act=quenmk">Quên mật khẩu</a>
    </div>
</div>