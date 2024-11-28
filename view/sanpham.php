<div class="content">
<div class="breadcrumb">
            <a href="index.php">Trang chủ</a> » <a href="tintuc.php">Sản phẩm</a>
        </div>
    <h1>Sản phẩm</h1>
    <p>
        Dưới đây là các sản phẩm nổi bật tại Tiny Garden:
    </p>
    <div class="products">
        <div class="product">
            <img src="view/image/93_2.jpg" alt="Cây cảnh văn phòng" width="300" height="200">
            <p>Đồ vật trang trí</p>
            <p>200.000 VNĐ</p>
        </div>
        <div class="product">
            <img src="view/image/102_2.jpg" alt="Cây cảnh để bàn" width="300" height="200">
            <p>Cây cảnh để bàn</p>
            <p>170.000 VNĐ</p>
        </div>
        <div class="product">
            <img src="view/image/90_2.jpg" alt="Chậu cây sen đá" width="300" height="200">
            <p>Chậu cây sen đá</p>
            <p>50.000 VNĐ</p>
        </div>
       
        <!-- Thêm các sản phẩm khác tương tự -->
    </div>
</div>
<style>
    .breadcrumb {
    font-size: 14px;
    margin-bottom: 15px;
    color: #555;
}

.breadcrumb a {
    text-decoration: none;
    color: #4CAF50;
}

.breadcrumb a:hover {
    text-decoration: underline;
}
    /* Phong cách chung cho nội dung */
.content {
    width: 1150px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    font-family: Arial, sans-serif;
}

/* Tiêu đề */
.content h1 {
    font-size: 2.5em;
    color: #4CAF50;
    text-align: center;
    margin-bottom: 20px;
}

/* Phần giới thiệu */
.content p {
    font-size: 1.2em;
    color: #333;
    text-align: center;
    margin-bottom: 30px;
}

/* Bố cục sản phẩm */
.products {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between; /* Tạo khoảng cách đều giữa các sản phẩm */
    gap: 20px; /* Khoảng cách giữa các sản phẩm */
}

/* Phong cách cho mỗi sản phẩm */
.product {
    background-color: #f9f9f9;
    padding: 15px;
    text-align: center;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    flex: 1 1 calc(25% - 20px); /* Đảm bảo 4 sản phẩm trên 1 hàng */
    box-sizing: border-box;
}

.product img {
    width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 10px;
}

.product p {
    font-size: 1.2em;
    color: #333;
    margin: 10px 0;
}

.product p:last-child {
    font-weight: bold;
    color: #4CAF50;
}

/* Hiệu ứng khi di chuột vào sản phẩm */
.product:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: 0.3s;
}

</style>
