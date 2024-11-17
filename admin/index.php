<?php
include "../model/pdo.php";
include "header.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
            // Thêm danh mục
        case 'adddm':
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $maloai = $_POST['maloai'];
                $tensp = $_POST['tensp'];
                $price = $_POST['price'];
                $description = $_POST['description']; // Lấy thông tin mô tả

                // Câu lệnh SQL để thêm danh mục mới vào cơ sở dữ liệu
                $sql = "INSERT INTO categories (maloai, name, price, description) VALUES ('$maloai', '$tensp', '$price', '$description')";
                pdo_execute($sql);

                $thongbao = "Thêm thành công";
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
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                // Xóa danh mục khỏi cơ sở dữ liệu
                $sql = "DELETE FROM categories WHERE id = $id";
                pdo_execute($sql);

                $thongbao = "Xóa thành công";
                header("Location: index.php?act=adddm");  // Chuyển hướng về danh sách danh mục
            }
            break;


        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include "footer.php";
