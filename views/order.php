<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= BASE_URL ?>imgs/logo/images.png" />
    <title>Đặt hàng</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="css/aside.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/index.css" />
</head>

<body>
    <!-- Header -->
    <?php include(PATH_VIEW . '/layouts/header.php') ?>

    <main class="mb-5">
        <div class="container mt-4">
            <?php if (isset($_SESSION['error'])) {
                foreach ($_SESSION['error'] as $error) { ?>
                    <p class="alert alert-danger"><?= $error ?></p>
                <?php }
            }
            if (isset($_SESSION['success'])) { ?>
                <p class="alert alert-success"><?= $_SESSION['success'] ?></p>
            <?php } ?>
            <div class="row">
                <div class="col-md-8">
                    <h3 class="text-center mb-4">Thông tin sản phẩm</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Đoạn mã PHP để lặp qua sản phẩm trong giỏ hàng -->
                            <?php
                            $stt = 1;
                            $total = 0;
                            ?>
                            <?php foreach ($cartItems as $item) : ?>
                                <tr>
                                    <td><?= $stt++ ?></td>
                                    <td><img src="<?= BASE_URL . 'uploads/products/' . $item['product_image'] ?>" style="width: 100px;"></td>
                                    <td><?= $item['product_name'] ?></td>
                                    <td><?= number_format($item['product_price']) ?></td>
                                    <td><?= $item['quantity'] ?></td>
                                    <?php
                                    $subtotal = $item['product_price'] * $item['quantity'];
                                    $total += $subtotal;
                                    ?>
                                    <td><?= number_format($subtotal) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Mã khuyến mãi</span>
                            <input type="text" class="form-control" name="ma_km" aria-label="Username" aria-describedby="basic-addon1" required>
                            <button class="btn btn-success" type="submit">Áp dụng</button>
                        </div>
                    </form>
                    <div class="text-right">
                        <?php if (isset($_SESSION['promotion'])) {
                            $promotion = $_SESSION['promotion'];
                            $total = $total - $total * $promotion['giam_gia'] / 100;
                        ?>
                            <h4>Mã khuyến mãi: <span class="text-success"><?= $promotion['ma_km'] ?></span></h4>
                            <h4>Giảm giá: <span class="text-success"><?= $promotion['giam_gia'] ?>%</span></h4>
                        <?php
                        } ?>
                        <h4>Tổng tiền: <span class="text-danger fs-3"><?= number_format($total) ?> VNĐ</span></h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3 class="text-center mb-4">Thông tin người đặt hàng</h3>
                    <form action="<?= BASE_URL . '?act=addOrder' ?>" method="POST">
                        <div class="mb-3">
                            <label for="user_name" class="form-label">Họ và tên:</label>
                            <input type="text" class="form-control" id="user_name" name="ho_ten" value="<?= $_SESSION['user']['ho_ten'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_email" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="user_email" name="email" value="<?= $_SESSION['user']['email'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_phone" class="form-label">Số điện thoại:</label>
                            <input type="phone" class="form-control" id="user_phone" name="so_dien_thoai" value="<?= $_SESSION['user']['so_dien_thoai'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_address" class="form-label">Địa chỉ:</label>
                            <textarea class="form-control" id="user_address" name="dia_chi" required><?= $_SESSION['user']['dia_chi'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="user_address" class="form-label">Ghi chú:</label>
                            <textarea class="form-control" id="user_address" name="ghi_chu"></textarea>
                        </div>
                        <input type="text" name="total_bill" value="<?= $total ?>" hidden>
                        <button type="submit" name="addOrder" class="btn btn-primary mb-3">Thanh toán khi nhận hàng</button>
                        <button type="submit" name="vnpay" class="btn btn-primary mb-3">Thanh toán qua VnPay</button>
                        <button type="submit" name="payUrl" class="btn btn-primary mb-3">Thanh toán qua Momo</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include(PATH_VIEW . 'layouts/footer.php') ?>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>