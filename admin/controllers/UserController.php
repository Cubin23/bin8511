<?php

function userListAll()
{
  $title = 'Danh sách người dùng';
  $view = 'users/index';
  $styles = ['styles/datatable'];
  $scripts = ['scripts/datatable'];

  $users = listAll('tb_nguoi_dung');

  require_once PATH_VIEW_ADMIN . 'layouts/master.php';
  unset($_SESSION['success']);
}

function userShowOne($id)
{
  $user = showOne('tb_nguoi_dung', $id);
  if (empty($user)) {
    e404();
  }
  $title = $user['ho_ten'];
  $view = 'users/detail';
  $styles = ['styles/datatable'];
  $scripts = ['scripts/datatable'];
  require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userCreate()
{
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tableName = 'tb_nguoi_dung';

    $err = validateUser();

    if (!empty($err)) {
      $_SESSION['error'] = $err;
    } else {
      $data = [
        'email' => $_POST['email'],
        'mat_khau' => $_POST['mat_khau'],
        'ho_ten' => $_POST['ho_ten'],
        'gioi_tinh' => $_POST['gioi_tinh'],
        'dia_chi' => $_POST['dia_chi'],
        'ngay_sinh' => $_POST['ngay_sinh'],
        'so_dien_thoai' => $_POST['so_dien_thoai'],
        'id_cv' => 2,
        'avatar' => 'default.png',
      ];

      if ($_FILES['avatar']['size'] !== 0) {
        $data['avatar'] = uploadImage($_FILES['avatar'], 'users');
      }

      insert($tableName, $data);
      $_SESSION['success'] = 'Thêm người dùng thành công!';
      header('Location: ./?act=users');
      exit();
    }
  }

  $title = 'Thêm người dùng';
  $view = 'users/create';
  require_once PATH_VIEW_ADMIN . 'layouts/master.php';
  unset($_SESSION['error']);
}

function userUpdate($id)
{
  $tableName = 'tb_nguoi_dung';
  $user = showOne($tableName, $id);
  if (empty($user)) {
    e404();
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $err = validateUser();

    if (!empty($err)) {
      $_SESSION['error'] = $err;
    } else {
      $data = [
        'email' => $_POST['email'],
        'mat_khau' => $_POST['mat_khau'],
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

      update($tableName, $id, $data);
      $_SESSION['success'] = 'Cập nhật người dùng thành công!';
      header('Location: ./?act=users');
      exit();
    }
  }

  $title = 'Cập nhật người dùng';
  $view = 'users/update';
  require_once PATH_VIEW_ADMIN . 'layouts/master.php';
  unset($_SESSION['error']);
}

function userDelete($id)
{
  $tableName = 'tb_nguoi_dung';
  $user = showOne($tableName, $id);

  if (empty($user)) {
    e404();
  }

  if ($user['avatar'] && file_exists(PATH_UPLOADS . 'users/' . $user['avatar']) && $user['avatar'] !== 'default.png') {
    unlink(PATH_UPLOADS . 'users/' . $user['avatar']);
  }

  delete($tableName, $id);
  $_SESSION['success'] = 'Xóa người dùng thành công!';
  header('Location: ./?act=users');
}

function validateUser($password = true)
{
  $err = [];

  if (empty($_POST['email'])) {
    $err[] = 'Vui lòng nhập email.';
  } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $err[] = 'Email không hợp lệ.';
  } elseif (getUserClientByEmail($_POST['email']) && isset($_POST['create'])) {
    $err[] = 'Email đã tồn tại.';
  }

  if ($password) {
    if (empty($_POST['mat_khau'])) {
      $err[] = 'Vui lòng nhập mật khẩu.';
    } elseif (strlen($_POST['mat_khau']) < 8) {
      $err[] = 'Mật khẩu phải có ít nhất 8 ký tự.';
    } elseif ($_POST['mat_khau'] !== $_POST['password_conf'] && isset($_POST['create'])) {
      $err[] = 'Mật khẩu không khớp.';
    }
  }

  if (empty($_POST['ho_ten'])) {
    $err[] = 'Vui lòng nhập họ tên.';
  }

  if (empty($_POST['dia_chi'])) {
    $err[] = 'Vui lòng nhập địa chỉ.';
  }

  if (empty($_POST['ngay_sinh'])) {
    $err[] = 'Vui lòng chọn ngày sinh.';
  } elseif (strtotime($_POST['ngay_sinh']) > strtotime(date('Y-m-d'))) {
    $err[] = 'Ngày sinh không hợp lệ.';
  }

  if (empty($_POST['so_dien_thoai'])) {
    $err[] = 'Vui lòng nhập số điện thoại.';
  } elseif (!preg_match('/^0[0-9]{9}$/', $_POST['so_dien_thoai'])) {
    $err[] = 'Số điện thoại không hợp lệ.';
  }

  if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] !== 0) {
    $error = validateImage($_FILES['avatar']);
    if ($error) {
      $err[] = $error;
    }
  }

  return $err;
}
