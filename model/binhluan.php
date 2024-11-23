<?php

// Hàm thêm bình luận
function insert_binh_luan($noi_dung, $nguoi_dung_id, $san_pham_id) {
    $sql = "INSERT INTO binh_luan (noi_dung, nguoi_dung_id, san_pham_id) 
            VALUES (:noi_dung, :nguoi_dung_id, :san_pham_id)";
    pdo_execute($sql, ['noi_dung' => $noi_dung, 'nguoi_dung_id' => $nguoi_dung_id, 'san_pham_id' => $san_pham_id]);
}

// Hàm lấy tất cả bình luận (theo sản phẩm hoặc toàn bộ)
function loadall_binh_luan($san_pham_id = 0) {
    $sql = "SELECT c.binh_luan_id, c.noi_dung, c.created_at, 
                   u.username, 
                   p.nguoi_dung_id AS nguoi_dung_id 
            FROM binh_luan c
            LEFT JOIN nguoi_dung_khach_hang u ON c.nguoi_dung_id = u.id
            LEFT JOIN san_pham p ON c.san_pham_id = p.id
            WHERE 1";
    if ($san_pham_id > 0) {
        $sql .= " AND c.san_pham_id = :san_pham_id";
        return pdo_query($sql, ['san_pham_id' => $san_pham_id]);
    }
    $sql .= " ORDER BY c.binh_luan_id DESC";
    return pdo_query($sql);
}

// Hàm xóa bình luận
function delete_binh_luan($binh_luan_id) {
    $sql = "DELETE FROM binh_luan WHERE binh_luan_id = :binh_luan_id";
    pdo_execute($sql, ['binh_luan_id' => $binh_luan_id]);
}

?>