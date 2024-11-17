<div class="container">
    <h2>Thêm danh mục</h2>
    <form action="index.php?act=adddm" method="POST">
        <div class="form-group">
            <label for="name">Tên danh mục</label>
            <input type="text" id="name" name="name" required>
        </div>
        <button type="submit" class="register-btn" name="themmoi">Thêm</button>
        <a href="index.php?act=listdm" class="register-btn">Danh sách</a>
    </form>
    <?php if (isset($thongbao)) echo "<p>$thongbao</p>"; ?>
</div>
