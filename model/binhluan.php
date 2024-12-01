<?php
// Hàm thêm mới bình luận
// Hàm thêm bình luận
function insert_comment($san_pham_id, $noi_dung, $nguoi_dung_id, $ngaybinhluan) {
    $sql = "INSERT INTO binh_luan (san_pham_id, noi_dung, nguoi_dung_id, created_at) VALUES (?, ?, ?, ?)";
    pdo_execute($sql, $san_pham_id, $noi_dung, $nguoi_dung_id, $ngaybinhluan);
}

// Hàm lấy danh sách bình luận
// Hàm lấy danh sách bình luận
function load_all_comments() {
    $sql = "SELECT bl.*, nd.ho_ten AS nguoi_dung, sp.ten_san_pham 
            FROM binh_luan bl
            LEFT JOIN nguoi_dung_khach_hang nd ON bl.nguoi_dung_id = nd.nguoi_dung_id
            LEFT JOIN san_pham sp ON bl.san_pham_id = sp.san_pham_id
            ORDER BY bl.created_at DESC";
    return pdo_query($sql); // Đảm bảo pdo_query() trả về đúng kết quả
}

// Hàm lấy bình luận theo sản phẩm
function load_comments_by_product($san_pham_id) {
    $sql = "SELECT bl.*, nd.ho_ten AS nguoi_dung, sp.ten_san_pham 
            FROM binh_luan bl
            LEFT JOIN nguoi_dung_khach_hang nd ON bl.nguoi_dung_id = nd.nguoi_dung_id
            LEFT JOIN san_pham sp ON bl.san_pham_id = sp.san_pham_id
            WHERE bl.san_pham_id = ?
            ORDER BY bl.created_at DESC";
    return pdo_query($sql, $san_pham_id);
}

// Hàm xóa bình luận
function delete_comment($binh_luan_id) {
    $sql = "DELETE FROM binh_luan WHERE binh_luan_id = ?";
    pdo_execute($sql, [$binh_luan_id]);  // Truyền $binh_luan_id dưới dạng mảng
}

?>