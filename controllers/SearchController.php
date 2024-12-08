<?php

function searchIndex()
{
  $products = listAll('tb_san_pham');

  $categories = listAll('tb_danh_muc_sp');

  if (isset($_GET["search"])) {
    $category_id = isset($_GET["category_id"]) ? $_GET["category_id"] : null;

    $product_name = isset($_GET["product_name"]) ? $_GET["product_name"] : null;

    $price_min = isset($_GET["price_min"]) ? $_GET["price_min"] : null;

    $price_max = isset($_GET["price_max"]) ? $_GET["price_max"] : null;

    $products = getSearchProduct($category_id, $product_name, $price_min, $price_max);
  }

  require_once PATH_VIEW . 'search.php';
}
