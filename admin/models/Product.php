<?php

if (!function_exists('getProductsByCategory')) {
  function getProductsByCategory($id_dm)
  {
    try {
      $sql = "SELECT * FROM tb_san_pham WHERE id_dm = :id_dm ORDER BY id DESC";

      $stmt = $GLOBALS['conn']->prepare($sql);

      $stmt->bindParam(':id_dm', $id_dm);

      $stmt->execute();

      return $stmt->fetchAll();
    } catch (\Exception $e) {
      debug($e);
    }
  }
}

function getProductImage($id_sp)
{
  try {
    $sql = "SELECT * FROM tb_hinh_anh_sp WHERE id_sp = :id_sp ORDER BY id LIMIT 1";

    $stmt = $GLOBALS['conn']->prepare($sql);

    $stmt->bindParam(':id_sp', $id_sp);

    $stmt->execute();

    return $stmt->fetch();
  } catch (\Exception $e) {
    debug($e);
  }
}

function getProductImages($id_sp)
{
  try {
    $sql = "SELECT * FROM tb_hinh_anh_sp WHERE id_sp = :id_sp ORDER BY id";

    $stmt = $GLOBALS['conn']->prepare($sql);

    $stmt->bindParam(':id_sp', $id_sp);

    $stmt->execute();

    return $stmt->fetchAll();
  } catch (\Exception $e) {
    debug($e);
  }
}

function deleteImageProduct($id)
{
  try {
    $sql = "DELETE FROM tb_hinh_anh_sp WHERE id_sp = :id";

    $stmt = $GLOBALS['conn']->prepare($sql);

    $stmt->bindParam(':id', $id);

    $stmt->execute();
  } catch (\Exception $e) {
    debug($e);
  }
}
