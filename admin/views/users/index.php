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
        <a href="<?= BASE_URL_ADMIN ?>?act=user-create">Thêm người dùng</a>
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Ảnh đại diện</th>
              <th>Email</th>
              <th>Họ Tên</th>
              <th>Chức vụ</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>STT</th>
              <th>Ảnh đại diện</th>
              <th>Email</th>
              <th>Họ Tên</th>
              <th>Chức vụ</th>
              <th>Hành động</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $stt = 1;
            foreach ($users as $user) {
              $role = showOne('tb_chuc_vu', $user['id_cv']);
            ?>
              <tr>
                <td><?= $stt++ ?></td>
                <td>
                  <?php if ($user['avatar']) { ?>
                    <img src="<?= BASE_URL . 'uploads/users/' . $user['avatar'] ?>" alt="<?= $user['ho_ten'] ?>" width="50">
                  <?php } ?>
                </td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['ho_ten'] ?></td>
                <td>
                  <h5><span class="badge badge-<?= $role['id'] == 1 ? 'danger' : 'success' ?>"><?= $role['chuc_vu'] ?></span></h5>
                </td>
                <td>
                  <a href="<?= BASE_URL_ADMIN . '?act=user-detail&id=' . $user['id'] ?>" class="btn btn-info">Xem</a>
                  <?php if ($role['id'] != 1) { ?>
                    <a href="<?= BASE_URL_ADMIN . '?act=user-update&id=' . $user['id'] ?>" class="btn btn-warning">Sửa</a>
                    <a href="<?= BASE_URL_ADMIN . '?act=user-delete&id=' . $user['id']  ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng <?= $user['email'] ?>')">Xóa</a>
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