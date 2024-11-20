<?php 
include "../model/pdo.php";
include "../model/danhmuc.php";
include "header.php";

if(isset($_GET['act'])){
    $act =$_GET['act'];
  
    switch ($act){
        case 'adddm':
            if (isset($_POST['them']) && $_POST['them'] === 'them') { 
                $tensp = trim($_POST['tensp']); // Lấy tên danh mục và loại bỏ khoảng trắng
                $description = trim($_POST['mota']); // Lấy mô tả và loại bỏ khoảng trắng
        
                // Kiểm tra các trường nhập
                if (empty($tensp)) {
                    $thongbao = "Vui lòng nhập tên danh mục!";
                } elseif (empty($description)) {
                    $thongbao = "Vui lòng nhập mô tả!";
                } else {
                    // Câu lệnh SQL sử dụng tham số chuẩn bị
                    insert_categories($tensp,$description);
                    $thongbao = "Thêm mới danh mục thành công!";
                }
            }
        
            include "danhmuc/add.php";
            break;
        case 'listdm':
            $listcategory=loadall_categories();
            include "danhmuc/list.php";
            break;
            case 'xoadm':
                if (isset($_GET['category_id']) && ($_GET['category_id'] > 0)) {
                    $category_id = intval($_GET['category_id']); // Lấy giá trị từ URL
                    delete_categories($category_id);
                }
                $listcategory = loadall_categories();
                include "danhmuc/list.php";
                break;
            
            case 'suadm':
                if (isset($_GET['category_id']) && ($_GET['category_id'] > 0)) {
                    $category_id = intval($_GET['category_id']); // Lấy giá trị từ URL
                    $dm = loadone_categories($category_id);
                }
                include "danhmuc/update.php";
                break;
                case 'updatedm':
                    if (isset($_POST['capnhat']) && isset($_POST['category_id']) && !empty($_POST['tensp'])) {
                        // Lấy dữ liệu từ form
                        $tensp = trim($_POST['tensp']);
                        $description = trim($_POST['mota']);
                        $category_id = intval($_POST['category_id']); // Chuyển thành số nguyên
                
                        try {
                            // Thực hiện câu lệnh cập nhật
                            $rows_affected = update_categories($category_id, $tensp, $description);
                
                            // Kiểm tra kết quả
                            $thongbao = ($rows_affected > 0) 
                                ? "Cập nhật thành công!" 
                                : "Không có thay đổi nào được thực hiện (có thể dữ liệu mới trùng với dữ liệu cũ).";
                        } catch (Exception $e) {
                            error_log("Lỗi cập nhật danh mục: " . $e->getMessage());
                            $thongbao = "Có lỗi xảy ra trong quá trình cập nhật!";
                        }
                    } else {
                        $thongbao = "Dữ liệu không hợp lệ!";
                    }
                
                    // Lấy danh sách danh mục
                    $listcategory = loadall_categories();
                    include "danhmuc/list.php";
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