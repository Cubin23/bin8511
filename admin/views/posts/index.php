<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

  <?php if (isset($_SESSION['success'])) { ?>
    <p class="alert alert-success"><?= $_SESSION['success'] ?></p>
  <?php } ?>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        <a href="<?= BASE_URL_ADMIN ?>?act=post-create">Thêm bài viết</a>
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Hình ảnh</th>
              <th>Tiêu đề bài viết</th>
              <th>Mô tả bài viết</th>
              <th>Người viết</th>
              <th>Email</th>
              <th>Ngày đăng</th>
              <th>Ngày sửa</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>STT</th>
              <th>Hình ảnh</th>
              <th>Tiêu đề bài viết</th>
              <th>Mô tả bài viết</th>
              <th>Người viết</th>
              <th>Email</th>
              <th>Ngày đăng</th>
              <th>Ngày sửa</th>
              <th>Hành động</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $stt = 1;
            foreach ($posts as $post) {
            ?>
              <tr>
                <td><?= $stt++ ?></td>
                <td>
                  <?php if ($post['p_hinh_anh']) { ?>
                    <img src="<?= BASE_URL . 'uploads/posts/' . $post['p_hinh_anh'] ?>" alt="<?= $post['p_tieu_de'] ?>" width="50">
                  <?php } ?>
                </td>
                <td><?= $post['p_tieu_de'] ?></td>
                <td><?= $post['p_mo_ta_bv'] ?></td>
                <td><?= $post['us_name'] ?></td>
                <td><?= $post['us_email'] ?></td>
                <td><?= $post['p_ngay_dang'] ?></td>
                <td><?= $post['p_ngay_sua'] ?></td>
                <td>
                  <a href="<?= BASE_URL_ADMIN . '?act=post-detail&id=' . $post['p_id'] ?>" class="btn btn-info">Xem</a>
                  <a href="<?= BASE_URL_ADMIN . '?act=post-update&id=' . $post['p_id'] ?>" class="btn btn-warning">Sửa</a>
                  <a href="<?= BASE_URL_ADMIN . '?act=post-delete&id=' . $post['p_id']  ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết <?= $post['p_tieu_de'] ?>')">Xóa</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>