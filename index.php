<?php
session_start();
// Require file trong commons
require_once './common/env.php';
require_once './common/helper.php';
require_once './common/connect-db.php';
require_once './common/model.php';

// Require file trong controllers và models
require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);
require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);

// Điều hướng
$act = $_GET['act'] ?? '/';

// Biến này cần khai báo được link cần đăng nhập mới vào được
$arrRouteNeedAuth = [
    'cart',
    'addToCart',
    'remoteCartItem',
    'remoteCart',
    'order',
    'addOrder',
    'updateQuantity',
];

// Kiểm tra xem user đã đăng nhập chưa
middleware_auth_check($act, $arrRouteNeedAuth);

match ($act) {
    '/' => homeIndex(),
    'cart' => cartIndex(),
    'addToCart' => addToCart(),
    'remoteCartItem' => remoteCartItem(),
    'remoteCart' => remoteAllCart(),
    'order' => orderIndex(),
    'addOrder' => addOrder(),
    'updateQuantity' => updateQuantity(),

    // Authen
    'login' => authenShowFormLogin(),
    'signup' => authenShowFormSignup(),
    'logout' => authenLogout(),

    //Products
    'product' => productIndex($_GET['id']),

    // Posts
    'post' => postIndex($_GET['id']),
    'posts-index' => postList(),

    // Search
    'search' => searchIndex(),

    // Contact
    'contact' => showFormContact(),

    'account' => accountIndex(),

    'myOrder' => myOrderIndex(),

    'order-detail' => orderDetailIndex($_GET['id']),

    'promotion' => promotionIndex(),

    'order-update' => orderUpdateClient($_GET['id'], $_GET['id_tt']),

    'thanks' => thanksIndex(),
};

require_once './common/disconnect-db.php';
