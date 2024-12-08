<?php

function accountIndex()
{
  $user = showOne('tb_nguoi_dung', $_SESSION['user']['id']);

  if (isset($_POST['change_info'])) {
    $err = validateUser(false);

    if (!empty($err)) {
      $_SESSION['error'] = $err;
    } else {
      $data = [
        'email' => $_POST['email'],
        'ho_ten' => $_POST['ho_ten'],
        'gioi_tinh' => $_POST['gioi_tinh'],
        'dia_chi' => $_POST['dia_chi'],
        'ngay_sinh' => $_POST['ngay_sinh'],
        'so_dien_thoai' => $_POST['so_dien_thoai'],
      ];

      if ($_FILES['avatar']['size'] !== 0) {
        $data['avatar'] = uploadImage($_FILES['avatar'], 'users');
        if ($user['avatar'] && file_exists(PATH_UPLOADS . 'users/' . $user['avatar']) && $user['avatar'] !== 'default.png') {
          unlink(PATH_UPLOADS . 'users/' . $user['avatar']);
        }
      }

      update('tb_nguoi_dung', $user['id'], $data);
      $_SESSION['success'] = 'Cập nhật người dùng thành công!';
      $user = showOne('tb_nguoi_dung', $_SESSION['user']['id']);
      $_SESSION['user'] = $user;
    }
  }

  if (isset($_POST['change_password'])) {
    $old_password = $_POST['old_password'];
    $password = $_POST['password'];
    $password_conf = $_POST['password_conf'];

    if (empty($password)) {
      $_SESSION['error'][] = 'Vui lòng nhập mật khẩu mới';
    } else if ($password != $password_conf) {
      $_SESSION['error'][] = 'Mật khẩu xác nhận không khớp';
    }

    if ($old_password !== $user['mat_khau']) {
      $_SESSION['error'][] = 'Mật khẩu cũ không đúng';
    }

    if (!isset($_SESSION['error'])) {
      update('tb_nguoi_dung', $user['id'], ['mat_khau' => $password]);
      $_SESSION['success'] = 'Cập nhật mật khẩu thành công!';
      $_SESSION['user'] = showOne('tb_nguoi_dung', $_SESSION['user']['id']);
    }
  }

  require_once PATH_VIEW . 'account.php';
  unset($_SESSION['error']);
  unset($_SESSION['success']);
}
