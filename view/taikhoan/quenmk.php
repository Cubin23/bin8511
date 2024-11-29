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
input[type="submit"] {
    display: inline-block;
    padding: 12px 20px;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    background-color: #3498db;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    text-transform: uppercase;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease, transform 0.2s ease;
}

input[type="submit"]:hover {
    background-color: #2980b9;
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

input[type="submit"]:active {
    background-color: #1f618d;
    transform: translateY(0);
    box-shadow: none;
}


</style>

<div class="container">
    <h2>Quên mật khẩu</h2>
    <form action="index.php?act=quenmk" method="POST">

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Nhập email của bạn" required>
        </div>
       <input type="submit" name="quenmk" value="Gửi">
    </form>

    <!-- Thông báo -->
    <?php 
    if (isset($thongbao) && $thongbao != "") {
        echo "<div class='alert'>$thongbao</div>";
    }
    ?>

</div>