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
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
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
    justify-content: start;
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
        <!-- Tiêu đề Giỏ Hàng -->
        <h1 class="cart-title">Giỏ Hàng Của Bạn</h1>
        
        <!-- Bảng Giỏ Hàng -->
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Sản Phẩm</th>
                    <th>Giá</th>
                    <th>Thành Tiền</th>
                    <th>Số Lượng</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
            <?php
if (!isset($_SESSION['mycart']) || empty($_SESSION['mycart'])) {
    echo "<tr><td colspan='5'>Giỏ hàng của bạn đang trống!</td></tr>";
} else {
    $tong = 0; // Tổng tiền giỏ hàng
    foreach ($_SESSION['mycart'] as $sp) {
        $san_pham_id = $sp[0];
        $anh_urlpath = !empty($sp[1]) ? $sp[1] : 'view/img/default.jpg'; // Đường dẫn ảnh
        $ten_san_pham = $sp[2];
        $gia = $sp[3];
        $soluong = $sp[4];
        $ttien = $gia * $soluong;
        $tong += $ttien; // Cộng vào tổng tiền

        // Hiển thị từng sản phẩm
        echo "
        <tr class='cart-item'>
            <td>
                <div class='cart-item-info'>
                    <img src='" . htmlspecialchars($anh_urlpath) . "' alt='" . htmlspecialchars($ten_san_pham) . "'>
                    <span>" . htmlspecialchars($ten_san_pham) . "</span>
                </div>
            </td>
            <td class='cart-price'>" . number_format($gia, 0, ',', '.') . " VNĐ</td>
            <td class='cart-total'>" . number_format($ttien, 0, ',', '.') . " VNĐ</td>
            <td>
                <input type='number' class='cart-quantity' value='$soluong' min='1' data-id='$san_pham_id'>
            </td>
            <td>
                <button class='remove-item' data-id='$san_pham_id'>Xóa</button>
            </td>
        </tr>";
    }
    echo "<script>document.querySelector('.cart-total-summary').textContent = '" . number_format($tong, 0, ',', '.') . " VNĐ';</script>";
}
?>

            </tbody>
        </table>

        <!-- Tóm tắt giỏ hàng -->
        <div class="cart-summary">
            <div class="cart-summary-item">
                <span>Tổng Tiền:</span>
                <span class="cart-total-summary">0 VNĐ</span>
            </div>
            <div class="cart-summary-item">
                <button class="update-cart">Cập Nhật Giỏ Hàng</button>
            </div>
            <div class="cart-summary-item">
                <button class="checkout-btn">Thanh Toán</button>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const updateCartBtn = document.querySelector('.update-cart');
            const cartTotalSummary = document.querySelector('.cart-total-summary');

            function updateCartTotal() {
                let total = 0;
                document.querySelectorAll('.cart-item').forEach(item => {
                    const price = parseInt(item.querySelector('.cart-price').textContent.replace(/\D/g, ''));
                    const quantity = parseInt(item.querySelector('.cart-quantity').value);
                    const itemTotal = price * quantity;

                    item.querySelector('.cart-total').textContent = itemTotal.toLocaleString('vi-VN') + ' VNĐ';
                    total += itemTotal;
                });
                cartTotalSummary.textContent = total.toLocaleString('vi-VN') + ' VNĐ';
            }

            // Xóa sản phẩm
            document.querySelectorAll('.remove-item').forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = this.getAttribute('data-id');
                    this.closest('.cart-item').remove();
                    updateCartTotal();
                    // Gửi yêu cầu xóa sản phẩm đến server nếu cần
                });
            });

            // Cập nhật tổng tiền khi thay đổi số lượng
            document.querySelectorAll('.cart-quantity').forEach(input => {
                input.addEventListener('input', updateCartTotal);
            });

            // Cập nhật giỏ hàng (có thể gửi dữ liệu mới về server tại đây)
            updateCartBtn.addEventListener('click', function() {
                alert("Giỏ hàng đã được cập nhật!");
            });

            // Khởi tạo tổng tiền ban đầu
            updateCartTotal();
        });
    </script>
</body>
</html>
