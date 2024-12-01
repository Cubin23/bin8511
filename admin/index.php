<?php 
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/khachhang.php";
include "../model/thongke.php";
include "header.php";

// Controller logic
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        // Danh mục controller
        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $ten_danh_muc = $_POST['ten_danh_muc'];
                insert_danh_muc($ten_danh_muc);
                $thongbao = "Thêm thành công!!";
            }
            include "danhmuc/add.php";
            break;

        case 'listdm':
            $listdanhmuc = loadall_danh_muc();
            include "danhmuc/list.php";
            break;

        case 'xoadm':
            if (isset($_GET['danh_muc_id']) && ($_GET['danh_muc_id'] > 0)) {
                delete_danh_muc($_GET['danh_muc_id']);
            }
            $listdanhmuc = loadall_danh_muc();
            include "danhmuc/list.php";
            break;

        case 'suadm':
            if (isset($_GET['danh_muc_id']) && ($_GET['danh_muc_id'] > 0)) {
                $dm = loadone_danh_muc($_GET['danh_muc_id']);
            }
            include "danhmuc/update.php";
            break;

        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $ten_danh_muc = $_POST['ten_danh_muc'];
                $danh_muc_id = $_POST['danh_muc_id'];
                update_danh_muc($danh_muc_id, $ten_danh_muc);
                $thongbao = "Cập nhật thành công!!";
            }
            $listdanhmuc = loadall_danh_muc();
            include "danhmuc/list.php";
            break;

        // Sản phẩm controller
        case 'addsp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $danh_muc_id = isset($_POST['danh_muc_id']) ? $_POST['danh_muc_id'] : null;
                if ($danh_muc_id === null || $danh_muc_id === '') {
                    $thongbao = "Lỗi: ID danh mục không được để trống!";
                    break;
                }

                $ten_san_pham = $_POST['ten_san_pham'];
                $gia = $_POST['gia'];
                $mo_ta = $_POST['mo_ta'];
                $anh_url = $_FILES['anh_url']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["anh_url"]["name"]);

                if (move_uploaded_file($_FILES["anh_url"]["tmp_name"], $target_file)) {
                    insert_san_pham($ten_san_pham, $gia, $danh_muc_id, $mo_ta, $anh_url);
                    $thongbao = "Thêm thành công!!";
                } else {
                    $thongbao = "Lỗi tải ảnh lên!";
                }
            }
            $listdanhmuc = loadall_danh_muc();
            include "sanpham/add.php";
            break;

        case 'listsp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $danh_muc_id = $_POST['danh_muc_id'];
            } else {
                $kyw = '';
                $danh_muc_id = 0;
            }
            $listdanhmuc = loadall_danh_muc();
            $listsanpham = loadall_san_pham($kyw, $danh_muc_id);
            include "sanpham/list.php";
            break;

        case 'xoasp':
            if (isset($_GET['san_pham_id']) && ($_GET['san_pham_id'] > 0)) {
                delete_san_pham($_GET['san_pham_id']);
            }
            $listsanpham = loadall_san_pham("", 0);
            include "sanpham/list.php";
            break;

        case 'suasp':
            if (isset($_GET['san_pham_id']) && ($_GET['san_pham_id'] > 0)) {
                $sanpham = loadone_san_pham($_GET['san_pham_id']);
            }
            $listdanhmuc = loadall_danh_muc();
            include "sanpham/update.php";
            break;

        case 'updatesp':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $san_pham_id = $_POST['san_pham_id'] ?? '';
                $danh_muc_id = $_POST['iddanhmuc'] ?? '';
                $ten_san_pham = $_POST['ten_san_pham'] ?? '';
                $gia = $_POST['gia'] ?? '';
                $mo_ta = $_POST['mo_ta'] ?? '';
                $anh_url = '';

                if (!empty($_FILES['anh_url']['name'])) {
                    $anh_url = $_FILES['anh_url']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["anh_url"]["name"]);

                    if (!move_uploaded_file($_FILES["anh_url"]["tmp_name"], $target_file)) {
                        echo "Lỗi tải ảnh lên!";
                        exit();
                    }
                }

                if ($san_pham_id && $danh_muc_id > 0 && $ten_san_pham && $gia) {
                    update_san_pham($san_pham_id, $ten_san_pham, $gia, $mo_ta, $danh_muc_id, $anh_url);
                    $thongbao = "Cập nhật thành công!";
                } else {
                    $thongbao = "Vui lòng điền đầy đủ thông tin!";
                }
            }
            $listdanhmuc = loadall_danh_muc();
            $listsanpham = loadall_san_pham();
            include "sanpham/list.php";
            break;

        // Khách hàng controller
        case 'dskh':
            $listkh = load_all_customers();
            include "khachhang/list.php";
            break;

        case 'viewkh':
            if (isset($_GET['nguoi_dung_id']) && is_numeric($_GET['nguoi_dung_id'])) {
                $id = intval($_GET['nguoi_dung_id']);
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

        case 'deletekh':
            if (isset($_GET['nguoi_dung_id'])) {
                $id = $_GET['nguoi_dung_id'];
                delete_customer($nguoi_dung_id);
            }
            header("Location: index.php?act=dskh");
            exit;

        // Thống kê controller
        case 'listthongke':
            $listthongke = load_all_thong_ke();
            include "thongke/list.php";
            break;

        case 'addthongke':
            if (isset($_POST['themmoi'])) {
                $san_pham_id = $_POST['san_pham_id'];
                $so_luong_ban = $_POST['so_luong_ban'];
                $doanh_thu = $_POST['doanh_thu'];
                $ngay = $_POST['ngay'];
                insert_thong_ke($san_pham_id, $so_luong_ban, $doanh_thu, $ngay);
                $thongbao = "Thêm thành công!";
            }
            include "thongke/add.php";
            break;

        case 'xoathongke':
            if (isset($_GET['thong_ke_id'])) {
                delete_thong_ke($_GET['thong_ke_id']);
            }
            $listthongke = load_all_thong_ke();
            include "thongke/list.php";
            break;

        case 'suathongke':
            if (isset($_GET['thong_ke_id'])) {
                $thongke = load_one_thong_ke($_GET['thong_ke_id']);
            }
            include "thongke/update.php";
            break;

        case 'updatethongke':
            if (isset($_POST['capnhat'])) {
                $thong_ke_id = $_POST['thong_ke_id'];
                $san_pham_id = $_POST['san_pham_id'];
                $so_luong_ban = $_POST['so_luong_ban'];
                $doanh_thu = $_POST['doanh_thu'];
                $ngay = $_POST['ngay'];
                update_thong_ke($thong_ke_id, $so_luong_ban, $doanh_thu, $ngay, $san_pham_id);
                $thongbao = "Cập nhật thành công!";
            }
            $listthongke = load_all_thong_ke();
            include "thongke/list.php";
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
