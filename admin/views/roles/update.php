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
        <a href="<?= BASE_URL_ADMIN ?>?act=roles">Quay trở lại</a>
      </h6>
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="role" class="form-label">Tên chức vụ:<span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="role" name="chuc_vu" required value="<?= $role['chuc_vu'] ?>">
        </div>
        <div class="d-flex justify-content-between mt-3">
          <a href="<?= BASE_URL_ADMIN ?>?act=roles" class=" btn btn-secondary">Quay trở lại</a>
          <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
      </form>
    </div>
  </div>
</div>