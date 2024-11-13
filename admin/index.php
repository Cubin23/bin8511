<?php 
include "../model/pdo.php";
include "header.php";

if(isset($_GET['act'])){
    $act =$_GET['act'];
    switch ($act){
        case 'adddm':
            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                $tensp = $_POST['tensp'];
                $sql = "insert into categories(name) values ('$tensp')";
                pdo_execute($sql);
                $thongbao = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;
        case 'addsp':
            include "sanpham/add.php";
            break;

        default:
            include "home.php";
            break;
    }

    }else {
        include "home.php";
    }

include "footer.php";



?>