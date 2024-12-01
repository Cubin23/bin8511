<?php
// Thêm thống kê
function insert_thong_ke($san_pham_id, $so_luong_ban, $doanh_thu, $ngay) {
    $sql = "INSERT INTO thong_ke (san_pham_id, so_luong_ban, doanh_thu, ngay) 
            VALUES (?, ?, ?, ?)";
    pdo_execute($sql, [$san_pham_id, $so_luong_ban, $doanh_thu, $ngay]);
}

// Xóa thống kê
function delete_thong_ke($thong_ke_id) {
    $sql = "DELETE FROM thong_ke WHERE thong_ke_id = ?";
    pdo_execute($sql, [$thong_ke_id]);
}

// Cập nhật thống kê
function update_thong_ke($thong_ke_id, $so_luong_ban, $doanh_thu, $ngay, $san_pham_id) {
    $sql = "UPDATE thong_ke 
            SET so_luong_ban = ?, doanh_thu = ?, ngay = ?, san_pham_id = ?
            WHERE thong_ke_id = ?";
    pdo_execute($sql, [$so_luong_ban, $doanh_thu, $ngay, $san_pham_id, $thong_ke_id]);
}

// Lấy tất cả thống kê
function load_all_thong_ke() {
    $sql = "SELECT * FROM thong_ke ORDER BY ngay DESC";
    return pdo_query($sql);
}

// Lấy thống kê theo ID
function load_one_thong_ke($thong_ke_id) {
    $sql = "SELECT * FROM thong_ke WHERE thong_ke_id = ?";
    return pdo_query_one($sql, [$thong_ke_id]);
}
?>
