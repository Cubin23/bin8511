<div class="container">
    <form action="index.php?act=adddm" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="tensp">Tên sản phẩm</label>
        <input type="text" id="tensp" name="tensp" required>
    </div>
    <div class="form-group">
        <label for="price">Giá sản phẩm</label>
        <input type="number" id="price" name="price" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả sản phẩm</label>
        <textarea id="description" name="description" required></textarea>
    </div>
    <div class="form-group">
        <label for="image">Hình ảnh sản phẩm</label>
        <input type="file" id="image" name="image" accept="image/*">
    </div>
    <button type="submit" class="register-btn" name="themmoi">Thêm</button>
    <a href="index.php?act=listdm" class="register-btn">Danh sách</a>
</form>

    <?php 
        if (isset($thongbao) && ($thongbao != "")) {
            echo $thongbao;
        }
    ?>
</div>