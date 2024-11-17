<?php 
include "../model/pdo.php";
include "header.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                $sql = "INSERT INTO danhmuc(name) VALUES(?)";
                pdo_execute($sql, [$tenloai]);
                $thongbao = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;

        case 'lisdm':
            $sql = "SELECT * FROM danhmuc ORDER BY name";
            $listdanhmuc = pdo_query($sql);
            include "danhmuc/list.php";
            break;

        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sql = "DELETE FROM danhmuc WHERE id = ?";
                pdo_execute($sql, [$_GET['id']]);
                $thongbao = "Xóa thành công";
            } else {
                $thongbao = "Xóa thất bại: ID không hợp lệ";
            }
            include "danhmuc/list.php";
            break;

        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
