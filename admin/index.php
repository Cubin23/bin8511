
<?php
include "../model/pdo.php";
include "header.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        // Thêm danh mục
        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tensp = $_POST['tensp'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $image = NULL;
            
                // Kiểm tra nếu có hình ảnh được tải lên
                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    // Tạo tên file mới để tránh trùng
                    $image_name = time() . '-' . $_FILES['image']['name'];
                    $image_tmp = $_FILES['image']['tmp_name'];
                    $image_dir = '../uploads/'; // Đảm bảo bạn đã tạo thư mục này
                    move_uploaded_file($image_tmp, $image_dir . $image_name);
            
                    $image = $image_dir . $image_name; // Lưu đường dẫn ảnh
                }
            
                // Chèn vào cơ sở dữ liệu
                $sql = "INSERT INTO categories (name, price, description, image) VALUES ('$tensp', '$price', '$description', '$image')";
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
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                
                // Lấy thông tin danh mục cần chỉnh sửa
                $sql = "SELECT * FROM categories WHERE id = $id";
                $category = pdo_query_one($sql);  // Sử dụng pdo_query_one để lấy 1 dòng dữ liệu
                
                include "danhmuc/edit.php";  // Hiển thị form chỉnh sửa
            }
        
            // Xử lý cập nhật thông tin danh mục
            if (isset($_POST['capnhat'])) {
                $id = $_POST['id'];
                $maloai = $_POST['maloai'];
                $tensp = $_POST['tensp'];
                $price = $_POST['price'];
                $description = $_POST['description'];
        
                // Cập nhật thông tin danh mục trong cơ sở dữ liệu
                $sql = "UPDATE categories SET maloai = '$maloai', name = '$tensp', price = '$price', description = '$description' WHERE id = $id";
                pdo_execute($sql);
        
                $thongbao = "Cập nhật thành công";
                header("Location: index.php?act=adddm");  // Chuyển hướng về danh sách danh mục
            }
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
?>
