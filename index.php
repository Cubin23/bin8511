<?php 
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
            
            
        case 'dangnhap' :
            include "view/taikhoan/dangnhap.php";
            break;
        default:
            include "view/home.php";
    }
}else{
    include "view/home.php";
}

include "view/footer.php";











?>