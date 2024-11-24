<?php
require_once "../model/pdo.php";

function load_all_customers() {
    $sql = "SELECT * FROM nguoi_dung_khach_hang";
    return pdo_query($sql);
}

function load_customer_by_id($id) {
    $sql = "SELECT * FROM nguoi_dung_khach_hang WHERE nguoi_dung_id = ?";
    return pdo_query_one($sql, $id);
}

function update_customer($id, $ho_ten, $email, $dia_chi, $sdt, $loai_nguoi_dung) {
    $sql = "UPDATE nguoi_dung_khach_hang 
            SET ho_ten = ?, email = ?, dia_chi = ?, sdt = ?, loai_nguoi_dung = ? 
            WHERE nguoi_dung_id = ?";
    pdo_execute($sql, $ho_ten, $email, $dia_chi, $sdt, $loai_nguoi_dung, $id);
}

function delete_customer($id) {
    $sql = "DELETE FROM nguoi_dung_khach_hang WHERE nguoi_dung_id = ?";
    pdo_execute($sql, $id);
}
?>
