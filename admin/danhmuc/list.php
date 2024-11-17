<div class="container">
    <h2>Danh sách danh mục</h2>
    <a href="index.php?act=adddm" class="register-btn">Thêm mới</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?= $category['id'] ?></td>
                    <td><?= $category['name'] ?></td>
                    <td>
                        <a href="index.php?act=editdm&id=<?= $category['id'] ?>">Sửa</a>
                        <a href="index.php?act=deletedm&id=<?= $category['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
