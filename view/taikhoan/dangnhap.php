<style>
    /* Container */
.container {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #f9f9f9;
}

/* Tiêu đề */
.container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
    font-size: 24px;
}

/* Form Group */
.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

.form-group input {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.form-group input:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 4px rgba(0, 123, 255, 0.5);
}

/* Nút đăng nhập */
.login-btn {
    width: 100%;
    padding: 10px;
    font-size: 18px;
    font-weight: bold;
    color: #fff;
    background-color: #28a745;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.login-btn:hover {
    background-color: #218838;
}

/* Liên kết "Quên mật khẩu" và "Đăng ký" */
.extra-links {
    margin-top: 15px;
    text-align: center;
    font-size: 14px;
}

.extra-links a {
    color: #007bff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.extra-links a:hover {
    color: #0056b3;
}

.extra-links span {
    color: #aaa;
}

/* Định dạng tổng thể */
body {
    font-family: Arial, sans-serif;
    background-color: #eef2f3;
    margin: 0;
    padding: 0;
}

</style>

<div class="container">
    <h2>Đăng nhập tài khoản</h2>

    <form action="index.php?act=dangnhap" method="POST">
    <div class="form-group">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit" class="login-btn" name="dangnhap" value="dangnhap">Đăng nhập</button>
</form>

    <div class="extra-links">
        <a href="index.php?act=quenmk">Quên mật khẩu?</a>
        <span> | </span>
        <a href="index.php?act=dangky">Đăng ký tài khoản</a>
    </div>
</div>
