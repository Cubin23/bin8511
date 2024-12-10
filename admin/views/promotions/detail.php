<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary d-flex justify-content-between">
        <a href="<?= BASE_URL_ADMIN ?>?act=promotions">Quay trở lại</a>
        <a href="<?= BASE_URL_ADMIN ?>?act=promotion-update&id=<?= $promotion['id'] ?>">Sửa khuyến mãi</a>
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
              <td>Tên khuyến mãi</td>
              <td><?= $promotion['ten_km'] ?></td>
            </tr>
            <tr>
              <td>Mã khuyến mãi</td>
              <td><?= $promotion['ma_km'] ?></td>
            </tr>
            <tr>
              <td>Giảm giá</td>
              <td><?= $promotion['giam_gia'] ?>%</td>
            </tr>
            <tr>
              <td>Ngày bắt đầu</td>
              <td><?= formatDate($promotion['ngay_bat_dau']) ?></td>
            </tr>
            <tr>
              <td>Ngày kết thúc</td>
              <td><?= formatDate($promotion['ngay_ket_thuc']) ?></td>
            </tr>
            <tr>
              <td>Mô tả</td>
              <td><?= $promotion['mo_ta'] ?></td>
            </tr>
            <tr>
              <td>Trạng thái</td>
              <td>
                <h5><?= getStatusPromotion($promotion['id']) ?></h5>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>