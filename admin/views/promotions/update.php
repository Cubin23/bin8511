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
        <a href="<?= BASE_URL_ADMIN ?>?act=promotions">Quay trở lại</a>
      </h6>
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col">
            <div class="mb-3">
              <label for="ten_km" class="form-label">Tên khuyến mại:<span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="ten_km" name="ten_km" required value="<?= $promotion['ten_km'] ?>">
            </div>
            <div class="mb-3">
              <label class="form-label" for="start">Ngày bắt đầu:<span class="text-danger">*</span></label>
              <input type="date" class="form-control" name="ngay_bat_dau" id="start" required value="<?= $promotion['ngay_bat_dau'] ?>">
            </div>
            <div class="mb-3">
              <label class="form-label" for="end">Ngày kết thúc:<span class="text-danger">*</span></label>
              <input type="date" class="form-control" name="ngay_ket_thuc" id="end" required value="<?= $promotion['ngay_ket_thuc'] ?>">
            </div>
          </div>
          <div class="col">
            <div class="mb-3">
              <label for="giam_gia" class="form-label">Giảm giá(%):<span class="text-danger">*</span></label>
              <input type="number" class="form-control" id="giam_gia" name="giam_gia" required value="<?= $promotion['giam_gia'] ?>">
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Mô tả:</label>
              <textarea type="text" class="form-control" id="description" name="mo_ta" rows="4"><?= $promotion['mo_ta'] ?></textarea>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-between mt-3">
          <a href="<?= BASE_URL_ADMIN ?>?act=promotions" class=" btn btn-secondary">Quay trở lại</a>
          <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
      </form>
    </div>
  </div>
</div>