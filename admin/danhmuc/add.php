<div class="container">
    <h2>Thêm sản phẩm</h2>
    <form action="index.php?act=adddm" method="POST">
        <div class="form-group">
            <label for="maloai">Mã loại</label>
            <input type="text" id="maloai" name="maloai" required>
        </div>
        <div class="form-group">
            <label for="tensp">Tên sản phẩm</label>
            <input type="text" id="tensp" name="tensp" required>
        </div>
        <div class="form-group">
            <label for="price">Giá sản phẩm</label>
            <input type="price" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="description">Mô tả sản phẩm</label>
            <textarea id="description" name="description" rows="4" required></textarea>
        </div>
        <button type="submit" class="register-btn" name="themmoi">Thêm</button>
        <button type="submit" class="register-btn">Danh sách</button>
    </form>
    <?php 
        if (isset($thongbao) && ($thongbao != "")) {
            echo $thongbao;
        }
    ?>
</div>
