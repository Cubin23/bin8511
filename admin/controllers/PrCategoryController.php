<?php

function prCategoryListAll()
{
  $title = 'Danh sách danh mục sản phẩm';
  $view = 'prCategories/index';
  $styles = ['styles/datatable'];
  $scripts = ['scripts/datatable'];

  $prCategories = listAll('tb_danh_muc_sp');

  require_once PATH_VIEW_ADMIN . 'layouts/master.php';
  unset($_SESSION['success']);
}

function prCategoryCreate()
{
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tableName = 'tb_danh_muc_sp';

    $data = [
      'ten_dm' => $_POST['ten_dm'],
      'mo_ta' => $_POST['mo_ta'],
    ];

    $err = validatePrCategory();

    if (!empty($err)) {
      $_SESSION['error'] = $err;
    } else {
      if ($_FILES['hinh_anh']['size'] != 0) {
        $data['hinh_anh'] = uploadImage($_FILES['hinh_anh'], 'prCategories');
      }
      insert($tableName, $data);
      $_SESSION['success'] = 'Thêm danh mục sản phẩm thành công!';
      header('Location: ./?act=prCategories');
      exit();
    }
  }

  $title = 'Thêm danh mục sản phẩm';
  $view = 'prCategories/create';
  require_once PATH_VIEW_ADMIN . 'layouts/master.php';
  unset($_SESSION['error']);
}

function prCategoryUpdate($id)
{
  $tableName = 'tb_danh_muc_sp';
  $prCategory = showOne($tableName, $id);
  if (empty($prCategory)) {
    e404();
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = [
      'ten_dm' => $_POST['ten_dm'],
      'mo_ta' => $_POST['mo_ta'],
    ];

    $err = validatePrCategory();

    if (!empty($err)) {
      $_SESSION['error'] = $err;
    } else {
      if ($_FILES['hinh_anh']['size'] != 0) {
        $data['hinh_anh'] = uploadImage($_FILES['hinh_anh'], 'prCategories');
        if ($prCategory['hinh_anh'] && file_exists(PATH_UPLOADS . 'prCategories/' . $prCategory['hinh_anh'])) {
          unlink(PATH_UPLOADS . 'prCategories/' . $prCategory['hinh_anh']);
        }
      }
      update($tableName, $id, $data);
      $_SESSION['success'] = 'Cập nhật danh mục sản phẩm thành công!';
      header('Location: ./?act=prCategories');
      exit();
    }
  }


  $title = 'Cập nhật danh mục sản phẩm';
  $view = 'prCategories/update';
  require_once PATH_VIEW_ADMIN . 'layouts/master.php';
  unset($_SESSION['error']);
}

function prCategoryDelete($id)
{
  if (count(getProductsByCategory($id)) > 0) {
    echo "<script>alert('Không thể xóa danh mục sản phẩm này!'); window.location='?act=prCategories';</script>";
    exit();
  }

  $tableName = 'tb_danh_muc_sp';


  $prCategory = showOne($tableName, $id);

  if (empty($prCategory)) {
    e404();
  }

  delete($tableName, $id);

  if ($prCategory['hinh_anh'] && file_exists(PATH_UPLOADS . 'prCategories/' . $prCategory['hinh_anh'])) {
    unlink(PATH_UPLOADS . 'prCategories/' . $prCategory['hinh_anh']);
  }

  $_SESSION['success'] = 'Xóa danh mục sản phẩm thành công!';

  header('Location: ./?act=prCategories');
}

function validatePrCategory()
{
  $err = [];
  if (empty($_POST['ten_dm'])) {
    $err[] = 'Tên danh mục không được để trống!';
  }

  if ($_FILES['hinh_anh']['size'] !== 0) {
    $error = validateImage($_FILES['hinh_anh']);
    if ($error) {
      $err[] = $error;
    }
  }

  return $err;
}
