<?php

function authenShowFormLogin()
{
    if ($_POST) {
        authenLogin();
    }

    require_once PATH_VIEW . 'authen/login.php';
    unset($_SESSION['error']);
    unset($_SESSION['success']);
}


function authenLogin()
{
    $user = getUserClientByEmailAndPassword($_POST['email'], $_POST['password']);

    if (empty($user)) {
        $_SESSION['error'][] = 'Email hoặc password chưa đúng!';

        header('Location: ' . BASE_URL . '?act=login');
        exit();
    }

    $_SESSION['user'] = $user;
    header('Location: ' . BASE_URL);
    exit();
}

function authenShowFormSignup()
{
    if ($_POST) {
        authenSignup();
    }

    require_once PATH_VIEW . 'authen/signup.php';
    unset($_SESSION['error']);
    unset($_SESSION['success']);
}

function authenSignup()
{
    $err = validateUser();

    if (!empty($err)) {
        $_SESSION['error'] = $err;
    } else {
        $data = [
            'ho_ten' => $_POST['ho_ten'],
            'email' => $_POST['email'],
            'mat_khau' => $_POST['mat_khau'],
            'dia_chi' => $_POST['dia_chi'],
            'gioi_tinh' => 'male',
            'so_dien_thoai' => $_POST['so_dien_thoai'],
            'ngay_sinh' => $_POST['ngay_sinh'],
            'id_cv' => 2,
            'avatar' => 'default.png',
        ];

        if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] !== 0) {
            $data['avatar'] = uploadImage($_FILES['avatar'], 'users');
        }

        insert('tb_nguoi_dung', $data);

        $_SESSION['success'] = 'Đăng ký thành công!';

        header('Location: ' . BASE_URL . '?act=login');
        exit();
    }
}

function authenLogout()
{
    if (!empty($_SESSION['user'])) {
        session_destroy();
    }

    header('Location: ' . BASE_URL);
    exit();
}
