<?php
require_once "pdo.php"; // Bao gồm tệp PDO để kết nối cơ sở dữ liệu

// Lấy danh sách tất cả khách hàng
function load_all_customers() {
    $sql = "SELECT nguoi_dung_id, ho_ten, email, dia_chi, sdt, loai_nguoi_dung, created_at 
            FROM nguoi_dung_khach_hang
            ORDER BY created_at DESC";
    return pdo_query($sql);
}

// Lấy thông tin chi tiết khách hàng theo ID
function load_customer_by_id($id) {
    $sql = "SELECT * FROM nguoi_dung_khach_hang WHERE nguoi_dung_id = ?";
    return pdo_query_one($sql, [$id]);
}

// Xóa khách hàng theo ID
function delete_customer($id) {
    $sql = "DELETE FROM nguoi_dung_khach_hang WHERE nguoi_dung_id = ?";
    pdo_execute($sql, [$id]);
}
?>
