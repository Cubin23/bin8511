<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <style>
        /* Tổng thể */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

/* Container chính cho giỏ hàng */
.cart-container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

/* Tiêu đề trang */
.cart-title {
    font-size: 30px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 30px;
    color: #333;
}

/* Bảng giỏ hàng */
.cart-table {
    width: 100%;
    border-collapse: collapse;
}

.cart-table th, .cart-table td {
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid #ddd;
    font-size: 16px;
    color: #555;
}

/* Tiêu đề bảng */
.cart-table th {
    background-color: #f7f7f7;
    font-weight: bold;
    color: #333;
}

/* Thông tin sản phẩm */
.cart-item-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.cart-item-info img {
    width: 60px;
    height: 60px;
    border-radius: 5px;
    object-fit: cover;
}

/* Giá, số lượng, tổng tiền */
.cart-price, .cart-total {
    font-weight: bold;
    color: #007bff;
}

.cart-quantity {
    width: 60px;
    padding: 5px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    text-align: center;
}

/* Nút xóa sản phẩm */
.remove-item {
    background-color: #ff4d4d;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.remove-item:hover {
    background-color: #cc0000;
}

/* Tóm tắt giỏ hàng */
.cart-summary {
    margin-top: 30px;
    padding: 20px;
    background-color: #f7f7f7;
    border-radius: 10px;
    font-size: 18px;
}

.cart-summary-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.cart-summary-item:last-child {
    margin-bottom: 0;
}

/* Tổng tiền */
.cart-total-summary {
    font-size: 24px;
    font-weight: bold;
    color: #007bff;
}

/* Nút cập nhật và thanh toán */
button {
    padding: 12px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.update-cart {
    background-color: #28a745;
    color: white;
}

.update-cart:hover {
    background-color: #218838;
}

.checkout-btn {
    background-color: #007bff;
    color: white;
}

.checkout-btn:hover {
    background-color: #0056b3;
}

/* Responsive */
@media (max-width: 768px) {
    .cart-table th, .cart-table td {
        font-size: 14px;
        padding: 10px;
    }

    .cart-summary-item {
        flex-direction: column;
        align-items: flex-start;
    }

    .cart-total-summary {
        font-size: 20px;
    }

    button {
        font-size: 14px;
        padding: 10px 16px;
    }
}

    </style>
</head>
<body>
    <div class="cart-container">
        <h1 class="cart-title">Giỏ Hàng Của Bạn</h1>

        <!-- Bảng Giỏ Hàng -->
        <table class="cart-table">
            
            <?php  viewcart(1); ?>
           
            
            
        </table>

        <!-- Tóm tắt giỏ hàng -->
        <div class="cart-summary">

            <div class="cart-summary-item">
                <button class="update-cart">Cập Nhật Giỏ Hàng</button>
            </div>
            <div class="cart-summary-item">
                <a href="index.php?act=bill"><button class="checkout-btn">Thanh Toán</button></a>
            </div>
        </div>
    </div>
</body>
</html>
