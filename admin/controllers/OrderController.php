<?php

function orderListAll()
{
  $title = 'Danh sách đơn hàng';
  $view = 'orders/index';
  $styles = ['styles/datatable'];
  $scripts = ['scripts/datatable'];

  $orders = listAll('tb_don_hang');

  require_once PATH_VIEW_ADMIN . 'layouts/master.php';
  unset($_SESSION['success']);
}

function orderDetail($id)
{
  $order = showOne('tb_don_hang', $id);

  if (empty($order)) {
    e404();
  }

  $orderDetails = showAllDetailOrrder($id);
  $status = showOne('tb_trang_thai', $order['id_tt']);

  $title = 'Chi tiết đơn hàng ' . $order['ma_dh'];
  $view = 'orders/detail';
  $styles = ['styles/datatable'];
  $scripts = ['scripts/datatable'];

  require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function getPaymentMethod($id)
{
  $paymentMethod = showOne('tb_phuong_thuc_thanh_toan', $id);
  return $paymentMethod['ten_pttt'];
}

function getgetSalesBy($id)
{
  $getSalesBy = 0;
  $orderDetails = showAllDetailOrrder($id);
  foreach ($orderDetails as $orderDetail) {
    $price = showOne('tb_san_pham', $orderDetail['id_sp'])['gia_sp'];
    $getSalesBy += $orderDetail['so_luong'] * $price;
  }
  return number_format($getSalesBy);
}

function orderUpdate($id)
{
  $order = showOne('tb_don_hang', $id);

  if (empty($order)) {
    e404();
  }

  $title = 'Cập nhật trạng thái đơn hàng ' . $order['ma_dh'];
  $view = 'orders/update';
  $styles = [];
  $scripts = [];

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;
    $data['id_tt'] = $_POST['id_tt'];

    if ($data['id_tt'] < $order['id_tt']) {
      $_SESSION['error'] = 'Trạng thái không hợp lệ, cập nhật thất bại';
    }

    update('tb_don_hang', $id, $data);
    $_SESSION['success'] = 'Cập nhật trạng thái đơn hàng thành công';
    header('Location: ' . BASE_URL_ADMIN . '?act=orders');
    exit();
  }


  require_once PATH_VIEW_ADMIN . 'layouts/master.php';
  unset($_SESSION['error']);
}
