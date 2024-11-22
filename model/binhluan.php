<?php

// Hàm thêm bình luận
function insert_binhluan($content, $user_id, $product_id) {
    $sql = "INSERT INTO comments (content, user_id, product_id) 
            VALUES (:content, :user_id, :product_id)";
    pdo_execute($sql, ['content' => $content, 'user_id' => $user_id, 'product_id' => $product_id]);
}

// Hàm lấy tất cả bình luận (theo sản phẩm hoặc toàn bộ)
function loadall_binhluan($product_id = 0) {
    $sql = "SELECT c.*, u.username, p.name AS product_name 
            FROM comments c
            LEFT JOIN users u ON c.user_id = u.id
            LEFT JOIN products p ON c.product_id = p.id
            WHERE 1";
    if ($product_id > 0) {
        $sql .= " AND c.product_id = :product_id";
        return pdo_query($sql, ['product_id' => $product_id]);
    }
    $sql .= " ORDER BY c.id DESC";
    return pdo_query($sql);
}

// Hàm xóa bình luận
function delete_binhluan($id) {
    $sql = "DELETE FROM comments WHERE id = :id";
    pdo_execute($sql, ['id' => $id]);
}
?>
