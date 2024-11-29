<?php

function insert_san_pham($ten_san_pham, $gia, $danh_muc_id, $mo_ta, $anh_url) {
    $sql = "INSERT INTO san_pham (ten_san_pham, gia, danh_muc_id, mo_ta, anh_url) 
            VALUES ('$ten_san_pham', '$gia', '$danh_muc_id', '$mo_ta', '$anh_url')";
    pdo_execute($sql);
}

function delete_san_pham($san_pham_id){
    $sql= "delete  from san_pham where san_pham_id=".$san_pham_id;
    pdo_execute($sql);
}

function loadall_san_pham_top10(){
    $sql= $sql = "SELECT * FROM san_pham WHERE 1 ORDER BY san_pham_id DESC LIMIT 0,4";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}

function loadall_san_pham_home(){
    $sql= $sql = "SELECT * FROM san_pham WHERE 1 ORDER BY san_pham_id DESC LIMIT 0,8";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function  loadall_san_pham($kyw="",$danh_muc_id=0){
    $sql= "select * from san_pham where 1";
    if($kyw!=""){
        $sql.=" and ten_san_pham like '%".$kyw."%'";
    }
    if($danh_muc_id>0){
        $sql.=" and  danh_muc_id = '".$danh_muc_id."'";
    }
    $sql.=" order by san_pham_id desc";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}

function loadone_san_pham($san_pham_id){
    $sql = "select * from san_pham where san_pham_id=".$san_pham_id;
    $sp=pdo_query_one($sql);
    return $sp;
}

function load_ten_dm($danh_muc_id){
    $sql = "select * from san_pham where danh_muc_id=".$danh_muc_id;
    $dm=pdo_query_one($sql);
    extract($dm);
    return $dm;
}

function loadone_san_pham_cungloai($san_pham_id,$danh_muc_id){
    $sql = "select * from san_pham where danh_muc_id=".$danh_muc_id." AND san_pham_id <>".$san_pham_id;
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function update_san_pham($san_pham_id, $ten_san_pham, $gia, $mo_ta, $danh_muc_id, $anh_url) {
    // Nếu anh_url không rỗng, cập nhật cả anh_url
    if (!empty($anh_url)) {
        $sql = "UPDATE san_pham 
                SET danh_muc_id = ?, 
                    ten_san_pham = ?, 
                    gia = ?, 
                    mo_ta = ?, 
                    anh_url = ? 
                WHERE san_pham_id = ?";
        $params = [$danh_muc_id, $ten_san_pham, $gia, $mo_ta, $anh_url, $san_pham_id];
    } else {
        // Nếu anh_url rỗng, không cập nhật cột anh_url
        $sql = "UPDATE san_pham 
                SET danh_muc_id = ?, 
                    ten_san_pham = ?, 
                    gia = ?, 
                    mo_ta = ? 
                WHERE san_pham_id = ?";
        $params = [$danh_muc_id, $ten_san_pham, $gia, $mo_ta, $san_pham_id];
    }

    // Kiểm tra câu lệnh SQL và tham số trước khi thực thi
    pdo_execute($sql, $params);  // Thực thi câu lệnh
}







?>