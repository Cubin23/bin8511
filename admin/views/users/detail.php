<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary d-flex justify-content-between">
        <a href="<?= BASE_URL_ADMIN ?>?act=users">Quay trở lại</a>
        <?php if (showOne('tb_chuc_vu', $user['id_cv'])['id'] != 1) { ?>
          <a href="<?= BASE_URL_ADMIN ?>?act=user-update&id=<?= $user['id'] ?>">Sửa thông tin</a>
        <?php } ?>
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
          <tfoot>
            <tr>
              <th>Trường dữ liệu</th>
              <th>Dữ liệu</th>
            </tr>
          </tfoot>
          <tbody>
            <tr>
              <td>Ảnh đại diện</td>
              <td>
                <?php if ($user['avatar']) { ?>
                  <img src="<?= BASE_URL . 'uploads/users/' . $user['avatar'] ?>" alt="<?= $user['ho_ten'] ?>" width="100">
                <?php } ?>
              </td>
            </tr>
            <tr>
              <td>Email</td>
              <td><?= $user['email'] ?></td>
            </tr>
            <tr>
              <td>Họ tên</td>
              <td><?= $user['ho_ten'] ?></td>
            </tr>
            <tr>
            <tr>
              <td>Chức vụ</td>
              <td><?= ucfirst(showOne('tb_chuc_vu', $user['id_cv'])['chuc_vu']) ?></td>
            </tr>
            <td>Giới tính</td>
            <td><?= $user['gioi_tinh'] == 'male' ? 'Nam' : 'Nữ' ?></td>
            </tr>
            <tr>
              <td>Ngày sinh</td>
              <td><?= formatDate($user['ngay_sinh']) ?></td>
            </tr>
            <tr>
              <td>Địa chỉ</td>
              <td><?= $user['dia_chi'] ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>