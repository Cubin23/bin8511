<?php

function promotionListAll()
{
  $title = 'Danh sách khuyến mãi';
  $view = 'promotions/index';
  $styles = ['styles/datatable'];
  $scripts = ['scripts/datatable'];

  $promotions = listAll('tb_khuyen_mai');

  require_once PATH_VIEW_ADMIN . 'layouts/master.php';
  unset($_SESSION['success']);
}

function promotionDetail($id)
{
  $promotion = showOne('tb_khuyen_mai', $id);

  if (empty($promotion)) {
    e404();
  }

  $title = $promotion['ten_km'];
  $view = 'promotions/detail';
  require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validatePromotion()
{
  $err = [];

  if (empty($_POST['ten_km'])) {
    $err['ten_km'] = 'Vui lòng nhập tên khuyến mãi';
  }

  if (empty($_POST['giam_gia'])) {
    $err['giam_gia'] = 'Vui lòng nhập giảm giá';
  } else if ($_POST['giam_gia'] < 1 || $_POST['giam_gia'] > 100) {
    $err['giam_gia'] = 'Giảm giá phải từ 1% đến 100%';
  }

  if (empty($_POST['ngay_bat_dau'])) {
    $err['ngay_bat_dau'] = 'Vui lòng nhập ngày bắt đầu';
  }

  if (empty($_POST['ngay_ket_thuc'])) {
    $err['ngay_ket_thuc'] = 'Vui lòng nhập ngày kết thúc';
  } else if (strtotime($_POST['ngay_ket_thuc']) < strtotime(date('Y-m-d'))) {
    $err['ngay_ket_thuc'] = 'Ngày kết thúc không hợp lệ';
  } else if (strtotime($_POST['ngay_ket_thuc']) < strtotime($_POST['ngay_bat_dau'])) {
    $err['ngay_ket_thuc'] = 'Ngày kết thúc phải lớn hơn ngày bắt đầu';
  }

  return $err;
}

function generatePromoCode($length = 8)
{
  $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  $charLength = strlen($characters);
  $promoCode = '';

  for ($i = 0; $i < $length; $i++) {
    $promoCode .= $characters[rand(0, $charLength - 1)];
  }

  if (checkPromotionCode($promoCode)) {
    return generatePromoCode($length);
  }

  return $promoCode;
}

function promotionCreate()
{
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tableName = 'tb_khuyen_mai';

    $err = validatePromotion();

    if (!empty($err)) {
      $_SESSION['error'] = $err;
    } else {
      $data = [
        'ten_km' => $_POST['ten_km'],
        'ma_km' => generatePromoCode(),
        'giam_gia' => $_POST['giam_gia'],
        'mo_ta' => $_POST['mo_ta'],
        'ngay_bat_dau' => $_POST['ngay_bat_dau'],
        'ngay_ket_thuc' => $_POST['ngay_ket_thuc'],
      ];
      insert($tableName, $data);
      $_SESSION['success'] = 'Thêm khuyến mãi thành công!';
      header('Location: ./?act=promotions');
      exit();
    }
  }

  $title = 'Thêm khuyến mãi';
  $view = 'promotions/create';
  require_once PATH_VIEW_ADMIN . 'layouts/master.php';
  unset($_SESSION['error']);
}

function promotionUpdate($id)
{
  $tableName = 'tb_khuyen_mai';

  $promotion = showOne($tableName, $id);

  if (empty($promotion)) {
    e404();
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $err = validatePromotion();

    if (!empty($err)) {
      $_SESSION['error'] = $err;
    } else {
      $data = [
        'ten_km' => $_POST['ten_km'],
        'mo_ta' => $_POST['mo_ta'],
        'giam_gia' => $_POST['giam_gia'],
        'ngay_bat_dau' => $_POST['ngay_bat_dau'],
        'ngay_ket_thuc' => $_POST['ngay_ket_thuc'],
      ];
      update($tableName, $id, $data);
      $_SESSION['success'] = 'Cập nhật khuyến mãi thành công!';
      header('Location: ./?act=promotions');
      exit();
    }
  }

  $title = 'Cập nhật khuyến mãi';
  $view = 'promotions/update';
  require_once PATH_VIEW_ADMIN . 'layouts/master.php';
  unset($_SESSION['error']);
}

function promotionDelete($id)
{
  $tableName = 'tb_khuyen_mai';
  delete($tableName, $id);
  $_SESSION['success'] = 'Xóa khuyến mãi thành công!';
  header('Location: ./?act=promotions');
}

function getStatusPromotion($id)
{
  $promotion = showOne('tb_khuyen_mai', $id);

  if ($promotion['ngay_bat_dau'] > date('Y-m-d')) {
    return '<span class="badge badge-secondary">Chưa bắt đầu</span>';
  } else if ($promotion['ngay_ket_thuc'] < date('Y-m-d')) {
    return '<span class="badge badge-danger">Đã kết thúc</span>';
  } else {
    return '<span class="badge badge-success">Đang diễn ra</span>';
  }
}
