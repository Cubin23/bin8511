<?php
$sql = "SELECT * FROM categories";
$categories = pdo_query($sql);

if (count($categories) > 0) {
?>
    <div class="container">
    <h2>Danh sách danh mục</h2>
    <a href="index.php?act=adddm" class="register-btn">Thêm mới</a>
    <table>
        <thead>
            <tr>
                <th>Mã loại</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($categories as $category) {
            ?>
                <tr>
                    <td><?php echo $category['maloai']; ?></td>
                    <td><?php echo $category['name']; ?></td>
                    <td><?php echo number_format($category['price'], 0, ',', '.'); ?></td>
                    <td><?php echo $category['description']; ?></td>
                    <td>
                        <?php if ($category['image']) { ?>
                            <img src="<?php echo $category['image']; ?>" alt="Image" width="100">
                        <?php } else { ?>
                            <span>No image</span>
                        <?php } ?>
                    </td>
                    <td>
                        <a href="index.php?act=editdm&id=<?php echo $category['id']; ?>">Sửa</a>
                        <a href="index.php?act=deletedm&id=<?php echo $category['id']; ?>">Xóa</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    </div>
<?php
} else {
    echo "<p>Không có danh mục nào.</p>";
}
