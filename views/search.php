<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="<?= BASE_URL ?>imgs/logo/images.png" />
  <title>Tìm kiếm</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/general.css" />
  <link rel="stylesheet" href="css/aside.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/index.css" />

  <script src="js/index.js"></script>
</head>

<body>
  <?php if (isset($_SESSION['error'])) {
    echo '<script>alert("' . $_SESSION['error'] . '")</script>';
    unset($_SESSION['error']);
  } ?>
  <!-- Header -->
  <?php include(PATH_VIEW . 'layouts/header.php') ?>

  <main>
    <div id="main-container">
      <aside>
        <?php include PATH_VIEW . 'layouts/aside.php' ?>
      </aside>
      <div id="main-content">
        <section style="min-height: 789px;">
          <div class="section-header">
            <h1 class="specific-section-header">
              Kết quả tìm kiếm
            </h1>
          </div>
          <div>
            <?php
            foreach ($products as $product) { ?>
              <div class="article">
                <a href="?act=product&id=<?= $product['id'] ?>">

                  <?php if ($product['gia_km']) { ?>
                    <span class="discount-span">-<?= ceil(100 - ($product['gia_km']) / ($product['gia_sp']) * 100) ?>%</span>
                  <?php } ?>

                  <img src="uploads/products/<?= getProductImage($product['id'])['hinh_anh'] ?>" />

                  <div class="article-brand">
                    <span class="label">Danh mục:</span>
                    <?php $category  = showOne('tb_danh_muc_sp', $product['id_dm']);
                    if (!empty($category['hinh_anh'])) { ?>
                      <img src="uploads/prCategories/<?= $category['hinh_anh'] ?>" />
                    <?php } ?>
                    <span><?= $category['ten_dm'] ?></span>
                  </div>

                  <span class="article-title">
                    <?= $product['ten_sp'] ?>
                  </span>

                  <?php if (!$product['gia_km']) { ?>
                    <span class="article-price"><?= number_format($product['gia_sp']) ?> VNĐ</span>
                  <?php } else { ?>
                    <span class="article-price"><?= number_format($product['gia_km']) ?> VNĐ
                      <span class="article-old-price"><?= number_format($product['gia_sp']) ?> VNĐ</span>
                    </span>
                  <?php } ?>

                  <div class="rating-container">
                    <span class="back-stars">☆☆☆☆☆</span>
                    <span class="front-stars" <?= 'style="width:' . getAverageRating($product['id']) * 100 / 5 . '%"' ?>>★★★★★</span>
                  </div>
                </a>
                <?php if ($product['so_luong'] > 0) {
                  $gia = $product['gia_km'] != 0 ? $product['gia_km'] : $product['gia_sp'];
                ?>
                  <a href="<?= BASE_URL .
                              '?act=addToCart&id_sp=' . $product['id'] .
                              '&product_name=' . $product['ten_sp'] .
                              '&product_image=' . getProductImage($product['id'])['hinh_anh'] .
                              '&product_price=' . $gia
                            ?>">
                    <button article_id="<?= $product['id'] ?>" class="article-add-to-cart-btn">
                      <span>Thêm vào giỏ hàng</span>
                      <img src="imgs/shopping-cart.png" />
                    </button>
                  </a>
                <?php } ?>
              </div>
            <?php } ?>
          </div>
        </section>
        <!-- cay canh special offer -->
        <section id="cay-special-offer" class="special-offer">
          <div class="special-offer-img">
            <img src="imgs/special_offers/cay_special_offer.png" alt="">
          </div>
          <div class="special-offer-text">
            <h1>Cay canh</h1>
            <p>
              With a plant that works like your eye.
            </p>
            <a href="#" class="styled-btn">
              ORDER NOW
            </a>
          </div>
        </section>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <?php include(PATH_VIEW . 'layouts/footer.php') ?>
</body>

</html>