<?php

function checkPromotionCode($code)
{
  try {
    $sql = "SELECT * FROM tb_khuyen_mai WHERE ma_km = :ma_km LIMIT 1";

    $stmt = $GLOBALS['conn']->prepare($sql);

    $stmt->bindParam(':ma_km', $code);

    $stmt->execute();

    return $stmt->fetch();
  } catch (\Exception $e) {
    debug($e);
  }
}
