<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

  <?php if (isset($_SESSION['error'])) {
    foreach ($_SESSION['error'] as $error) { ?>
      <p class="alert alert-danger"><?= $error ?></p>
  <?php }
  } ?>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        <a href="<?= BASE_URL_ADMIN ?>?act=orders">Quay trở lại</a>
      </h6>
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md">

            <div class="mb-3">
              <label class="form-label" for="trang_thai">Trạng thái:<span class="text-danger">*</span></label>
              <select class="form-select" id="trang_thai" name="id_tt" required>
                <?php $status = showOne('tb_trang_thai', $order['id_tt']); ?>
                <option value="<?= $status['id'] ?>" selected hidden><?= $status['ten_tt'] ?></option>
                <?php
                $statuses = array_reverse(listAll('tb_trang_thai'));
                for ($i = $status['id']; $i < 5; $i++) {
                ?>
                  <option value="<?= $statuses[$i]['id'] ?>"><?= $statuses[$i]['ten_tt'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>


          <div class="d-flex justify-content-between mt-3">
            <a href="./?act=orders" class="btn btn-secondary">Quay trở lại</a>
            <button type="submit" class="btn btn-primary">Lưu</button>
          </div>
      </form>
    </div>
  </div>
</div>