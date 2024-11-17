<?php
include "../model/pdo.php";
include "header.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        // Thêm danh mục
        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $name = $_POST['name'];
                $sql = "INSERT INTO categories(name) VALUES ('$name')";
                pdo_execute($sql);
                $thongbao = "Thêm danh mục thành công!";
            }
            include "danhmuc/add.php";
            break;

        // Hiển thị danh sách danh mục
        case 'listdm':
            $sql = "SELECT * FROM categories";
            $categories = pdo_query($sql);
            include "danhmuc/list.php";
            break;

        // Sửa danh mục
        case 'editdm':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM categories WHERE id=$id";
                $category = pdo_query_one($sql);
            }
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $sql = "UPDATE categories SET name='$name' WHERE id=$id";
                pdo_execute($sql);
                $thongbao = "Cập nhật danh mục thành công!";
            }
            include "danhmuc/edit.php";
            break;

        // Xóa danh mục
        case 'deletedm':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $sql = "DELETE FROM categories WHERE id=$id";
                pdo_execute($sql);
                $thongbao = "Xóa danh mục thành công!";
            }
            $sql = "SELECT * FROM categories";
            $categories = pdo_query($sql);
            include "danhmuc/list.php";
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
