<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary d-flex justify-content-between">
        <a href="<?= BASE_URL_ADMIN ?>?act=posts">Quay trở lại</a>
        <a href="<?= BASE_URL_ADMIN ?>?act=post-update&id=<?= $post['p_id'] ?>">Sửa thông tin</a>
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Trường dữ liệu</th>
              <th>Dữ liệu</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Ảnh bài viết</td>
              <td>
                <?php if ($post['p_hinh_anh']) { ?>
                  <img src="<?= BASE_URL ?>uploads/posts/<?= $post['p_hinh_anh'] ?>" alt="<?= $post['p_tieu_de'] ?>" width="100">
                <?php } ?>
              </td>
            </tr>
            <tr>
              <td>Tiêu đề bài viết</td>
              <td><?= $post['p_tieu_de'] ?></td>
            </tr>
            <tr>
              <td>Mô tả bài viết</td>
              <td><?= $post['p_mo_ta_bv'] ?></td>
            </tr>
            <tr>
              <td>Người viết</td>
              <td><?= $post['us_name'] ?></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><?= $post['us_name'] ?></td>
            </tr>
            <tr>
              <td>Ngày đăng</td>
              <td><?= $post['p_ngay_dang'] ?></td>
            </tr>
            <tr>
              <td>Ngày sửa</td>
              <td><?= $post['p_ngay_sua'] ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="card">
    <p><?= $post['p_noi_dung'] ?></p>
  </div>
</div>