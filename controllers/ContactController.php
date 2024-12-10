<?php

function showFormContact()
{
    if ($_POST) {
        contactSend();
    }

    require_once PATH_VIEW . 'contact.php';
    unset($_SESSION['error']);
    unset($_SESSION['success']);
}

function contactSend()
{
    $err = validateContact();

    if (!empty($err)) {
        $_SESSION['error'] = $err;
    } else {
        $data = [
            'ten_kh' => $_POST['ten_kh'],
            'email' => $_POST['email'],
            'so_dien_thoai' => $_POST['so_dien_thoai'],
            'dia_chi' => $_POST['dia_chi'],
            'tieu_de' => $_POST['tieu_de'],
            'noi_dung' => $_POST['noi_dung'],
        ];

        insert('tb_lien_he', $data);

        $_SESSION['success'] = 'Gửi thông tin thành công!';

        header('Location: ' . BASE_URL . '?act=contact');
        exit();
    }
}

function validateContact()
{
    $err = [];
    if (empty($_POST['tieu_de'])) {
        $err['tieu_de'] = 'Vui lòng nhập tiêu đề';
    }
    if (empty($_POST['ten_kh'])) {
        $err['ten_kh'] = 'Vui lòng nhập họ tên';
    }
    if (empty($_POST['email'])) {
        $err['email'] = 'Vui lòng nhập email';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $err['email'] = 'Email không hợp lệ';
    }
    if (empty($_POST['so_dien_thoai'])) {
        $err['so_dien_thoai'] = 'Vui bạn số điện thoại';
    } elseif (!preg_match('/^[0-9]{10,11}$/', $_POST['so_dien_thoai'])) {
        $err['so_dien_thoai'] = 'Số điện thoại không hợp lệ';
    }

    if (empty($_POST['noi_dung'])) {
        $err['noi_dung'] = 'Vui lòng nhập nội dung';
    }

    return $err;
}
