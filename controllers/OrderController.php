<?php
// Hàm hiển thị dữ liệu ra trang thanh toán
function orderIndex()
{
    // Kiểm tra xem giỏ hàng đã được khởi tạo trong session chưa
    if (isset($_SESSION["cart"])) {
        $cartItems = $_SESSION["cart"];
        addPromotion();
    } else {
        header('location: ' . BASE_URL . '?act=cart');
    }

    require_once PATH_VIEW . 'order.php';
    unset($_SESSION['error']);
    unset($_SESSION['success']);
}

// Hàm thêm dữ liệu đơn hàng
function addOrder()
{
    $user_id = $_SESSION['user']['id'];

    if (isset($_POST)) {
        $err = orderValidate();

        if (!empty($err)) {
            $_SESSION['error'] = $err;
            header('location: ' . BASE_URL . '?act=order');
            die;
        }

        $orderData = [
            'ma_dh' => time() . rand(1000, 9999),
            'id_nd' => $user_id,
            'id_tt' => 3,
            'ma_km' => $_SESSION['promotion']['ma_km'] ?? '',
            'tong_tien' => $_POST['total_bill'],
            'ho_ten' => $_POST['ho_ten'],
            'email' => $_POST['email'],
            'so_dien_thoai' => $_POST['so_dien_thoai'],
            'dia_chi' => $_POST['dia_chi'],
            'ghi_chu' => $_POST['ghi_chu'] ?? '',
        ];

        // Thêm thông tin người đặt và vào đơn hàng
        $dataUrl = '';

        foreach ($orderData as $key => $value) {
            $dataUrl .= '&' . $key . '=' . $value;
        }
    }

    if (isset($_POST['addOrder'])) {
        header('location: ' . BASE_URL . '?act=thanks&id_pttt=1' . $dataUrl);
    }

    if (isset($_POST['vnpay'])) {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl =  BASE_URL . '?act=thanks&id_pttt=2' . $dataUrl;
        $vnp_TmnCode = "CGXZLS0Z"; //Mã website tại VNPAY 
        $vnp_HashSecret = "XNBCJFAKAZQSGTARRLGCHVZWCIOIGSHN"; //Chuỗi bí mật

        $vnp_TxnRef = time() . rand(1000, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán đơn hàng ' . $vnp_TxnRef;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $_POST['total_bill'] * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['vnpay'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }

    if (isset($_POST['payUrl'])) {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $_POST['total_bill'];
        $orderId = time() . rand(1000, 9999);
        $redirectUrl = BASE_URL . '?act=thanks&id_pttt=3' . $dataUrl;
        $ipnUrl = BASE_URL . '?act=thanks&id_pttt=3' . $dataUrl;
        $extraData = "";

        $serectkey = $secretKey;

        $requestId = time() . "";
        $requestType = "payWithATM";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $serectkey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json

        header('Location: ' . $jsonResult['payUrl']);
    }
}

// Hàm thêm sản phẩm vào bảng chi tiết đơn hàng
function createOrder($orderData)
{
    $order_id = insert_get_last_id('tb_don_hang', $orderData);

    if ($order_id !== null) {
        $cartItems = $_SESSION["cart"];

        foreach ($cartItems as $item) {
            $product = showOne('tb_san_pham', $item["id"]);
            $priceProduct = $product['gia_km'] != 0 ? $product['gia_km'] : $product['gia_sp'];

            $newOrderItem = [
                "id_dh" => $order_id,
                "id_sp" => $item["id"],
                "so_luong" => $item["quantity"],
                "gia" => $priceProduct,
            ];

            insert('tb_chi_tiet_dh', $newOrderItem);
            update('tb_san_pham', $item["id"], ['so_luong' => $product['so_luong'] - $item["quantity"]]);
        }
    }
}

function addPromotion()
{
    if (isset($_POST['ma_km'])) {
        $promotion = checkPromotionCode($_POST['ma_km']);
        if ($promotion && $promotion['ngay_ket_thuc'] >= date('Y-m-d') && $promotion['ngay_bat_dau'] <= date('Y-m-d')) {
            $_SESSION['sussecc'] = ['Áp dụng mã khuyến mãi thành công'];
            $_SESSION['promotion'] = $promotion;
        } else {
            $_SESSION['error'] = ['Mã khuyến mãi không hợp lệ'];
        }
    }
}

function orderValidate()
{
    $err = [];

    if (empty($_POST['ho_ten'])) {
        $err[] = 'Vui lòng nhập họ tên';
    }

    if (empty($_POST['email'])) {
        $err[] = 'Vui lòng nhập email';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $err[] = 'Email không hợp lệ';
    }

    if (empty($_POST['so_dien_thoai'])) {
        $err[] = 'Vui lòng nhập số điện thoại';
    } elseif (!preg_match('/^[0-9]{10}$/', $_POST['so_dien_thoai'])) {
        $err[] = 'Số điện thoại không hợp lệ';
    }

    if (empty($_POST['dia_chi'])) {
        $err[] = 'Vui lòng nhập địa chỉ';
    }

    return $err;
}

function myOrderIndex()
{
    $user_id = $_SESSION['user']['id'];
    $orders = getOrderByUserID($user_id);

    require_once PATH_VIEW . 'my-order.php';
}

function orderDetailIndex($id)
{
    $order = showOne('tb_don_hang', $id);

    if (empty($order)) {
        echo "<script>alert('Đơn hàng không tồn tại')</script>";
        header('location: ' . BASE_URL . '?act=myOrder');
    }

    $orderDetails = showAllDetailOrrder($id);
    $status = showOne('tb_trang_thai', $order['id_tt']);
    $title = 'Chi tiết đơn hàng ' . $order['ma_dh'];

    require_once PATH_VIEW . 'order-detail.php';
}

function orderUpdateClient($id, $id_tt)
{
    $order = showOne('tb_don_hang', $id);

    if (empty($order)) {
        echo "<script>alert('Đơn hàng không tồn tại')</script>";
        header('location: ' . BASE_URL . '?act=myOrder');
        exit();
    }

    if (empty($id_tt) || $id_tt != 6 && $id_tt != 7) {
        echo "<script>alert('Trạng thái không hợp lệ')</script>";
        header('location: ' . BASE_URL . '?act=myOrder');
        exit();
    }

    $orderData = [
        'id_tt' => $id_tt,
    ];

    update('tb_don_hang', $id, $orderData);
    if ($id_tt == 7) {
        $orderDetails = showAllDetailOrrder($id);
        foreach ($orderDetails as $orderDetail) {
            $product = showOne('tb_san_pham', $orderDetail['id_sp']);
            update('tb_san_pham', $orderDetail['id_sp'], ['so_luong' => $product['so_luong'] + $orderDetail['so_luong']]);
        }
    }

    header('location: ' . BASE_URL . '?act=myOrder');
}

function thanksIndex()
{
    if (!isset($_SESSION['cart'])) {
        header('location: ' . BASE_URL);
        exit();
    }

    if (
        !isset($_GET['vnp_ResponseCode'])
        && !isset($_GET['vnp_TransactionStatus'])
        && !isset($_GET['resultCode'])
        || isset($_GET['vnp_ResponseCode'])
        && $_GET['vnp_ResponseCode'] === '00'
        && isset($_GET['vnp_TransactionStatus'])
        && $_GET['vnp_TransactionStatus'] === '00'
        || isset($_GET['resultCode'])
        && $_GET['resultCode'] === '0'
    ) {
        $orderData = [
            'ma_dh' => $_GET['ma_dh'],
            'id_nd' => $_GET['id_nd'],
            'id_pttt' => $_GET['id_pttt'],
            'id_tt' => 3,
            'ma_km' => $_GET['ma_km'] ?? '',
            'tong_tien' => $_GET['tong_tien'],
            'ho_ten' => $_GET['ho_ten'],
            'email' => $_GET['email'],
            'so_dien_thoai' => $_GET['so_dien_thoai'],
            'dia_chi' => $_GET['dia_chi'],
            'ghi_chu' => $_GET['ghi_chu'] ?? '',
        ];
        createOrder($orderData);
        unset($_SESSION['cart']);
        unset($_SESSION['promotion']);
        require_once PATH_VIEW . 'thanks.php';
    } else {
        header('location: ' . BASE_URL . '?act=cart');
        exit();
    }
}

function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        )
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}
