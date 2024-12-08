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
        <a href="<?= BASE_URL_ADMIN ?>?act=product-create">Thêm sản phẩm</a>
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
              <th>Giá gốc</th>
              <th>Giá khuyến mãi</th>
              <th>Danh mục</th>
              <th>Ngày nhập</th>
              <th>Số lượng</th>
              <th>Trạng thái</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>STT</th>
              <th>Hình ảnh</th>
              <th>Tên sản phẩm</th>
              <th>Giá gốc</th>
              <th>Giá khuyến mãi</th>
              <th>Danh mục</th>
              <th>Ngày nhập</th>
              <th>Số lượng</th>
              <th>Trạng thái</th>
              <th>Hành động</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $stt = 1;
            foreach ($products as $product) {
            ?>
              <tr>
                <td><?= $stt++ ?></td>
                <td>
                  <?php if (getProductImage($product['id'])) { ?>
                    <img src="<?= BASE_URL . 'uploads/products/' . getProductImage($product['id'])['hinh_anh'] ?>" alt="<?= $product['ten_sp'] ?>" width="50">
                  <?php } ?>
                </td>
                <td><?= $product['ten_sp'] ?></td>
                <td><?= number_format($product['gia_sp']) ?> VNĐ</td>
                <td><?= $product['gia_km'] != 0 ? number_format($product['gia_km']) . 'VNĐ' : '' ?></td>
                <td><?= showOne('tb_danh_muc_sp', $product['id_dm'])['ten_dm'] ?></td>
                <td><?= $product['ngay_nhap'] ?></td>
                <td><?= $product['so_luong'] ?></td>
                <td>
                  <?php $status = showOne('tb_trang_thai', $product['id_tt']); ?>
                  <h5><span class="badge badge-<?= $status['id'] == '1' ? 'success' : 'danger' ?>"><?= $status['ten_tt'] ?></span></h5>
                </td>
                <td>
                  <a href="<?= BASE_URL_ADMIN . '?act=product-detail&id=' . $product['id'] ?>" class="btn btn-info">Xem</a>
                  <a href="<?= BASE_URL_ADMIN . '?act=product-update&id=' . $product['id'] ?>" class="btn btn-warning">Sửa</a>
                  <a href="<?= BASE_URL_ADMIN . '?act=product-delete&id=' . $product['id']  ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm <?= $product['ten_sp'] ?>')">Xóa</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>