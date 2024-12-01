<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận Hóa Đơn</title>
<style>
    /* Tổng thể */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

/* Container chính */
.bill-container {
    max-width: 900px;
    margin: 40px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

/* Tiêu đề */
.bill-title {
    font-size: 30px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 30px;
    color: #333;
}

/* Phần thông tin */
.bill-section {
    margin-bottom: 30px;
}

.bill-section h2 {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
    color: #007bff;
}

.bill-info p {
    font-size: 16px;
    margin: 5px 0;
}

/* Bảng chi tiết đơn hàng */
.bill-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.bill-table th, .bill-table td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd;
    font-size: 16px;
    color: #555;
}

.bill-table th {
    background-color: #f7f7f7;
    color: #333;
}

/* Tóm tắt đơn hàng */
.bill-summary {
    background-color: #f7f7f7;
    padding: 20px;
    border-radius: 10px;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    font-size: 18px;
    margin-bottom: 15px;
}

.summary-item:last-child {
    margin-bottom: 0;
}

#total-amount {
    font-weight: bold;
    color: #007bff;
}

/* Nút Xác Nhận */
.confirm-btn {
    padding: 12px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    background-color: #28a745;
    color: white;
    cursor: pointer;
    width: 100%;
}

.confirm-btn:hover {
    background-color: #218838;
}

</style>
</head>
<body>
    <div class="bill-container">
        <h1 class="bill-title">Xác Nhận Hóa Đơn</h1>
            <?php     
                if(isset($bill)&&(is_array($bill))){
                    extract($bill);
                }
            
            ?>


                <div>Mã Đơn hàng</div>
                <li><?=$bill['id']?></li> <li>Tổng đơn hàng : <?=$bill['total']?></li> <li>Phương thức thanh toán: <?=$bill['bill_pttt']?></li>
        <!-- Thông tin người mua -->
        <div class="bill-section">
            <h2>Thông Tin Người Mua</h2>
            <div class="bill-info">
                <p><strong>Họ và Tên:</strong> <?=$bill['bill_name']?></p>
                <p><strong>Email:</strong> <?=$bill['bill_email']?></p>
                <p><strong>Số Điện Thoại:</strong> <?=$bill['bill_tel']?></p>
                <p><strong>Địa Chỉ Giao Hàng:</strong> <?=$bill['bill_address']?></p>
            </div>
        </div>

        <!-- Chi tiết đơn hàng -->
        <div>Chi Tiết giỏ hàng</div>
        <div>
            <table>
                <tr>
                    <th>STT</th>
                    <th>San Pham</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Thành tiền</th>
                </tr>
                <?php 
                
                    bill_chi_tiet($billct);
                
                
                ?>
            </table>
        </div>
        <!-- Phương thức thanh toán -->
        

        <!-- Tóm tắt và tổng tiền -->
        <div class="bill-summary">
            <div class="summary-item">
                <button class="confirm-btn" id="confirm-order">Xác Nhận Đặt Hàng</button>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
