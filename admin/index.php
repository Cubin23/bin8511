<?php
try {
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/binhluan.php";
    include "../model/khachhang.php";
    include "header.php";
} catch (Exception $e) {
    error_log($e->getMessage());
    die("Không thể tải dữ liệu, vui lòng kiểm tra lại.");
}

if (isset($_GET['act'])) {
    $act = $_GET['act'];

    switch ($act) {
        case 'adddm':
            if (isset($_POST['them']) && $_POST['them'] === 'them') {
                // Debug: In giá trị từ $_POST

                // Lấy tên danh mục và mô tả từ $_POST, sử dụng giá trị mặc định nếu không có dữ liệu
                $ten_danh_muc = trim($_POST['ten_danh_muc'] ?? ''); // Lấy tên danh mục và loại bỏ khoảng trắng
                $mo_ta = trim($_POST['mo_ta'] ?? ''); // Lấy mô tả và loại bỏ khoảng trắng

                // Kiểm tra các trường nhập
                if (empty($ten_danh_muc)) {
                    $thongbao = "Vui lòng nhập tên danh mục!";
                } elseif (empty($mo_ta)) {
                    $thongbao = "Vui lòng nhập mô tả!";
                } else {
                    // Thêm vào cơ sở dữ liệu
                    if (insert_danh_muc($ten_danh_muc, $mo_ta)) {
                        $thongbao = "Thêm mới danh mục thành công!";
                    } else {
                        $thongbao = "Có lỗi khi thêm danh mục!";
                    }
                }
            }

            include "danhmuc/add.php";
            break;

        case 'listdm':
            $listdanhmuc = loadall_danh_muc();
            include "danhmuc/list.php";
            break;
        case 'xoadm':
            if (isset($_GET['danh_muc_id']) && ($_GET['danh_muc_id'] > 0)) {
                $danh_muc_id = intval($_GET['danh_muc_id']); // Lấy giá trị từ URL
                delete_danh_muc($danh_muc_id);
            }
            $listdanhmuc = loadall_danh_muc();
            include "danhmuc/list.php";
            break;

        case 'suadm':
            if (isset($_GET['danh_muc_id']) && ($_GET['danh_muc_id'] > 0)) {
                $danh_muc_id = intval($_GET['danh_muc_id']); // Lấy giá trị từ URL
                $dm = loadone_danh_muc($danh_muc_id);
            }
            include "danhmuc/update.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat']) && isset($_POST['danh_muc_id']) && !empty($_POST['ten_danh_muc'])) {
                // Lấy dữ liệu từ form
                $ten_danh_muc = trim($_POST['ten_danh_muc']);
                $mo_ta = trim($_POST['mo_ta']);
                $danh_muc_id = intval($_POST['danh_muc_id']); // Chuyển thành số nguyên

                try {
                    // Thực hiện câu lệnh cập nhật
                    $rows_affected = update_danh_muc($danh_muc_id, $ten_danh_muc, $mo_ta);

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
            $listcategory = loadall_danh_muc();
            include "danhmuc/list.php";
            break;
        case 'addsp':
            if (isset($_POST['them']) && $_POST['them'] === 'them') {
                $tensp = trim($_POST['tensp']); // Lấy tên danh mục và loại bỏ khoảng trắng
                $price = trim($_POST['price']);
                $category_id = trim($_POST['category_id']);
                $description = trim($_POST['mota']); // Lấy mô tả và loại bỏ khoảng trắng

                // Kiểm tra các trường nhập
                if (empty($tensp)) {
                    $thongbao = "Vui lòng nhập tên danh mục!";
                } elseif (empty($description)) {
                    $thongbao = "Vui lòng nhập mô tả!";
                } elseif (empty($price)) {
                    $thongbao = "Vui lòng nhập giá sản phẩm!";
                } else {
                    // Câu lệnh SQL sử dụng tham số chuẩn bị
                    insert_products($tensp, $description, $price, $category_id);

                    $thongbao = "Thêm mới danh mục thành công!";
                }
            }

            include "sanpham/add.php";
            break;
        case 'listsp':
            $listproduct = loadall_products();
            include "sanpham/list.php";
            break;
        case 'xoasp':
            if (isset($_GET['products_id']) && ($_GET['products_id'] > 0)) {
                $product_id = intval($_GET['product_id']); // Lấy giá trị từ URL
                delete_products($product_id);
            }
            $listproduct = loadall_products();
            include "sanpham/list.php";
            break;

        case 'suasp':
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                $product_id = intval($_GET['product_id']); // Lấy giá trị từ URL
                $dm = loadone_products($product_id);
            }
            include "sanpham/update.php";
            break;
        case 'updatesp':
            if (isset($_POST['capnhat']) && isset($_POST['product_id']) && !empty($_POST['tensp'])) {
                // Lấy dữ liệu từ form
                $product_id = intval($_POST['product_id']);
                $tensp = trim($_POST['tensp']);
                $description = trim($_POST['mota']);
                $category_id = intval($_POST['category_id']); // Chuyển thành số nguyên

                try {
                    // Thực hiện câu lệnh cập nhật
                    $rows_affected = update_products($product_id, $tensp, $description, $category_id);

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
            $listcategory = loadall_products();
            include "sanpham/list.php";
            break;
        case 'dsbl': // Hiển thị danh sách bình luận
            include "../model/binhluan.php";
            $san_pham_id = isset($_GET['san_pham_id']) ? intval($_GET['san_pham_id']) : 0;
            $listbinhluan = loadall_binh_luan($san_pham_id);
            include "binhluan/list.php";
            break;

        case 'xoabl': // Xóa bình luận
            include "../model/binhluan.php";
            if (isset($_GET['binh_luan_id'])) {
                $binh_luan_id = intval($_GET['binh_luan_id']);
                delete_binh_luan($binh_luan_id);
            }
            header("Location: index.php?act=dsbl");
            break;
            case 'dskh': // Hiển thị danh sách khách hàng
                try {
                    include "khachhang/list.php";
                } catch (Exception $e) {
                    error_log("Lỗi hiển thị danh sách khách hàng: " . $e->getMessage());
                    echo "Có lỗi xảy ra khi tải danh sách khách hàng!";
                }
                break;
            
            case 'editkh': // Sửa thông tin khách hàng
                if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
                    $id = intval($_GET['id']);
                    try {
                        include "khachhang/edit.php";
                    } catch (Exception $e) {
                        error_log("Lỗi khi sửa khách hàng với ID $id: " . $e->getMessage());
                        echo "Có lỗi xảy ra khi sửa thông tin khách hàng!";
                    }
                } else {
                    echo "ID khách hàng không hợp lệ!";
                }
                break;
            
                case 'deletekh': // Xóa khách hàng
                    if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
                        $id = intval($_GET['id']);
                        try {
                            delete_customer($id);
                            header("Location: index.php?act=dskh&message=success");
                            exit;
                        } catch (Exception $e) {
                            error_log("Lỗi khi xóa khách hàng với ID $id: " . $e->getMessage());
                            echo "Có lỗi xảy ra khi xóa khách hàng!";
                        }
                    } else {
                        echo "ID khách hàng không hợp lệ!";
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
