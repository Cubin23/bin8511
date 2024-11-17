<div class="container">
    <h2>Cập nhật danh mục</h2>
    <form action="index.php?act=editdm" method="POST">
        <div class="form-group">
            <label for="name">Tên danh mục</label>
            <input type="text" id="name" name="name" value="<?= $category['name'] ?>" required>
        </div>
        <input type="hidden" name="id" value="<?= $category['id'] ?>">
        <button type="submit" class="register-btn" name="capnhat">Cập nhật</button>
        <a href="index.php?act=listdm" class="register-btn">Danh sách</a>
    </form>
    <?php if (isset($thongbao)) echo "<p>$thongbao</p>"; ?>
</div>
