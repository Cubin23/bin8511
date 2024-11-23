<?php 
session_start();

include "model/danhmuc.php";
include "model/sanpham.php";

include "model/taikhoan.php";
include "model/pdo.php";
include "view/header.php";
if((isset($_GET['act']))&& ($_GET['act']!="")){
    $act=$_GET['act'];
    switch ($act){
        case 'gioithieu' :
            include "view/gioithieu.php";
            break;
        case 'kienthuccaycanh' :
            include "view/kienthuccaycanh.php";
            break;
        case 'sanpham' :
            include "view/sanpham.php";
            break;
        case 'chinhsach' :
            include "view/chinhsach.php";
            break;
        case 'tintuc' :
            include "view/tintuc.php";
            break;
        case 'lienhe' :
            include "view/lienhe.php";
            break;
            case 'dangky':
                if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                    $ho_ten = $_POST['ho_ten'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $sdt = $_POST['sdt'];
                    
                    // Gọi hàm thêm người dùng
                    $result = insert_nguoi_dung_khach_hang($username, $password, $email, $sdt, $ho_ten);
                    
                    if ($result) {
                        // Đăng ký thành công
                        $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập.";
                    } else {
                        // Kiểm tra lỗi
                        $thongbao = "Đăng ký thất bại. Vui lòng thử lại.";
                    }
                }
                include "view/taikhoan/dangky.php";
                break;
            
            
                case 'dangnhap':
                    if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                
                        // Gọi hàm kiểm tra người dùng
                        $checkuser = checkuser($username, $password);
                
                        if (is_array($checkuser)) {
                            // Lưu tên người dùng vào session sau khi đăng nhập thành công
                           // Giả sử bảng có 'user_id'
                            $_SESSION['username'] = $checkuser['username'];  // Lưu tên người dùng
                            header('Location: index.php');  // Chuyển hướng về trang chủ
                        } else {
                            // Nếu không tìm thấy người dùng
                            $thongbao = "Tài khoản không tồn tại! Vui lòng đăng ký tài khoản.";
                        }
                    }
                    include "view/taikhoan/dangnhap.php";
                    break;
                    case 'logout':
                        session_start();
                        session_unset();  // Xóa tất cả các session
                        session_destroy();  // Hủy phiên làm việc
                        header('Location: index.php');  // Chuyển hướng về trang chủ
                        break;
                    
                
        default:
            include "view/home.php";
    }
}else{
    include "view/home.php";
}

include "view/footer.php";











?>