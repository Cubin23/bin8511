<?php

function productListAll()
{
  $title = 'Danh sách sản phẩm';
  $view = 'products/index';
  $styles = ['styles/datatable'];
  $scripts = ['scripts/datatable'];

  $products = listAll('tb_san_pham');

  require_once PATH_VIEW_ADMIN . 'layouts/master.php';
  unset($_SESSION['success']);
}

function productShowOne($id)
{
  $product = showOne('tb_san_pham', $id);

  if (empty($product)) {
    e404();
  }
  $comments = getCommentsByProductId($id);
  $reviews = getReviewsByProductId($id);
  $images = getProductImages($id);
  $title = $product['ten_sp'];
  $view = 'products/detail';
  $styles = ['styles/datatable'];
  $scripts = ['scripts/datatable'];
  require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function productCreate()
{
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tableName = 'tb_san_pham';

    $err = validateProduct(true);

    if (!empty($err)) {
      $_SESSION['error'] = $err;
    } else {
      $data = [
        'ten_sp' => $_POST['ten_sp'],
        'mo_ta' => $_POST['mo_ta'],
        'id_dm' => $_POST['id_dm'],
        'gia_sp' => $_POST['gia_sp'],
        'gia_km' => $_POST['gia_km'],
        'ngay_nhap' => $_POST['ngay_nhap'],
        'so_luong' => $_POST['so_luong'],
        'id_tt' => $_POST['id_tt'],
      ];

      $id_sp = insert_get_last_id($tableName, $data);
      $_SESSION['success'] = 'Thêm sản phẩm thành công!';

      uploadMultipleProductImages($_FILES['hinh_anh'], $id_sp);

      header('Location: ./?act=products');
      exit();
    }
  }

  $title = 'Thêm sản phẩm';
  $view = 'products/create';
  require_once PATH_VIEW_ADMIN . 'layouts/master.php';
  unset($_SESSION['error']);
}

function productUpdate($id)
{
  $tableName = 'tb_san_pham';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $err = validateProduct();

    if (!empty($err)) {
      $_SESSION['error'] = $err;
    } else {
      $data = [
        'ten_sp' => $_POST['ten_sp'],
        'mo_ta' => $_POST['mo_ta'],
        'id_dm' => $_POST['id_dm'],
        'gia_sp' => $_POST['gia_sp'],
        'gia_km' => $_POST['gia_km'],
        'ngay_nhap' => $_POST['ngay_nhap'],
        'so_luong' => $_POST['so_luong'],
        'id_tt' => $_POST['id_tt'],
      ];

      update($tableName, $id, $data);
      $_SESSION['success'] = 'Cập nhật sản phẩm thành công!';
      if (isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['name'][0] !== '') {
        $images = getProductImages($id);
        foreach ($images as $image) {
          if ($image['hinh_anh'] && file_exists(PATH_UPLOADS . 'products/' . $image['hinh_anh'])) {
            unlink(PATH_UPLOADS . 'products/' . $image['hinh_anh']);
          }
        }
        deleteImageProduct($id);
        uploadMultipleProductImages($_FILES['hinh_anh'], $id);
      }
      header('Location: ./?act=products');
      exit();
    }
  }

  $product = showOne($tableName, $id);

  if (empty($product)) {
    e404();
  }

  $title = 'Cập nhật sản phẩm';
  $view = 'products/update';
  require_once PATH_VIEW_ADMIN . 'layouts/master.php';
  unset($_SESSION['error']);
}

function productDelete($id)
{
  $tableName = 'tb_san_pham';
  $product = showOne($tableName, $id);
  if (empty($product)) {
    e404();
  }
  delete($tableName, $id);
  $_SESSION['success'] = 'Xóa sản phẩm thành công!';

  $images = getProductImages($id);
  foreach ($images as $image) {
    if ($image['hinh_anh'] && file_exists(PATH_UPLOADS . 'products/' . $image['hinh_anh'])) {
      unlink(PATH_UPLOADS . 'products/' . $image['hinh_anh']);
    }
  }

  deleteImageProduct($id);
  header('Location: ./?act=products');
}


function uploadMultipleProductImages($files, $id_sp)
{
  $files = reArrayFiles($files);
  foreach ($files as $file) {
    $result = uploadImage($file, 'products');

    $data = [
      'id_sp' => $id_sp,
      'hinh_anh' => $result,
    ];
    insert('tb_hinh_anh_sp', $data);
  }
}

function validateProduct($checkImage = false)
{
  $err = [];
  if (empty($_POST['ten_sp'])) {
    $err[] = 'Tên sản phẩm không được để trống!';
  }

  if (empty($_POST['gia_sp'])) {
    $err[] = 'Giá sản phẩm không được để trống!';
  }

  if ($_POST['gia_km'] > $_POST['gia_sp']) {
    $err[] = 'Giá khuyến mãi không hợp lệ!';
  }

  if (empty($_POST['so_luong'])) {
    $err[] = 'Số lượng không được để trống!';
  } else if ($_POST['so_luong'] < 0) {
    $err[] = 'Số lượng không hợp lệ!';
  }

  if (empty($_POST['id_dm'])) {
    $err[] = 'Danh mục không được để trống!';
  }

  if (empty($_POST['id_tt'])) {
    $err[] = 'Trạng thái không được để trống!';
  }

  if (empty($_POST['ngay_nhap'])) {
    $err[] = 'Ngày nhập không được để trống!';
  } else if ($_POST['ngay_nhap'] > date('Y-m-d')) {
    $err[] = 'Ngày nhập không hợp lệ!';
  }

  if ($checkImage) {
    $images = reArrayFiles($_FILES['hinh_anh']);
    foreach ($images as $image) {
      $error = validateImage($image);
      if (!empty($error)) {
        $err[] = $error;
        break;
      }
    }
  }
  return $err;
}
