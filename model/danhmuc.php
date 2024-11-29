<?php

function insert_danh_muc($ten_danh_muc){
    $sql="insert into danh_muc(ten_danh_muc) values('$ten_danh_muc')";
    pdo_execute($sql);
}
function delete_danh_muc($danh_muc_id){
    $sql= "delete  from danh_muc where danh_muc_id=".$danh_muc_id;
    pdo_execute($sql);
}

function loadall_danh_muc() {
    $sql = "SELECT * FROM danh_muc ORDER BY danh_muc_id ASC";
    return pdo_query($sql);
}

function loadone_danh_muc($danh_muc_id){
    $sql = "select * from danh_muc where danh_muc_id=".$danh_muc_id;
    $dm=pdo_query_one($sql);
    return $dm;
}
function update_danh_muc($danh_muc_id, $ten_danh_muc){
    $sql="update danh_muc set ten_danh_muc='".$ten_danh_muc."' where danh_muc_id=".$danh_muc_id;
    pdo_execute($sql);
}





?>