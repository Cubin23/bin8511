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
        <a href="<?= BASE_URL_ADMIN ?>?act=promotion-create">Thêm khuyến mãi</a>
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên khuyến mãi</th>
              <th>Mã khuyến mãi</th>
              <th>Giảm giá</th>
              <th>Ngày bắt đầu</th>
              <th>Ngày kết thúc</th>
              <th>Trạng thái</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>STT</th>
              <th>Tên khuyến mãi</th>
              <th>Mã khuyến mãi</th>
              <th>Giảm giá</th>
              <th>Ngày bắt đầu</th>
              <th>Ngày kết thúc</th>
              <th>Trạng thái</th>
              <th>Hành động</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $stt = 1;
            foreach ($promotions as $promotion) {
            ?>
              <tr>
                <td><?= $stt++ ?></td>
                <td><?= $promotion['ten_km'] ?></td>
                <td><?= $promotion['ma_km'] ?></td>
                <td><?= $promotion['giam_gia'] ?>%</td>
                <td><?= $promotion['ngay_bat_dau'] ?></td>
                <td><?= $promotion['ngay_ket_thuc'] ?></td>
                <td>
                  <h5><?= getStatusPromotion($promotion['id']) ?></h5>
                </td>

                <td>
                  <a href="<?= BASE_URL_ADMIN . '?act=promotion-detail&id=' . $promotion['id'] ?>" class="btn btn-info">Xem</a>
                  <a href="<?= BASE_URL_ADMIN . '?act=promotion-update&id=' . $promotion['id'] ?>" class="btn btn-warning">Sửa</a>
                  <a href="<?= BASE_URL_ADMIN . '?act=promotion-delete&id=' . $promotion['id']  ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa khuyến mãi này')">Xóa</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>