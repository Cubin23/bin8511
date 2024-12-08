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
        <a href="<?= BASE_URL_ADMIN ?>?act=role-create">Thêm chức vụ</a>
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên chức vụ</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>STT</th>
              <th>Tên chức vụ</th>
              <th>Hành động</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $stt = 1;
            foreach ($roles as $role) {
            ?>
              <tr>
                <td><?= $stt++ ?></td>
                <td><?= $role['chuc_vu'] ?></td>
                <td>
                  <?php if ($role['id'] != 1 && $role['id'] != 2) { ?>
                    <a href="<?= BASE_URL_ADMIN . '?act=role-update&id=' . $role['id'] ?>" class="btn btn-warning">Sửa</a>
                    <a href="<?= BASE_URL_ADMIN . '?act=role-delete&id=' . $role['id']  ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa chức vụ <?= $role['chuc_vu'] ?>')">Xóa</a>
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