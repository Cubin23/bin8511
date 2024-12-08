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
        <a href="<?= BASE_URL_ADMIN ?>?act=prCategory-create">Thêm danh mục</a>
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Hình ảnh</th>
              <th>Tên danh mục</th>
              <th>Số lượng sản phẩm</th>
              <th>Mô tả</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>STT</th>
              <th>Hình ảnh</th>
              <th>Tên danh mục</th>
              <th>Số lượng sản phẩm</th>
              <th>Mô tả</th>
              <th>Hành động</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $stt = 1;
            foreach ($prCategories as $prCategory) {
              $quantity = count(getProductsByCategory($prCategory['id']));
            ?>
              <tr>
                <td><?= $stt++ ?></td>
                <td>
                  <?php if ($prCategory['hinh_anh']) { ?>
                    <img src="<?= BASE_URL . 'uploads/prCategories/' . $prCategory['hinh_anh'] ?>" alt="<?= $prCategory['ten_dm'] ?>" width="50">
                  <?php } ?>
                </td>
                <td><?= $prCategory['ten_dm'] ?></td>
                <td><?= $quantity ?></td>
                <td><?= $prCategory['mo_ta'] ?></td>
                <td>
                  <a href="<?= BASE_URL_ADMIN . '?act=prCategory-update&id=' . $prCategory['id'] ?>" class="btn btn-warning">Sửa</a>
                  <?php if ($quantity == 0) { ?>
                    <a href="<?= BASE_URL_ADMIN . '?act=prCategory-delete&id=' . $prCategory['id']  ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục <?= $prCategory['ten_dm'] ?>')">Xóa</a>
                  <?php } ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>