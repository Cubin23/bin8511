<?php
// Kết nối cơ sở dữ liệu và các tệp cần thiết
include "../model/pdo.php";
include "header.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        // Thêm danh mục
        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tendm = $_POST['tendm'];
                $sql = "INSERT INTO categories (name) VALUES (?)";
                pdo_execute($sql, $tendm);
                $thongbao = "Thêm danh mục thành công!";
            }
            include "danhmuc/add.php";
            break;

        // Danh sách danh mục
        case 'listdm':
            include "danhmuc/list.php";
            break;

        // Cập nhật danh mục
        case 'editdm':
            include "danhmuc/edit.php";
            break;

        // Xóa danh mục
        case 'deldm':
            include "danhmuc/delete.php";
            break;

        // Thêm sản phẩm
        case 'addsp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $image = $_FILES['image']['name'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $sql = "INSERT INTO products (name, price, description, image) VALUES (?, ?, ?, ?)";
                    pdo_execute($sql, $name, $price, $description, $image);
                    $thongbao = "Thêm sản phẩm thành công!";
                    // Chuyển hướng đến trang danh sách sản phẩm
                    header("Location: index.php?act=listsp");
                    exit(); // Dừng thực thi tiếp sau khi điều hướng
                } else {
                    $thongbao = "Không thể tải ảnh lên!";
                }
            }
            include "sanpham/add.php";
            break;

        // Danh sách sản phẩm
        case 'listsp':
            include "sanpham/list.php";
            break;

        // Cập nhật sản phẩm
        case 'editsp':
            include "sanpham/update.php";
            break;

        // Xóa sản phẩm
        case 'deletesp':
            include "sanpham/delete.php";
            break;

        // Trang mặc định
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php"; // Trang chủ khi không có thao tác
}

include "footer.php"; // Đính kèm footer
?>
