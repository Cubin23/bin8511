<?php
// Lấy ID sản phẩm
$san_pham_id = $_GET['san_pham_id'] ?? 0;

// Lấy danh sách bình luận theo sản phẩm
$list_comments = load_comments_by_product($san_pham_id);
?>

<div class="row fretitle">
    <h1>BÌNH LUẬN CỦA SẢN PHẨM</h1>
</div>
<div class="row fracontent">
    <?php if (!empty($list_comments) && is_array($list_comments)): ?>
        <table class="table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nội dung</th>
                    <th>Người dùng</th>
                    <th>Ngày tạo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list_comments as $comment): ?>
                    <tr>
                        <td><?= $comment['binh_luan_id'] ?></td>
                        <td><?= htmlspecialchars($comment['noi_dung']) ?></td>
                        <td><?= htmlspecialchars($comment['nguoi_dung']) ?></td>
                        <td><?= $comment['created_at'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Không có bình luận nào cho sản phẩm này.</p>
    <?php endif; ?>
</div>
