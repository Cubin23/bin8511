<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary d-flex justify-content-between">
        <a href="<?= BASE_URL_ADMIN ?>?act=products">Quay trở lại</a>
        <a href="<?= BASE_URL_ADMIN ?>?act=product-update&id=<?= $product['id'] ?>">Sửa thông tin</a>
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
              <td>Hình ảnh</td>
              <td>
                <?php if ($images) {
                  foreach ($images as $image) { ?>
                    <img class="me-2" src="<?= BASE_URL . 'uploads/products/' . $image['hinh_anh'] ?>" alt="<?= $product['ten_sp'] ?>" width="100">
                <?php }
                } ?>
              </td>
            </tr>
            <tr>
              <td>Tên sản phẩm</td>
              <td><?= $product['ten_sp'] ?></td>
            </tr>
            <tr>
              <td>Giá sản phẩm</td>
              <td><?= number_format($product['gia_sp']) ?> VNĐ</td>
            </tr>
            <?php if ($product['gia_km']) { ?>
              <tr>
                <td>Giá khuyến mãi</td>
                <td><?= number_format($product['gia_km']) ?> VNĐ</td>
              </tr>
            <?php } ?>
            <tr>
              <td>Danh mục</td>
              <td><?= showOne('tb_danh_muc_sp', $product['id_dm'])['ten_dm'] ?></td>
            </tr>
            <tr>
              <td>Mô tả</td>
              <td><?= $product['mo_ta'] ?></td>
            </tr>
            <tr>
              <td>Ngày nhập</td>
              <td><?= formatDate($product['ngay_nhap']) ?></td>
            </tr>
            <tr>
              <td>Số lượng</td>
              <td><?= $product['so_luong'] ?></td>
            </tr>
            <tr>
              <td>Trạng thái</td>
              <td>
                <?php $status = showOne('tb_trang_thai', $product['id_tt']); ?>
                <h5><span class="badge badge-<?= $status['id'] == '1' ? 'success' : 'danger' ?>"><?= $status['ten_tt'] ?></span></h5>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        Danh sách đánh giá
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Người dùng</th>
              <th>Số sao</th>
              <th>Nội dung</th>
              <th>Thời gian</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>STT</th>
              <th>Người dùng</th>
              <th>Số sao</th>
              <th>Nội dung</th>
              <th>Thời gian</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $stt = 1;
            foreach ($reviews as $review) {
            ?>
              <tr>
                <td><?= $stt++ ?></td>
                <td><?= showOne('tb_nguoi_dung', $review['id_nd'])['email'] ?></td>
                <td><?= $review['so_sao'] ?></td>
                <td><?= $review['danh_gia'] ?></td>
                <td><?= formatDate($review['ngay_dg']) ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        Danh sách bình luận
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Người dùng</th>
              <th>Nội dung</th>
              <th>Thời gian</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>STT</th>
              <th>Người dùng</th>
              <th>Nội dung</th>
              <th>Thời gian</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $stt = 1;
            foreach ($comments as $comment) {
            ?>
              <tr>
                <td><?= $stt++ ?></td>
                <td><?= showOne('tb_nguoi_dung', $comment['id_nd'])['email'] ?></td>
                <td><?= $comment['noi_dung'] ?></td>
                <td><?= formatDate($comment['thoi_gian']) ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>