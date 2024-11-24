<?php
include "../model/pdo.php";
include "header.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'addsp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $image = $_FILES['image']['name'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $sql = "INSERT INTO san_pham (ten_san_pham, gia, mo_ta, anh_url) VALUES (?, ?, ?, ?)";
                    pdo_execute($sql, $name, $price, $description, $image);
                    $thongbao = "Thêm sản phẩm thành công!";
                    header("Location: index.php?act=listsp");
                    exit();
                } else {
                    $thongbao = "Không thể tải ảnh lên!";
                }
            }
            include "sanpham/add.php";
            break;

        case 'listsp':
            include "sanpham/list.php";
            break;

        case 'editsp':
            include "sanpham/update.php";
            break;

        case 'deletesp':
            include "sanpham/delete.php";
            break;

        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include "footer.php";
?>
