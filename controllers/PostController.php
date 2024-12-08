<?php

function postIndex($id)
{
  $post = showOneForPostClient($id);

  require_once PATH_VIEW . 'posts/detail.php';
}

function postList()
{
  $posts = listAll('tb_bai_viet');

  require_once PATH_VIEW . 'posts/index.php';
}