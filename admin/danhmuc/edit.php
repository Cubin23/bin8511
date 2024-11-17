<div class="container">
    <h2>Sửa Danh Mục</h2>
    <form action="index.php?act=editdm" method="POST">
        <input type="hidden" name="id" value="<?php echo $category['id']; ?>"> <!-- Lưu ID danh mục để chỉnh sửa -->
        
        <div class="form-group">
            <label for="maloai">Mã loại</label>
            <input type="text" id="maloai" name="maloai" value="<?php echo $category['maloai']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="tensp">Tên sản phẩm</label>
            <input type="text" id="tensp" name="tensp" value="<?php echo $category['name']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="price">Giá sản phẩm</label>
            <input type="text" id="price" name="price" value="<?php echo $category['price']; ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Mô tả sản phẩm</label>
            <textarea id="description" name="description" rows="4" required><?php echo $category['description']; ?></textarea>
        </div>

        <button type="submit" class="register-btn" name="capnhat">Cập nhật</button>
    </form>
</div>
