<?php
// Kiểm tra và định nghĩa hàm insert_binh_luan
if (!function_exists('insert_binh_luan')) {
    /**
     * Thêm một bình luận mới
     * @param string $noi_dung Nội dung bình luận
     * @param int $nguoi_dung_id ID người dùng
     * @param int $san_pham_id ID sản phẩm
     */
    // Hàm thêm bình luận
function insert_binh_luan($noi_dung, $nguoi_dung_id, $san_pham_id) {
    $sql = "INSERT INTO binh_luan (noi_dung, nguoi_dung_id, san_pham_id) 
            VALUES (:noi_dung, :nguoi_dung_id, :san_pham_id)";
    pdo_execute($sql, ['noi_dung' => $noi_dung, 'nguoi_dung_id' => $nguoi_dung_id, 'san_pham_id' => $san_pham_id]);
}
}

// Kiểm tra và định nghĩa hàm loadall_binh_luan
if (!function_exists('loadall_binh_luan')) {
    /**
     * Lấy danh sách bình luận (có thể lọc theo sản phẩm)
     * @param int $san_pham_id ID sản phẩm (0 = lấy tất cả)
     * @return array Danh sách bình luận
     */
    // Hàm lấy tất cả bình luận (theo sản phẩm hoặc toàn bộ)
// Hàm lấy tất cả bình luận (theo sản phẩm hoặc toàn bộ)
// Hàm lấy tất cả bình luận (theo sản phẩm hoặc toàn bộ)
function loadall_binh_luan($san_pham_id = 0) {
    $sql = "SELECT c.binh_luan_id, c.noi_dung, c.created_at, 
                   u.username, 
                   sp.ten_san_pham AS product_name
            FROM binh_luan c
            LEFT JOIN nguoi_dung_khach_hang u ON c.nguoi_dung_id = u.nguoi_dung_id
            LEFT JOIN san_pham sp ON c.san_pham_id = sp.san_pham_id
            WHERE 1";
    if ($san_pham_id > 0) {
        $sql .= " AND c.san_pham_id = :san_pham_id";
        return pdo_query($sql, ['san_pham_id' => $san_pham_id]);
    }
    $sql .= " ORDER BY c.binh_luan_id DESC";
    return pdo_query($sql);
}



}

// Kiểm tra và định nghĩa hàm delete_binh_luan
if (!function_exists('delete_binh_luan')) {
    /**
     * Xóa một bình luận
     * @param int $binh_luan_id ID bình luận
     */
    function delete_binh_luan($binh_luan_id) {
        $sql = "DELETE FROM binh_luan WHERE binh_luan_id = :binh_luan_id";
        pdo_execute($sql, ['binh_luan_id' => $binh_luan_id]);
    }
}
?>