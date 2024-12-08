<?php

function postListAll()
{
    $title = 'Danh sách bài viết';
    $view = 'posts/index';
    $styles = ['styles/datatable'];
    $scripts = ['scripts/datatable'];

    $posts = listAllForPost();

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    unset($_SESSION['success']);
}

function postShowOne($id)
{
    $post = showOneForPost($id);

    if (empty($post)) {
        e404();
    }

    $title = $post['p_tieu_de'];
    $view = 'posts/detail';
    $styles = ['styles/datatable'];
    $scripts = ['scripts/datatable'];

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function postCreate()
{
    $users = listAll('tb_nguoi_dung');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $posts = 'tb_bai_viet';

        $err = validatePost(true);

        if (!empty($err)) {
            $_SESSION['error'] = $err;
        } else {
            $data = [
                'id_nd' => $_SESSION['user']['id'],
                'tieu_de' => $_POST['tieu_de'],
                'mo_ta_bv' => $_POST['mo_ta_bv'],
                'noi_dung' => $_POST['noi_dung'],
                'ngay_dang' => date('Y-m-d H:i:s'),
                'hinh_anh' => uploadImage($_FILES['hinh_anh'], 'posts')
            ];
            insert($posts, $data);
            $_SESSION['success'] = 'Thêm bài viết thành công!';
            header('Location: ./?act=posts');
            exit();
        }
    }

    $title = 'Tạo bài viết';
    $view = 'posts/create';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    unset($_SESSION['error']);
}

function postUpdate($id)
{
    $tableName = 'tb_bai_viet';
    $post = showOne($tableName, $id);
    if (empty($post)) {
        e404();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $err = validatePost();

        if (!empty($err)) {
            $_SESSION['error'] = $err;
        } else {
            $data = [
                'tieu_de' => $_POST['tieu_de'],
                'mo_ta_bv' => $_POST['mo_ta_bv'],
                'noi_dung' => $_POST['noi_dung'],
                'ngay_sua' => date('Y-m-d H:i:s'),
            ];

            if ($_FILES['hinh_anh']['size'] !== 0) {
                $imgThumbnail = uploadImage($_FILES['hinh_anh'], 'posts');
                $data['hinh_anh'] = $imgThumbnail;
                if ($post['hinh_anh'] && file_exists(PATH_UPLOADS . 'posts/' . $post['hinh_anh'])) {
                    unlink(PATH_UPLOADS . 'posts/' . $post['hinh_anh']);
                }
            }

            update($tableName, $id, $data);
            $_SESSION['success'] = 'Cập nhật bài viết thành công!';
            header('Location: ./?act=posts');
            exit();
        }
    }



    $title = 'Cập nhật bài viết';
    $view = 'posts/update';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    unset($_SESSION['error']);
}

function postDelete($id)
{
    $post = showOne('tb_bai_viet', $id);

    if (empty($post)) {
        e404();
    }

    delete('tb_bai_viet', $id);

    if ($post['hinh_anh'] && file_exists(PATH_UPLOADS . 'posts/' . $post['hinh_anh'])) {
        unlink(PATH_UPLOADS . 'posts/' . $post['hinh_anh']);
    }

    $_SESSION['success'] = 'Xóa thành công bài viết';

    header('Location: ' . BASE_URL_ADMIN . '?act=posts');
    exit();
}

function validatePost($checkImage = false)
{
    $err = [];

    if (empty($_POST['tieu_de'])) {
        $err[] = 'Vui lòng nhập tiêu đề';
    }

    if (empty($_POST['noi_dung'])) {
        $err[] = 'Vui lòng nhập nội dung';
    }

    if (strlen($_POST['mo_ta_bv']) > 255) {
        $err[] = 'Mô tả bài viết phải ít hơn 255 ký tự';
    }

    if ($checkImage) {
        $error = validateImage($_FILES['hinh_anh']);
        if ($error) {
            $err[] = $error;
        }
    }

    return $err;
}
