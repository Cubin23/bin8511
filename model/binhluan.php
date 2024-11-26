<?php
// Hàm thêm mới bình luận
function insert_comment($nguoi_dung_id, $san_pham_id, $noi_dung) {
    $sql = "INSERT INTO binh_luan (nguoi_dung_id, san_pham_id, noi_dung, created_at) VALUES (?, ?, ?, NOW())";
    pdo_execute($sql, $nguoi_dung_id, $san_pham_id, $noi_dung);
}

// Hàm lấy danh sách bình luận
function load_all_comments() {
    $sql = "SELECT bl.*, nd.ho_ten AS nguoi_dung, sp.ten_san_pham 
            FROM binh_luan bl
            LEFT JOIN nguoi_dung_khach_hang nd ON bl.nguoi_dung_id = nd.nguoi_dung_id
            LEFT JOIN san_pham sp ON bl.san_pham_id = sp.san_pham_id
            ORDER BY bl.created_at DESC";
    return pdo_query($sql);
}

// Hàm lấy bình luận theo sản phẩm
function load_comments_by_product($san_pham_id) {
    $sql = "SELECT bl.*, nd.ho_ten AS nguoi_dung 
            FROM binh_luan bl
            LEFT JOIN nguoi_dung_khach_hang nd ON bl.nguoi_dung_id = nd.nguoi_dung_id
            WHERE bl.san_pham_id = ?
            ORDER BY bl.created_at DESC";
    return pdo_query($sql, $san_pham_id);
}

// Hàm xóa bình luận
function delete_comment($binh_luan_id) {
    $sql = "DELETE FROM binh_luan WHERE binh_luan_id = ?";
    pdo_execute($sql, $binh_luan_id);
}
?>
