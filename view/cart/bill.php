<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Đặt Hàng</title>
    <style>
        /* Tổng thể */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

/* Container chính cho thông tin đặt hàng */
.order-container {
    max-width: 800px;
    margin: 40px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

/* Tiêu đề */
.order-title {
    font-size: 30px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 30px;
    color: #333;
}

/* Các phần trong form */
.form-section {
    margin-bottom: 20px;
}

/* Tiêu đề phần form */
.form-section h2 {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 15px;
}

/* Nhóm trường nhập liệu */
.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group input, .form-group select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Nút Đặt Hàng */
.submit-btn {
    padding: 12px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    background-color: #28a745;
    color: white;
    cursor: pointer;
    width: 100%;
}

.submit-btn:hover {
    background-color: #218838;
}

/* Tóm tắt đơn hàng */
.order-summary {
    background-color: #f7f7f7;
    padding: 20px;
    border-radius: 10px;
    margin-top: 30px;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    font-size: 18px;
    margin-bottom: 10px;
}

.summary-item:last-child {
    margin-bottom: 0;
}

#order-total {
    font-weight: bold;
    color: #007bff;
}

    </style>
</head>
<body>
    <form action="index.php?act=billcomfirm">
    <div class="order-container">
        <h1 class="order-title">Thông Tin Đặt Hàng</h1>

        <form class="order-form" id="order-form">
            <div class="form-section">
                <h2>Thông Tin Cá Nhân</h2>

                <?php 
                    if(isset($_SESSION['ho_ten'])){
                        $ho_ten=$_SESSION['ho_ten']['ho_ten'];
                        $dia_chi=$_SESSION['ho_ten']['dia_chi'];
                        $email=$_SESSION['ho_ten']['email'];
                        $sdt=$_SESSION['ho_ten']['sdt'];
                        
                    }else{
                        $name="";
                        $dia_chi="";
                        $email="";
                        $sdt="";
                        
                    }
                
                
                
                ?>



                <div class="form-group">
                    <label for="full-name">Họ và Tên:</label>
                    <input type="text" id="full-name" name="ho_ten" required value="<?=$name?>">
                </div>
                <div class="form-group">
                    <label for="full-name">Địa chỉ:</label>
                    <input type="text" id="full-name" name="dia_chi" required value="<?=$dia_chi?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required value="<?=$email?>">
                </div>
                <div class="form-group">
                    <label for="phone">Số Điện Thoại:</label>
                    <input type="tel" id="phone" name="sdt" required value="<?=$sdt?>">
                </div>
            </div>


            <div class="form-section">
                <h2>Phương Thức Thanh Toán</h2>
                <div class="form-group">
                    <label for="payment-method">Chọn Phương Thức Thanh Toán:</label>
                    <select id="payment-method" name="payment-method" required>
                        <option value="cash-on-delivery">Thanh Toán Khi Nhận Hàng</option>
                        <option value="bank-transfer">Chuyển Khoản Ngân Hàng</option>
                        <option value="online-payment">Thanh Toán Online</option>
                    </select>
                </div>
            </div>

            <div class="order-summary">
                <h2>Tóm Tắt Đơn Hàng</h2>
                <div>
                    <table>
                        
                        <?php viewcart(0); ?>
                    </table>
                </div>
                <button type="submit" class="submit-btn" name="dathang">Đặt Hàng</button>
            </div>
        </form>
    </div>
    </form>
</body>
</html>
