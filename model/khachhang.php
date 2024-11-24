<?php
function load_all_customers() {
    $sql = "SELECT * FROM nguoi_dung_khach_hang ORDER BY nguoi_dung_id DESC";
    return pdo_query($sql); // Hàm pdo_query được định nghĩa trong `model/pdo.php`
}


function get_customer_by_id($id) {
    $sql = "SELECT * FROM nguoi_dung_khach_hang WHERE nguoi_dung_id = ?";
    return pdo_query_one($sql, $id);
}

function insert_customer($ho_ten, $email, $dia_chi, $sdt, $username, $password, $loai_nguoi_dung) {
    $sql = "INSERT INTO nguoi_dung_khach_hang (ho_ten, email, dia_chi, sdt, username, password, loai_nguoi_dung, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
    pdo_execute($sql, $ho_ten, $email, $dia_chi, $sdt, $username, $password, $loai_nguoi_dung);
}

function update_customer($id, $ho_ten, $email, $dia_chi, $sdt, $username, $password, $loai_nguoi_dung) {
    $sql = "UPDATE nguoi_dung_khach_hang SET ho_ten = ?, email = ?, dia_chi = ?, sdt = ?, username = ?, 
            password = ?, loai_nguoi_dung = ? WHERE nguoi_dung_id = ?";
    pdo_execute($sql, $ho_ten, $email, $dia_chi, $sdt, $username, $password, $loai_nguoi_dung, $id);
}

function delete_customer($id) {
    $sql = "DELETE FROM nguoi_dung_khach_hang WHERE nguoi_dung_id = ?";
    pdo_execute($sql, $id);
}
