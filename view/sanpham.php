<style>
/* Bố cục cho các sản phẩm */
.products {
    display: flex; /* Dàn sản phẩm theo hàng ngang */
    flex-wrap: wrap; /* Cho phép xuống dòng khi không còn đủ chỗ */
    justify-content: flex-start; /* Căn trái các sản phẩm */
    gap: 20px; /* Khoảng cách giữa các sản phẩm */
    padding: 20px;
    margin: 0 auto;
    overflow-x: auto; /* Cho phép cuộn ngang nếu số lượng sản phẩm quá nhiều */
}

/* Bố cục từng sản phẩm */
.product {
    flex: 0 0 calc(25% - 20px); /* 4 sản phẩm mỗi hàng, trừ đi khoảng cách */
    box-sizing: border-box;
    background-color: #fff;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
    overflow: hidden; /* Đảm bảo không bị tràn */
}

/* Hiệu ứng hover cho sản phẩm */
.product:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}

/* Hình ảnh sản phẩm */
.product img {
    width: 100%;
    height: auto;
    max-height: 200px; /* Đảm bảo hình ảnh không quá lớn */
    object-fit: cover; /* Giữ tỷ lệ và không bị bóp méo */
    border-radius: 8px;
    margin-bottom: 10px;
}

/* Tiêu đề và giá sản phẩm */
.product p {
    font-size: 16px;
    font-weight: bold;
    color: #333;
    margin: 10px 0;
}

/* Phần thêm vào giỏ hàng */
.product .add-to-cart {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    margin-top: 10px;
}

.product .add-to-cart input {
    width: 50px;
    padding: 5px;
    font-size: 14px;
    text-align: center;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.product .add-to-cart button {
    padding: 8px 15px;
    font-size: 14px;
    color: #fff;
    background-color: #28a745;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.product .add-to-cart button:hover {
    background-color: #218838;
}

/* Cải thiện hiển thị cho các thiết bị nhỏ */
@media screen and (max-width: 1200px) {
    .product {
        flex: 0 0 calc(33.33% - 20px); /* 3 sản phẩm mỗi hàng */
    }
}

@media screen and (max-width: 768px) {
    .product {
        flex: 0 0 calc(50% - 20px); /* 2 sản phẩm mỗi hàng */
    }
}

@media screen and (max-width: 480px) {
    .product {
        flex: 0 0 100%; /* 1 sản phẩm mỗi hàng */
    }
}

</style>

<div class="products">
    <?php 
    $i = 0;
    foreach ($dssp as $sp) {
        extract($sp);
        $linksp = "index.php?act=sanphamchitiet&san_pham_id=".$san_pham_id;

        // Kiểm tra nếu đường dẫn ảnh không hợp lệ
        if (empty($anh_url)) {
            echo "Ảnh không tồn tại cho sản phẩm: $ten_san_pham<br>";
            continue;
        }

        // Tạo đường dẫn URL tuyệt đối
        $anh_url = "/DA1/upload/" . $anh_url;

        // Kiểm tra file tồn tại
        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $anh_url)) {
            echo "File ảnh không tồn tại: " . $anh_url . "<br>";
            continue;
        }

        // Xác định class "mr"
        $product = (($i == 2) || ($i == 5) || ($i == 8) || ($i==11)) ? "product" : "";

        // Hiển thị HTML
        echo '<div class="product">
            <a href="'.$linksp.'"><img alt="Cây cảnh văn phòng" src="' . $anh_url . '" />
            <p>' . $ten_san_pham . '</p>
            <p>' . $gia . ' VNĐ || <a href=""><i class="fas fa-shopping-cart"></i></a></p> </a>
        </div>';

        $i += 1;
    }
    ?>
</div>
