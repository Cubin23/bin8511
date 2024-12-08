<?php
session_start();
// Require file trong commons
require_once '../common/env.php';
require_once '../common/helper.php';
require_once '../common/connect-db.php';
require_once '../common/model.php';


// Require file trong controllers và models
require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);
require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);


// Điều hướng
$act = $_GET['act'] ?? '/';

// Biến này cần khai báo được link cần đăng nhập mới vào được
$arrRouteNeedAuth = [
  '/',
  'roles', 'role-create', 'role-update', 'role-delete',
  'users', 'user-detail', 'user-create', 'user-update', 'user-delete',
  'prCategories', 'prCategory-create', 'prCategory-update', 'prCategory-delete',
  'posts', 'post-detail', 'post-create', 'post-update', 'post-delete',
  'contacts', 'contact-detail', 'contact-delete',
  'promotions', 'promotion-detail', 'promotion-create', 'promotion-update', 'promotion-delete',
  'orders', 'order-detail', 'order-update',
];

if ($_SESSION['user']['id_cv'] != 1 && in_array($act, $arrRouteNeedAuth)) {
  header('Location: ' . BASE_URL);
  exit();
}

// Kiểm tra xem admin đã đăng nhập chưa
middleware_auth_check($act, $arrRouteNeedAuth);

match ($act) {
  '/' => dashboard(),

  // Role
  'roles' => roleListAll(),
  'role-create' => roleCreate(),
  'role-update' => roleUpdate($_GET['id']),
  'role-delete' => roleDelete($_GET['id']),

  // User
  'users' => userListAll(),
  'user-detail' => userShowOne($_GET['id']),
  'user-create' => userCreate(),
  'user-update' => userUpdate($_GET['id']),
  'user-delete' => userDelete($_GET['id']),

  // Pr Category
  'prCategories' => prCategoryListAll(),
  'prCategory-create' => prCategoryCreate(),
  'prCategory-update' => prCategoryUpdate($_GET['id']),
  'prCategory-delete' => prCategoryDelete($_GET['id']),

  // Product
  'products' => productListAll(),
  'product-detail' => productShowOne($_GET['id']),
  'product-create' => productCreate(),
  'product-update' => productUpdate($_GET['id']),
  'product-delete' => productDelete($_GET['id']),

  // Post
  'posts' => postListAll(),
  'post-detail' => postShowOne($_GET['id']),
  'post-create' => postCreate(),
  'post-update' => postUpdate($_GET['id']),
  'post-delete' => postDelete($_GET['id']),

  // Contact
  'contacts' => contactListAll(),
  'contact-detail' => contactShowOne($_GET['id']),
  'contact-processed' => contactProcessed($_GET['id']),
  'contact-no-process' => contactNoProcess($_GET['id']),

  // Promotion
  'promotions' => promotionListAll(),
  'promotion-detail' => promotionDetail($_GET['id']),
  'promotion-create' => promotionCreate(),
  'promotion-update' => promotionUpdate($_GET['id']),
  'promotion-delete' => promotionDelete($_GET['id']),

  // Order
  'orders' => orderListAll(),
  'order-detail' => orderDetail($_GET['id']),
  'order-update' => orderUpdate($_GET['id']),

  // Authen
  'login' => authenShowFormLogin(),
  'logout' => authenLogout(),

  'get-sales' => getMoney($_GET['year'] ?? '', $_GET['month'] ?? '', $_GET['day'] ?? ''),

  default => e404(),
};

require_once '../common/disconnect-db.php';
