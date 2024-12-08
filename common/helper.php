<?php

// Khai báo các hàm dùng Global
if (!function_exists('require_file')) {
    function require_file($pathFolder)
    {
        $files = array_diff(scandir($pathFolder), ['.', '..']);

        foreach ($files as $file) {
            require_once $pathFolder . $file;
        }
    }
}

if (!function_exists('debug')) {
    function debug($data)
    {
        echo "<pre>";

        print_r($data);

        die;
    }
}

if (!function_exists('e404')) {
    function e404()
    {
        $view = '404';
        require_once PATH_VIEW_ADMIN . 'layouts/master.php';
        die;
    }
}

if (!function_exists('middleware_auth_check')) {
    function middleware_auth_check($act, $arrRouteNeedAuth)
    {
        if ($act == 'login') {
            if (!empty($_SESSION['user'])) {
                header('Location: ' . BASE_URL);
                exit();
            }
        } elseif (empty($_SESSION['user']) && in_array($act, $arrRouteNeedAuth)) {
            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }
    }
}

if (!function_exists('uploadImage')) {
    function uploadImage($file, $path)
    {
        $targetDir = PATH_UPLOADS . $path . '/';
        $targetFile = basename($file['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $newFileName = uniqid() . '.' . $imageFileType;
        $newTargetFile = $targetDir . $newFileName;

        move_uploaded_file($file['tmp_name'], $newTargetFile);
        return $newFileName;
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date)
    {
        return date('d/m/Y', strtotime($date));
    }
}

if (!function_exists('reArrayFiles')) {
    function reArrayFiles($file_post)
    {
        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }
}

function validateImage($file)
{
    $err = null;
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'webp');

    if ($file['size'] == 0) {
        $err = 'Hình ảnh không được để trống!';
    } elseif ($file['size'] > 5000000) {
        $err = 'Dung lượng hình ảnh quá lớn!';
    } else {
        $imageFileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($imageFileType, $allowTypes)) {
            $err = 'Hình ảnh không đúng định dạng!';
        }
    }
    return $err;
}
