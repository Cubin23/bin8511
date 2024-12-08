<?php

function productIndex($id)
{
  $product = showOne('tb_san_pham', $id);
  $images = getProductImages($id);
  $comments = getCommentsByProductId($id);
  $reviews = getReviewsByProductId($id);

  if (isset($_POST['comment'])) {
    createComment($id);
  }

  if (isset($_POST['review'])) {
    createReview($id);
  }

  require_once PATH_VIEW . 'products/detail.php';
}

function createComment($id)
{
  $data = [
    'id_sp' => $id,
    'id_nd' => $_SESSION['user']['id'],
    'noi_dung' => $_POST['noi_dung'],
  ];
  insert('tb_binh_luan', $data);
  header("Refresh:0");
}

function createReview($id)
{
  $data = [
    'id_sp' => $id,
    'id_nd' => $_SESSION['user']['id'],
    'danh_gia' => $_POST['danh_gia'],
    'so_sao' => $_POST['so_sao'],
  ];
  insert('tb_danh_gia', $data);
  header("Refresh:0");
}

function getAverageRating($id)
{
  $reviews = getReviewsByProductId($id);
  $total = 0;
  foreach ($reviews as $review) {
    $total += $review['so_sao'];
  }
  return count($reviews) > 0 ? $total / count($reviews) : 0;
}

function checkBoughtProduct($id)
{
  $orders = getOrderByUserId($_SESSION['user']['id']);
  $count = 0;

  foreach ($orders as $order) {
    if ($order['id_tt'] == 6) {
      $orderDetails = getOrderDetailsByOrderId($order['id']);
      foreach ($orderDetails as $orderDetail) {
        if ($orderDetail['id_sp'] == $id) {
          $count++;
        }
      }
    }
  }

  if (count(getReviewsByProductIdAndUserId($id, $_SESSION['user']['id'])) < $count) {
    return true;
  }

  return false;
}
