<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tiêu đề</th>
              <th>Họ tên</th>
              <th>Ngày gửi</th>
              <th>Trạng thái</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>STT</th>
              <th>Tiêu đề</th>
              <th>Họ tên</th>
              <th>Ngày gửi</th>
              <th>Trạng thái</th>
              <th>Hành động</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($contacts as $contact) { ?>
              <tr>
                <td><?= $contact['id'] ?></td>
                <td><?= $contact['tieu_de'] ?></td>
                <td><?= $contact['ten_kh'] ?></td>
                <td><?= $contact['ngay_gui'] ?></td>
                <td>
                  <?php $status = showOne('tb_trang_thai', $contact['id_tt']); ?>
                  <h5><span class="badge badge-<?= $status['badge']  ?>"><?= $status['ten_tt'] ?></span></h5>
                </td>
                <td>
                  <a href="<?= BASE_URL_ADMIN . '?act=contact-detail&id=' . $contact['id'] ?>" class="btn btn-info">Xem</a>
                  <?php if ($status['id'] == 8) { ?>
                    <a href="<?= BASE_URL_ADMIN . '?act=contact-processed&id=' . $contact['id']  ?>" class="btn btn-success" onclick="return confirm('Bạn có chắc chắn đã xử lý liên hệ này')">Đánh dấu là đã xử lý</a>
                  <?php } else { ?>
                    <a href="<?= BASE_URL_ADMIN . '?act=contact-no-process&id=' . $contact['id']  ?>" class="btn btn-danger">Đánh dấu là chưa xử lý</a>
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