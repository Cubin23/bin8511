<?php if (isset($listbinhluan) && is_array($listbinhluan)): ?>
<div class="row fretitle">
    <h1>DANH SÁCH BÌNH LUẬN</h1>
</div>
<div class="row fracontent">
    <table class="table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nội dung</th>
                <th>Người dùng</th>
                <th>Sản phẩm</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listbinhluan as $binhluan): ?>
                <?php extract($binhluan); ?>
                <tr>
                    <td><?= $id ?></td>
                    <td><?= htmlspecialchars($content) ?></td>
                    <td><?= htmlspecialchars($username) ?></td>
                    <td><?= htmlspecialchars($product_name) ?></td>
                    <td><?= $created_at ?></td>
                    <td><?= $updated_at ?></td>
                    <td>
                        <a href="index.php?act=xoabl&id=<?= $id ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                            <button class="btn btn-danger">Xóa</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>
<td><?= $product_name ? htmlspecialchars($product_name) : 'Không có sản phẩm' ?></td>

