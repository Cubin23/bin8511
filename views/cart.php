<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= BASE_URL ?>imgs/logo/images.png" />
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="css/aside.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/index.css" />

    <script src="js/index.js"></script>
    <script defer src="js/big_slideshow.js"></script>
</head>

<body>
    <!-- Header -->
    <?php include(PATH_VIEW . '/layouts/header.php') ?>

    <main>
        <div class="container mt-4 mb-5">
            <h2>Giỏ hàng của bạn</h2>
            <?php if (isset($_SESSION['error'])) { ?>
                <p class="alert alert-danger"><?= $_SESSION['error'] ?></p>
            <?php unset($_SESSION['error']);
            } ?>

            <?php if (!empty($cartItems)) { ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                            <th scope="col">Thao tác</th>
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
                                <td><a href="<?= BASE_URL . '?act=product&id=' . $item['id'] ?>" class="text-decoration-underline text-primary"><?= $item['product_name'] ?></a></td>
                                <td><?= number_format($item['product_price']) ?></td>
                                <td>
                                    <a class="btn btn-light" href="<?= BASE_URL . '?act=updateQuantity&change=-1&id_sp=' . $item['id'] ?>" role="button">-</a>
                                    <?= $item['quantity'] ?>
                                    <a class="btn btn-light" href="<?= BASE_URL . '?act=updateQuantity&change=1&id_sp=' . $item['id'] ?>" role="button">+</a>
                                </td>
                                <?php
                                $subtotal = $item['product_price'] * $item['quantity'];
                                $total += $subtotal;
                                ?>
                                <td><?= number_format($subtotal) ?></td>
                                <td>
                                    <!-- Đường dẫn để xóa sản phẩm khỏi giỏ hàng -->
                                    <a href="<?= BASE_URL . '?act=remoteCartItem&id_sp=' . $item['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="d-flex align-items-center justify-content-between">
                    <div class="">
                        <!-- Đường dẫn để xóa toàn bộ sản phẩm khỏi giỏ hàng -->
                        <a href="<?= BASE_URL . '?act=remoteCart' ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả sản phẩm trong giỏ hàng không?')">Xóa giỏ hàng</a>
                    </div>
                    <div class="">
                        <h4>Tổng tiền: <span class="text-danger fs-3"><?= number_format($total) ?> VNĐ</span></h4>
                    </div>
                    <div class="">
                        <a href="<?= BASE_URL . '?act=order' ?>" class="btn btn-primary">Thanh toán</a>
                    </div>
                </div>

            <?php } else { ?>
                <div class="alert alert-dark">
                    Bạn chưa có sản phẩm nào trong giỏ hàng!
                </div>
            <?php } ?>
        </div>
    </main>

    <!-- Footer -->
    <?php include(PATH_VIEW . 'layouts/footer.php') ?>
</body>

</html>