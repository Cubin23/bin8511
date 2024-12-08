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
        <a href="<?= BASE_URL_ADMIN ?>?act=users">Quay trở lại</a>
      </h6>
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col">
            <div class="mb-3">
              <label for="email" class="form-label">Email:<span class="text-danger">*</span></label>
              <input type="email" class="form-control" id="email" name="email" autofocus required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Mật khẩu:<span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="password" name="mat_khau" required>
            </div>
            <div class="mb-3">
              <label for="full-name" class="form-label">Họ và tên:<span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="full-name" name="ho_ten" required>
            </div>
            <label class="form-label">Giới tính:<span class="text-danger">*</span></label>
            <div class="d-flex align-items-center gap-4 mb-3">
              <div class="form-check ps-4">
                <input class="form-check-input" type="radio" name="gioi_tinh" id="gioi_tinh1" value="male" checked>
                <label class="form-check-label" for="gioi_tinh1">
                  Nam
                </label>
              </div>
              <div class="form-check ps-4">
                <input class="form-check-input" type="radio" name="gioi_tinh" value="female" id="gioi_tinh2">
                <label class="form-check-label" for="gioi_tinh2">
                  Nữ
                </label>
              </div>
            </div>
            <div class="mb-3">
              <label for="dia_chi" class="form-label">Địa chỉ:<span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="dia_chi" name="dia_chi" required>
            </div>
            <div class="mb-3">
              <label class="form-label" for="date">Ngày sinh:<span class="text-danger">*</span></label>
              <input type="date" class="form-control" name="ngay_sinh" id="date" required>
            </div>
          </div>
          <div class="col">
            <div class="mb-3">
              <label class="form-label" for="phone-number">Số điện thoại:<span class="text-danger">*</span></label>
              <input type="number" class="form-control" name="so_dien_thoai" id="phone-number" required>
            </div>
            <label for="image" class="form-label">Ảnh đại diện:<span class="text-danger">*</span></label>
            <div class="mb-3 input-group">
              <input type="file" class="form-control" id="image" accept="image/*" onchange="loadFile(event)" name="avatar" required>
              <label class="input-group-text" for="image">Tải lên</label>
            </div>
            <div class="text-center">
              <img id="output" width="200px" height="200px" />
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-between mt-3">
          <div>
            <a href="<?= BASE_URL_ADMIN ?>?act=users" class=" btn btn-secondary">Quay trở lại</a>
            <button type="reset" class="btn btn-danger">Đặt lại</button>
          </div>
          <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
      </form>
    </div>
  </div>
</div>