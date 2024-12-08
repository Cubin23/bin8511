<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

  <?php if (isset($_SESSION['success'])) { ?>
    <p class="alert alert-success"><?= $_SESSION['success'] ?></p>
  <?php } ?>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Mã đơn hàng</th>
              <th>Ngày đặt</th>
              <th>Người đặt</th>
              <th>Tổng tiền</th>
              <th>Trạng thái</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>STT</th>
              <th>Mã đơn hàng</th>
              <th>Ngày đặt</th>
              <th>Người đặt</th>
              <th>Tổng tiền</th>
              <th>Trạng thái</th>
              <th>Hành động</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $stt = 1;
            foreach ($orders as $order) {
              $status = showOne('tb_trang_thai', $order['id_tt']);
            ?>
              <tr>
                <td><?= $stt++ ?></td>
                <td><?= $order['ma_dh'] ?></td>
                <td><?= $order['ngay_dat'] ?></td>
                <td><?= showOne('tb_nguoi_dung', $order['id_nd'])['email'] ?></td>
                <td><?= number_format($order['tong_tien']) ?> VNĐ</td>
                <td>
                  <h5><span class="badge badge-<?= $status['badge'] ?? 'secondary' ?>"><?= $status['ten_tt'] ?></span></h5>
                </td>
                <td>
                  <a href="<?= BASE_URL_ADMIN ?>?act=order-detail&id=<?= $order['id'] ?>" class="btn btn-info">Chi tiết</a>
                  <?php if ($order['id_tt'] != 6 && $order['id_tt'] != 7) { ?>
                    <a href="<?= BASE_URL_ADMIN ?>?act=order-update&id=<?= $order['id'] ?>" class="btn btn-warning">Cập nhật trạng thái</a>
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