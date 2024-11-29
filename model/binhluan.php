<?php 

function loadall_binhluan(){
    $sql = "select * from binhluan order by id desc";
    $listbinhluan=pdo_query($sql);
    return $listbinhluan;
}
function insert_binhluan($id,$noidung,$iduser,$ngaybinhluan){
    $sql="insert into binhluan(id,noidung,iduser,ngaybinhluan) values ('$id','$noidung','$iduser','$ngaybinhluan')";
    pdo_execute($sql);
}

?>