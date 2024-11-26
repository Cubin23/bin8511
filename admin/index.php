<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/khachhang.php";
include "../model/binhluan.php";
include "../model/sanpham.php";
include "header.php";

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
                // Kiểm tra và lấy dữ liệu từ form
                $ten_san_pham = trim($_POST['ten_san_pham'] ?? '');
                $gia = trim($_POST['gia'] ?? '');
                $danh_muc_id = $_POST['danh_muc_id'] ?? null;
                $mo_ta = trim($_POST['mo_ta'] ?? '');
                $error = ''; // Biến để lưu thông báo lỗi nếu có

                // Kiểm tra các trường bắt buộc
                if (empty($ten_san_pham)) {
                    $error .= "Tên sản phẩm không được để trống.<br>";
                }
                if (empty($gia)) {
                    $error .= "Giá sản phẩm không được để trống.<br>";
                }
                if (empty($danh_muc_id)) {
                    $error .= "Vui lòng chọn danh mục.<br>";
                }
                if (empty($mo_ta)) {
                    $error .= "Mô tả sản phẩm không được để trống.<br>";
                }

                // Kiểm tra file ảnh
                if (!isset($_FILES['anh_url']) || $_FILES['anh_url']['error'] === UPLOAD_ERR_NO_FILE) {
                    $error .= "Vui lòng tải lên hình ảnh sản phẩm.<br>";
                }

                // Nếu có lỗi, không thực hiện thêm sản phẩm và hiển thị lỗi
                if (!empty($error)) {
                    $thongbao = "<div style='color: red;'>" . $error . "</div>";
                } else {
                    // Xử lý file upload nếu không có lỗi
                    if (isset($_FILES['anh_url']) && $_FILES['anh_url']['error'] === UPLOAD_ERR_OK) {
                        $filename = $_FILES['anh_url']['name'];
                        $target_dir = "../upload/";
                        $target_file = $target_dir . basename($filename);

                        // Kiểm tra nếu file có thể tải lên
                        if (move_uploaded_file($_FILES['anh_url']['tmp_name'], $target_file)) {
                            $upload_status = "File uploaded successfully.";
                            $anh_url = $filename; // Lưu tên ảnh vào biến
                        } else {
                            $upload_status = "Failed to upload file.";
                            $anh_url = ''; // Nếu có lỗi khi upload, để giá trị mặc định
                        }
                    }

                    // Gọi hàm thêm sản phẩm (sửa đúng tham số)
                    insert_san_pham($ten_san_pham, $gia, $danh_muc_id, $mo_ta, $anh_url);

                    $thongbao = "Thêm mới sản phẩm thành công!";
                }
            }

            // Load danh mục
            $listcategory = loadall_danh_muc();

            // Hiển thị form thêm
            include "sanpham/add.php";
            break;




        case 'listsp':
            $listsanpham = loadall_san_pham();
            include "sanpham/list.php";
            break;
        case 'xoasp':
            if (isset($_GET['san_pham_id']) && ($_GET['san_pham_id'] > 0)) {
                $san_pham_id = intval($_GET['san_pham_id']); // Lấy giá trị từ URL
                delete_san_pham($san_pham_id);
            }
            $listsanpham = loadall_san_pham("", 0);
            include "sanpham/list.php";
            break;

        case 'suasp':
            if (isset($_GET['san_pham_id']) && ($_GET['san_pham_id'] > 0)) {
                $san_pham_id = intval($_GET['san_pham_id']); // Lấy giá trị từ URL
                $sanpham = loadone_san_pham($san_pham_id);
            }
            $listcategory = loadall_danh_muc();

            include "sanpham/update.php";
            break;
        case 'updatesp':
            if (isset($_GET['san_pham_id'])) {
                $san_pham_id = $_GET['san_pham_id'];  // Lấy ID sản phẩm từ URL
                echo "San Pham ID: " . $san_pham_id; // Kiểm tra ID

                $sanpham = loadone_san_pham($san_pham_id);
                if (!$sanpham) {
                    echo "Không tìm thấy sản phẩm với ID: " . $san_pham_id;
                    exit;  // Nếu không có sản phẩm, dừng lại
                }

                if (isset($_POST['update']) && $_POST['update'] === 'update') {
                    // Lấy dữ liệu từ form
                    $ten_san_pham = trim($_POST['ten_san_pham'] ?? '');
                    $gia = trim($_POST['gia'] ?? '');
                    $danh_muc_id = $_POST['danh_muc_id'] ?? null;
                    $mo_ta = trim($_POST['mo_ta'] ?? '');

                    // Xử lý file ảnh
                    $anh_url = ''; // Giá trị mặc định
                    if (isset($_FILES['anh_url']) && $_FILES['anh_url']['error'] === UPLOAD_ERR_OK) {
                        $filename = $_FILES['anh_url']['name'];
                        $target_dir = "../upload/";
                        $target_file = $target_dir . basename($filename);

                        if (move_uploaded_file($_FILES['anh_url']['tmp_name'], $target_file)) {
                            $anh_url = $filename;
                        } else {
                            $anh_url = $sanpham['anh_url']; // Giữ lại ảnh cũ nếu tải ảnh mới không thành công
                        }
                    } else {
                        $anh_url = $sanpham['anh_url']; // Giữ lại ảnh cũ nếu không có ảnh mới
                    }

                    // Cập nhật sản phẩm
                    update_san_pham($san_pham_id, $ten_san_pham, $gia, $mo_ta, $danh_muc_id, $anh_url);

                    $thongbao = "Cập nhật thành công!";
                }

                // Load danh mục
                $listcategory = loadall_danh_muc();

                // Hiển thị form cập nhật
                include "sanpham/update.php";
            } else {
                echo "ID sản phẩm không tồn tại!";
                exit;  // Dừng nếu không có ID sản phẩm trong URL
            }
            break;

            case 'dsbl': // Danh sách bình luận
                include "binhluan/list.php";
                break;
        
            case 'binhluan_by_sp': // Bình luận theo sản phẩm
                include "binhluan/comments_by_product.php";
                break;
        
            case 'delete_binhluan': // Xóa bình luận
                $binh_luan_id = $_GET['binh_luan_id'] ?? 0;
                if ($binh_luan_id) {
                    delete_comment($binh_luan_id);
                    header("Location: index.php?act=dsbl");
                }
                break;
        
            

        case 'dskh': // Hiển thị danh sách khách hàng
            $listkh = load_all_customers();
            include "khachhang/list.php";
            break;

        case 'viewkh':
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $customer = load_customer_by_id($id);

                if (!$customer) {
                    echo "Không tìm thấy khách hàng.";
                    exit;
                }

                include "khachhang/view.php";
            } else {
                echo "ID khách hàng không hợp lệ.";
            }
            break;


        case 'deletekh': // Xóa khách hàng
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_customer($id);
            }
            header("Location: index.php?act=dskh");
            exit;

        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include "footer.php";
