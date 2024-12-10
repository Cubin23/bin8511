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

  <main class="mb-5 mt-3 container">
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

      <?php if (isset($_SESSION['success'])) { ?>
        <p class="alert alert-success"><?= $_SESSION['success'] ?></p>
      <?php } ?>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary d-flex justify-content-between">
            <a href="<?= BASE_URL ?>?act=myOrder">Quay trở lại</a>
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
                  <td>Mã đơn hàng</td>
                  <td><?= $order['ma_dh'] ?></td>
                </tr>
                <tr>
                  <td>Ngày đặt</td>
                  <td><?= $order['ngay_dat'] ?></td>
                </tr>
                <tr>
                  <td>Tên người đặt</td>
                  <td><?= $order['ho_ten'] ?></td>
                </tr>
                <tr>
                  <td>Email người đặt</td>
                  <td><?= $order['email'] ?></td>
                </tr>
                <tr>
                  <td>Số điện thoại người đặt</td>
                  <td><?= $order['so_dien_thoai'] ?></td>
                </tr>
                <tr>
                  <td>Địa chỉ người đặt</td>
                  <td><?= $order['dia_chi'] ?></td>
                </tr>
                <tr>
                  <td>Phương thức thanh toán</td>
                  <td><?= getPaymentMethod($order['id_pttt']) ?></td>
                </tr>
                <tr>
                  <td>Ghi chú</td>
                  <td><?= $order['ghi_chu'] ?></td>
                </tr>
                <tr>
                  <td>Trạng thái</td>
                  <td>
                    <h5><span class="badge badge-<?= $status['badge'] ?? 'secondary' ?>"><?= $status['ten_tt'] ?></span></h5>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary d-flex justify-content-between">
            Chi tiết giỏ hàng
          </h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Hình ảnh</th>
                  <th>Tên sản phẩm</th>
                  <th>Số lượng</th>
                  <th>Thành tiền</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>STT</th>
                  <th>Hình ảnh</th>
                  <th>Tên sản phẩm</th>
                  <th>Số lượng</th>
                  <th>Thành tiền</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                $stt = 1;
                $tongTien = 0;
                foreach ($orderDetails as $orderDetail) {
                  $product = showOne('tb_san_pham', $orderDetail['id_sp']);
                ?>
                  <tr>

                    <td><?= $stt++ ?></td>
                    <td>
                      <?php if (getProductImage($product['id'])) { ?>
                        <img src="<?= BASE_URL . 'uploads/products/' . getProductImage($product['id'])['hinh_anh'] ?>" alt="<?= $product['ten_sp'] ?>" width="50">
                      <?php } ?>
                    </td>
                    <td><a href="<?= BASE_URL . '?act=product&id=' . $product['id'] ?>" class="text-decoration-underline text-primary"><?= $product['ten_sp'] ?></a></td>
                    <td><?= $orderDetail['so_luong'] ?></td>
                    <td><?= number_format($orderDetail['gia'] * $orderDetail['so_luong']) ?> VNĐ</td>
                    <td>
                      <?php if (
                        checkBoughtProduct($product['id'])
                      ) { ?>
                        <a class="btn btn-success" href="<?= BASE_URL . '?act=product&id=' . $product['id'] ?>">Đánh giá</a>
                      <?php } ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="card shadow">
        <div class="card-body">
          <?php
          if (!empty($order['ma_km'])) {
            $promotion = checkPromotionCode($order['ma_km']);
            $gia_goc = $order['tong_tien'] * 100 / (100 - $promotion['giam_gia']);
            $giam_gia = $gia_goc - $order['tong_tien'];
          ?>
            <h5 class="d-flex justify-content-between align-items-center">
              <span>Giá gốc:</span>
              <span class="text-success fw-bold"><?= number_format($gia_goc) ?> VNĐ</span>
            </h5>
            <h6 class="d-flex justify-content-between align-items-center">
              <span>Giảm giá:</span>
              <span class="text-success fw-bold">-<?= number_format($giam_gia) ?> VNĐ</span>
            </h6>
          <?php } ?>
          <h5 class="d-flex justify-content-between align-items-center">
            <span>Tổng tiền:</span>
            <span class="text-danger fw-bold"><?= number_format($order['tong_tien']) ?> VNĐ</span>
          </h5>
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