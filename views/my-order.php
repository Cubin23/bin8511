<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?= BASE_URL ?>imgs/logo/images.png" />
  <title>Đơn hàng của tôi</title>
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fontawesome-6-pro@6.4.0/css/all.min.css" integrity="sha256-R6pa/zpbhz9IjJIAXKP/0Kk53cRwfsjdik4Ojf9lOrQ=" crossorigin="anonymous">

  <!-- Custom fonts for this template-->
  <link href="<?= BASE_URL ?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= BASE_URL ?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="css/general.css" />
  <link rel="stylesheet" href="css/aside.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/index.css" />
</head>

<body>
  <!-- Header -->
  <?php include(PATH_VIEW . '/layouts/header.php') ?>

  <main class="mb-5 mt-3">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt</th>
                <th>Người nhận</th>
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
                <th>Người nhận</th>
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
                  <td><?= $order['ho_ten'] ?></td>
                  <td><?= number_format($order['tong_tien']) ?> VNĐ</td>
                  <td>
                    <h5><span class="badge badge-<?= $status['badge'] ?? 'secondary' ?>"><?= $status['ten_tt'] ?></span></h5>
                  </td>
                  <td>
                    <a href="<?= BASE_URL ?>?act=order-detail&id=<?= $order['id'] ?>" class="btn btn-info">Chi tiết</a>
                    <?php if ($order['id_tt'] == 3) { ?>
                      <a href="<?= BASE_URL ?>?act=order-update&id=<?= $order['id'] ?>&id_tt=7" class="btn btn-danger">Hủy</a>
                    <?php }
                    if ($order['id_tt'] == 5) { ?>
                      <a href="<?= BASE_URL ?>?act=order-update&id=<?= $order['id'] ?>&id_tt=6" class="btn btn-success">Đã nhận hàng</a>
                    <?php } ?>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <?php include(PATH_VIEW . 'layouts/footer.php') ?>

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= BASE_URL ?>assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= BASE_URL ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= BASE_URL ?>assets/admin/js/demo/datatables-demo.js"></script>
  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#dataTable2').DataTable();
    });
  </script>
</body>

</html>