<?php

function showAllDetailOrrder($id)
{
  try {
    $sql = "SELECT * FROM tb_chi_tiet_dh WHERE id_dh = :id_dh";

    $stmt = $GLOBALS['conn']->prepare($sql);

    $stmt->bindParam(':id_dh', $id);

    $stmt->execute();

    return $stmt->fetchAll();
  } catch (\Exception $e) {
    debug($e);
  }
}
