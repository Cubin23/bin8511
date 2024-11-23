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
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listbinhluan as $binhluan): ?>
                <?php extract($binhluan); ?>
                <tr>
                    <td><?= $binh_luan_id ?></td>
                    <td><?= htmlspecialchars($noi_dung) ?></td>
                    <td><?= htmlspecialchars($username) ?></td>
                    <td><?= $product_name ? htmlspecialchars($product_name) : 'Không có sản phẩm' ?></td>
                    <td><?= $created_at ?></td>
                    <td>
                        <a href="index.php?act=xoabl&binh_luan_id=<?= $binh_luan_id ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                            <button class="btn btn-danger">Xóa</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php else: ?>
<div class="row fretitle">
    <h3>Không có bình luận nào.</h3>
</div>
<?php endif; ?>
