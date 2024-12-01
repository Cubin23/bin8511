<?php

// Hàm thêm bình luận
function insert_binhluan($noi_dung, $nguoi_dung_id, $san_pham_id) {
    $sql = "INSERT INTO comments (noi_dung, nguoi_dung_id, san_pham_id) 
            VALUES (:noi_dung, :nguoi_dung_id, :san_pham_id)";
    pdo_execute($sql, ['noi_dung' => $noi_dung, 'nguoi_dung_id' => $nguoi_dung_id, 'san_pham_id' => $san_pham_id]);
}

// Hàm lấy tất cả bình luận (theo sản phẩm hoặc toàn bộ)
function loadall_binhluan($san_pham_id = 0) {
    $sql = "SELECT c.binh_luan_id, c.noi_dung, c.created_at, 
                   u.username, 
                   p.name AS product_name 
            FROM comments c
            LEFT JOIN users u ON c.nguoi_dung_id = u.id
            LEFT JOIN products p ON c.san_pham_id = p.id
            WHERE 1";
    if ($san_pham_id > 0) {
        $sql .= " AND c.san_pham_id = :san_pham_id";
        return pdo_query($sql, ['san_pham_id' => $san_pham_id]);
    }
    $sql .= " ORDER BY c.binh_luan_id DESC";
    return pdo_query($sql);
}

// Hàm xóa bình luận
function delete_binhluan($binh_luan_id) {
    $sql = "DELETE FROM comments WHERE binh_luan_id = :binh_luan_id";
    pdo_execute($sql, ['binh_luan_id' => $binh_luan_id]);
}

?>
