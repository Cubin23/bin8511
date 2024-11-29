<style>
/* Tổng thể container cho trang chi tiết sản phẩm */
.container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 40px;
    background-color: #fff;
    font-family: 'Arial', sans-serif;
    color: #333;
}

/* Bố cục sản phẩm */
.product {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    margin-bottom: 50px;
    justify-content: space-between;
}

/* Hình ảnh sản phẩm */
.product img {
    width: 100%;
    max-width: 600px; /* Đảm bảo hình ảnh có chiều rộng tối đa */
    height: auto;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Hiệu ứng hover cho hình ảnh */
.product img:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 30px rgba(0, 0, 0, 0.2);
}

/* Thông tin chi tiết sản phẩm */
.details {
    flex: 1;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    max-width: 1000px;
}

/* Tiêu đề sản phẩm */
.details h1 {
    font-size: 32px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #333;
}

/* Mô tả sản phẩm */
.details p {
    font-size: 18px;
    line-height: 1.8;
    margin-bottom: 20px;
    color: #555;
}

.details p:last-of-type {
    font-weight: bold;
    font-size: 22px;
    color: #007bff;
}

/* Phần thêm vào giỏ hàng */
.add-to-cart {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-top: 30px;
}

.add-to-cart input[type="number"] {
    width: 80px;
    padding: 10px;
    font-size: 18px;
    text-align: center;
    border: 2px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
    transition: border-color 0.3s ease;
}

/* Hiệu ứng khi ô nhập số lượng được chọn */
.add-to-cart input[type="number"]:focus {
    border-color: #007bff;
    outline: none;
}

/* Nút "Thêm vào giỏ hàng" */
.add-to-cart button {
    padding: 15px 25px;
    font-size: 18px;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

/* Hiệu ứng khi hover vào nút */
.add-to-cart button:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
}

/* Sản phẩm liên quan */
.related-products {
    margin-top: 70px;
    padding-top: 50px;
    border-top: 3px solid #eee;
}

.related-products h2 {
    font-size: 28px;
    text-align: center;
    color: #333;
    margin-bottom: 30px;
    font-weight: bold;
    text-transform: uppercase;
}

.products {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    justify-content: center;
}

.products li {
    list-style: none;
    width: 250px;
    text-align: center;
    background-color: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.products li:hover {
    transform: translateY(-8px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
}

.products li img {
    width: 100%;
    height: 250px;
    border-radius: 8px;
    margin-bottom: 20px;
    object-fit: cover;
}

.products li a {
    text-decoration: none;
    font-size: 16px;
    font-weight: 600;
    color: #333;
    transition: color 0.3s ease;
}

.products li a:hover {
    color: #007bff;
}

</style>

<div class="container">
    <!-- Chi tiết sản phẩm -->
    <?php 
    extract($onesp);

    // Kiểm tra biến $anh_urlpath có tồn tại không
    if (!isset($anh_urlpath)) {
        $anh_urlpath = "/duanmau/upload/"; // Đường dẫn tĩnh đến thư mục ảnh
    }

    // Tạo đường dẫn ảnh đầy đủ
    $anh_url = $anh_urlpath . $anh_url;
    ?>
    <div class="product">
                <img src="<?= htmlspecialchars($anh_url) ?>" alt="<?= htmlspecialchars($ten_san_pham) ?>">
            </div>
        <div class="details">
            <h1><?= htmlspecialchars($ten_san_pham) ?></h1>
            
            <p><?= nl2br(htmlspecialchars($mo_ta)) ?></p>
            <p><?= nl2br(htmlspecialchars($gia))?> VNĐ</p>
                <div class="add-to-cart">
                <input type="number" min="1" value="1"> <!-- Ô nhập số lượng -->
                <button>Thêm vào giỏ hàng</button>
            </div>

        </div>
    </div>
</div>



    <!-- Sản phẩm liên quan -->
    <div class="related-products">
        <h2>Sản phẩm liên quan</h2>
        <div class="products">
        <?php 
foreach ($spcungloai as $spcungloai) {
    extract($spcungloai);

    // Tạo đường dẫn sản phẩm
    $linksp = "index.php?act=sanphamchitiet&san_pham_id=" . $san_pham_id;

    // Kiểm tra và xử lý đường dẫn ảnh
    if (!isset($anh_urlpath)) {
        $anh_urlpath = "/duanmau/upload/"; // Đường dẫn ảnh tĩnh
    }
    $anh_url = $anh_urlpath . $anh_url;

    // Hiển thị sản phẩm liên quan
    echo '<li>';
    echo '<a href="' . htmlspecialchars($linksp) . '">' . htmlspecialchars($ten_san_pham) . '</a>';
    echo '<img src="' . htmlspecialchars($anh_url) . '" alt="' . htmlspecialchars($ten_san_pham) . '" style="width:100px; height:100px; border-radius:5px; margin-top:10px;">';
    echo '</li>';
}
?>

        </div>
    </div>
</div>