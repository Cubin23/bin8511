<?php

function promotionIndex()
{
  $promotions = listAll('tb_khuyen_mai');
  require_once PATH_VIEW . 'promotion.php';
}
