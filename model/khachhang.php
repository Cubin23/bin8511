<?php
require_once "pdo.php";

// Lấy danh sách tất cả khách hàng
function load_all_customers() {
    $sql = "SELECT * FROM nguoi_dung_khach_hang ORDER BY nguoi_dung_id DESC";
    return pdo_query($sql);
}

// Lấy thông tin chi tiết khách hàng theo ID
function load_customer_by_id($id) {
    $sql = "SELECT * FROM nguoi_dung_khach_hang WHERE nguoi_dung_id = ?";
    $result = pdo_query_one($sql, $id);
    if (!$result) {
        return null; // Không tìm thấy khách hàng
    }
    return $result;
}


// Xóa khách hàng
function delete_customer($id) {
    $sql = "DELETE FROM nguoi_dung_khach_hang WHERE nguoi_dung_id = ?";
    pdo_execute($sql, [$id]);
}
?>
