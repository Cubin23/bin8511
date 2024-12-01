<?php
session_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/taikhoan.php";
include "model/cart.php";
include "view/header.php";
include "global.php";


if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];
// Các xử lý khác của trang...


// Kiểm tra hoạt động của trang
$spnew = loadall_san_pham_home();
$dsdm = loadall_danh_muc();
$dstop10 = loadall_san_pham_top10();

// Xử lý hành động
if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanpham':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != 0)) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['danh_muc_id']) && ($_GET['danh_muc_id'] > 0)) {
                $danh_muc_id = $_GET['danh_muc_id'];
            } else {
                $danh_muc_id = 0;
            }
            $dssp = loadall_san_pham($kyw, $danh_muc_id);
            $tendm = load_ten_dm($danh_muc_id);
            include "view/sanpham.php";
            break;
        case 'sanphamchitiet':
            
            if(isset($_GET['san_pham_id'])&&($_GET['san_pham_id']>0)){
                $san_pham_id=$_GET['san_pham_id'];
                $onesp=loadone_san_pham($san_pham_id);
                extract($onesp);
                $spcungloai=loadone_san_pham_cungloai($san_pham_id,$danh_muc_id);
                
                include "view/sanphamchitiet.php";
            }else{
                include "view/home.php";
            }
            break;
            case 'dangky':
                if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                    $ho_ten = $_POST['ho_ten'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $dia_chi = $_POST['dia_chi'];
                    $email = $_POST['email'];
                    $sdt = $_POST['sdt'];
                    
                    // Gọi hàm thêm người dùng
                    $result = insert_nguoi_dung_khach_hang($username, $password, $email, $sdt, $ho_ten, $dia_chi);
                    
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
                            // Lưu thông tin người dùng vào session sau khi đăng nhập thành công
                            $_SESSION['username'] = $checkuser['username']; // Lưu tên người dùng
                            $_SESSION['nguoi_dung_id'] = $checkuser['nguoi_dung_id'];   // Lưu ID người dùng
                            $_SESSION['loai_dung_id'] = $checkuser['loai_nguoi_dung'];         // Lưu quyền của người dùng
                
                            header('Location: index.php'); // Chuyển hướng về trang chủ
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
                   
                    
                case 'quenmk':
                    if(isset($_POST['quenmk'])&&($_POST['quenmk'])){
                        $email = $_POST['email'];
                        $checkemail=checksdt($email);
                        if(is_array($checkemail)){
                            $thongbao = "Mật khẩu của bạn là : ".$checkemail['password'];
                        }else{
                            $thongbao = "Email của bạn không tồn tại";
                        }
                    }
                    include "view/taikhoan/quenmk.php";

                    break;

        case 'lienhe':
            include "view/lienhe.php";
            break;
        case 'tintuc':
            include "view/tintuc.php";
            break;
        case 'chinhsach':
            include "view/chinhsach.php";
            break;
            case 'gioithieu':
                include "view/gioithieu.php";
                break;
                case 'kienthuccaycanh':
                include "view/kienthuccaycanh.php";
                break;
                case 'chamsoccaycanh':
                    include "view/chamsoccaycanh.php";
                    break;
                    case 'addtocart':
                        if(isset($_POST['addtocart'])&&($_POST['addtocart'])){
                            $san_pham_id = $_POST['san_pham_id'];
                            $ten_san_pham = $_POST['ten_san_pham'];
                            $anh_url = $_POST['anh_url'];
                            $gia = $_POST['gia'];
                            $soluong=1;
                            $ttien=$soluong*$gia;
                            $spadd=[$anh_url,$ten_san_pham,$san_pham_id,$gia,$soluong];
                            array_push($_SESSION['mycart'],$spadd);
                        
                        
                        }
                        include "view/cart/viewcart.php";
                        break;
                        case 'delcart':
                            if (isset($_GET['idcart'])) {
                                $idcart = $_GET['idcart'];  // Lấy id của sản phẩm cần xóa
                                unset($_SESSION['mycart'][$idcart]);  // Xóa sản phẩm tại vị trí $idcart
                                $_SESSION['mycart'] = array_values($_SESSION['mycart']);  // Đảm bảo các chỉ số mảng được cập nhật lại liên tục
                            } else {
                                $_SESSION['mycart'] = [];  // Xóa tất cả sản phẩm trong giỏ
                            }
                            header('Location: index.php?act=viewcart');  // Chuyển hướng về giỏ hàng
                            break;
                        
                    case  'viewcart':
                        include "view/cart/viewcart.php";
                        break;
                        case  'bill':
                            include "view/cart/bill.php";
                            break;
                            case  'mybill':
                                include "view/cart/mybill.php";
                                break;
                                case  'billcomfirm':
                                    if(isset($_POST['dathang'])&&($_POST['dathang'])){
                                        $ho_ten=$_POST['ho_ten'];
                                        $email=$_POST['email'];
                                        $dia_chi=$_POST['dia_chi'];
                                        $sdt=$_POST['sdt'];
                                        $tongdonhang = tongdonhang();
                                    }
                                    include "view/cart/billcomfirm.php.";
                                    break;
                    
                        

        default:

            break;
        }
    }else{
        include "view/home.php";
    }
include "view/footer.php";


?>