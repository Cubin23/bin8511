<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary d-flex justify-content-between">
        <a href="<?= BASE_URL_ADMIN ?>?act=contacts">Quay trở lại</a>

        <?php
        $status = showOne('tb_trang_thai', $contact['id_tt']);
        if ($status['id'] == 8) {
        ?>
          <a href="<?= BASE_URL_ADMIN . '?act=contact-processed&id=' . $contact['id']  ?>" class="btn btn-success" onclick="return confirm('Bạn có chắc chắn đã xử lý liên hệ này')">Đánh dấu là đã xử lý</a>
        <?php } else { ?>
          <a href="<?= BASE_URL_ADMIN . '?act=contact-no-process&id=' . $contact['id']  ?>" class="btn btn-danger">Đánh dấu là chưa xử lý</a>
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
          <tbody>
            <tr>
              <td>Tiêu đề</td>
              <td><?= $contact['tieu_de'] ?></td>
            </tr>
            <tr>

              <td>Họ tên</td>
              <td><?= $contact['ten_kh'] ?></td>
            </tr>
            <tr>
              <td>Ngày gửi</td>
              <td><?= $contact['ngay_gui'] ?></td>
            </tr>
            <tr>
              <td>Số điện thoại</td>
              <td><?= $contact['so_dien_thoai'] ?></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><?= $contact['email'] ?></td>
            </tr>
            <tr>
              <td>Địa chỉ</td>
              <td><?= $contact['dia_chi'] ?></td>
            </tr>
            <tr>
              <td>Nội dung</td>
              <td><?= $contact['noi_dung'] ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>