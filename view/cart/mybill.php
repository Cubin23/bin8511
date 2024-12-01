<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bill - Hóa Đơn Của Tôi</title>
   <style>
    /* Tổng thể */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

/* Container chính */
.mybill-container {
    max-width: 900px;
    margin: 40px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

/* Tiêu đề */
.mybill-title {
    font-size: 30px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 30px;
    color: #333;
}

/* Phần thông tin */
.mybill-section {
    margin-bottom: 30px;
}

.mybill-section h2 {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
    color: #007bff;
}

.mybill-info p {
    font-size: 16px;
    margin: 5px 0;
}

/* Bảng chi tiết đơn hàng */
.mybill-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.mybill-table th, .mybill-table td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd;
    font-size: 16px;
    color: #555;
}

.mybill-table th {
    background-color: #f7f7f7;
    color: #333;
}

/* Tóm tắt đơn hàng */
.mybill-summary {
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

/* Nút quay lại */
.back-btn {
    padding: 12px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    background-color: #28a745;
    color: white;
    cursor: pointer;
    width: 100%;
}

.back-btn:hover {
    background-color: #218838;
}

   </style>
</head>
<body>
    <div class="mybill-container">
        <h1 class="mybill-title">Hóa Đơn Của Tôi</h1>

        <!-- Thông tin người mua -->
        <div class="mybill-section">
            <h2>Thông Tin Người Mua</h2>
            <div class="mybill-info">
                <p><strong>Họ và Tên:</strong> Nguyễn Văn A</p>
                <p><strong>Email:</strong> nguyenvana@example.com</p>
                <p><strong>Số Điện Thoại:</strong> 0123456789</p>
                <p><strong>Địa Chỉ Giao Hàng:</strong> 123 Đường ABC, Quận 1, TP. HCM</p>
            </div>
        </div>

        <!-- Chi tiết đơn hàng -->
        <div class="mybill-section">
            <h2>Chi Tiết Đơn Hàng</h2>
            <table class="mybill-table">
                <thead>
                    <tr>
                        <th>Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Sản phẩm 1</td>
                        <td>200,000 VNĐ</td>
                        <td>2</td>
                        <td>400,000 VNĐ</td>
                    </tr>
                    <tr>
                        <td>Sản phẩm 2</td>
                        <td>150,000 VNĐ</td>
                        <td>1</td>
                        <td>150,000 VNĐ</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Phương thức thanh toán -->
        <div class="mybill-section">
            <h2>Phương Thức Thanh Toán</h2>
            <p><strong>Thanh Toán:</strong> Thanh Toán Khi Nhận Hàng</p>
        </div>

        <!-- Tóm tắt và tổng tiền -->
        <div class="mybill-summary">
            <div class="summary-item">
                <span>Tổng Tiền:</span>
                <span id="total-amount">550,000 VNĐ</span>
            </div>
            <div class="summary-item">
                <button class="back-btn" id="back-to-home">Quay lại Trang Chủ</button>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>