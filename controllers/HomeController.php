<?php

function homeIndex()
{
    $products = listAll('tb_san_pham');
    $categories = listAll('tb_danh_muc_sp');
    $posts = listAll('tb_bai_viet');
    require_once PATH_VIEW . 'home.php';
}
