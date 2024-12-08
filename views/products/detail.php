<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="<?= BASE_URL ?>imgs/logo/images.png" />
  <title><?= $product['ten_sp'] ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/general.css" />
  <link rel="stylesheet" href="css/article.css" />
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/aside.css">
  <link rel="stylesheet" href="css/footer.css">

  <script defer src="js/article.js"></script>
</head>

<body>
  <!-- Header -->
  <?php include(PATH_VIEW . 'layouts/header.php') ?>

  <div id="main-container">
    <aside>
      <?php include PATH_VIEW . 'layouts/aside.php'; ?>
    </aside>
    <main>
      <section id="main-section">
        <div id="slideshow-container">
          <div id="slideshow-image-container">
            <img onclick="openZoomModal(event)" src="uploads/products/<?= $images[0]['hinh_anh'] ?>" alt="article image" />
          </div>

          <div id="slideshow-buttons-container">
            <label onclick="slideshowChangeImage(event);">
              <img class="slideshow-img" id="active-slideshow-button" src="uploads/products/<?= $images[0]['hinh_anh'] ?>" alt="error" />
            </label>

            <?php for ($i = 1; $i < count($images); $i++) : ?>
              <label onclick="slideshowChangeImage(event);">
                <img class="slideshow-img" src="uploads/products/<?= $images[$i]['hinh_anh']  ?>" />
              </label>
            <?php endfor ?>
          </div>
        </div>

        <div id="buy-container">
          <h1 id="article-title">
            <?= $product['ten_sp'] ?>
          </h1>

          <div class="buy-field" id="article-brand">
            <span class="label">Danh mục:</span>
            <?php $category  = showOne('tb_danh_muc_sp', $product['id_dm']);
            if (!empty($category['hinh_anh'])) { ?>
              <img src="uploads/prCategories/<?= $category['hinh_anh'] ?>" />
            <?php } ?>
            <span><?= $category['ten_dm'] ?></span>
          </div>

          <?php if ($product['gia_km']) : ?>
            <div class="buy-field">
              <span class="label">Giảm giá:</span>
              <span id="on-discount-per-span">
                -<?= ceil(100 - ($product['gia_km']) / ($product['gia_sp']) * 100) ?>%
              </span>
            </div>
          <?php endif ?>

          <div class="buy-field" id="article-price">
            <span class="label">Giá:</span>

            <?php if ($product['gia_km']) { ?>
              <span><?= number_format($product['gia_km']) ?> VNĐ</span>
              <span id="old-price"><?= number_format($product['gia_sp']) ?> VNĐ</span>
            <?php } else {  ?>
              <span><?= number_format($product['gia_sp']) ?> VNĐ</span>
            <?php } ?>
          </div>

          <div class="buy-field" id="article-stock-<?= ($product['so_luong'] ? 'yes' : 'no') ?>">
            <span class="label">
              <?=
              $product['so_luong']
                ? "Còn {$product['so_luong']}  sản phẩm"
                : 'Hết hàng'
              ?>
            </span>
          </div>

          <div class="buy-field" id="article-rating">
            <span class="label">Đánh giá:</span>
            <div class="article-rating-container">
              <span class="article-back-stars">☆☆☆☆☆</span>
              <span class="article-front-stars" style="width:<?= getAverageRating($product['id']) * 100 / 5 ?>%">★★★★★</span>
            </div>
          </div>
          <?php if ($product['so_luong'] > 0) {
            $gia = $product['gia_km'] != 0 ? $product['gia_km'] : $product['gia_sp'];
          ?>
            <form method="get">
              <div>
                <input type="text" name="act" value="addToCart" hidden>
                <input type="text" name="id_sp" value="<?= $product['id'] ?>" hidden>
                <input type="text" name="product_name" value="<?= $product['ten_sp'] ?>" hidden>
                <input type="text" name="product_image" value="<?= getProductImage($product['id'])['hinh_anh'] ?>" hidden>
                <input type="text" name="product_price" value="<?= $gia ?>" hidden>
                <div class=" buy-field">
                  <span class="label">Số lượng:</span>
                  <input type="number" name="quantity" id="add-to-cart-input" value="1" min="1" max="<?= $product['so_luong'] ?>">
                </div>

                <button article_id="<?= $product['id'] ?>" id="add-to-cart-button" <?= $product['so_luong'] ? '' : 'disabled' ?>>
                  <img src="imgs/shopping-cart.png" />
                  <span>Thêm vào giỏ hàng</span>
                </button>
              </div>
            </form>
          <?php } ?>
        </div>
      </section>

      <section class="detail-section">
        <h2>Mô tả</h2>
        <p>
          <?= $product['mo_ta'] ?>
        </p>
      </section>

      <section class="detail-section">
        <section class="detail-section">
          <h2>Đánh giá</h2>
          <!-- users reviews -->
          <div class="reviews-container">
            <?php if (!empty($reviews)) : ?>
              <?php foreach ($reviews as $review) : ?>
                <?php $user = showOne('tb_nguoi_dung', $review['id_nd']) ?>
                <div class="review">
                  <div class="review-row">
                    <img class="review-avatar" src="<?= BASE_URL . 'uploads/users/' . $user['avatar'] ?>" alt="avatar">
                    <h3 class="review-name">
                      <?= $user['ho_ten'] ?>
                    </h3>
                    <div class="rating-container">
                      <span class="back-stars">☆☆☆☆☆</span>
                      <span class="front-stars" style="
										width:<?= $review['so_sao'] * 100 / 5 ?>%
										">★★★★★</span>
                    </div>
                  </div>
                  <span>
                    Ngày viết <?= $review['ngay_dg'] ?>
                  </span>
                  <p>
                    <?= $review['danh_gia'] ?>
                  </p>
                </div>
              <?php endforeach ?>
            <?php else : ?>
              <h3>Sản phẩm này không có đánh giá</h3>
            <?php endif ?>
          </div>
          <!-- loged user review -->

          <?php
          if (isset($_SESSION['user']) && $_SESSION['user']['id'] && checkBoughtProduct($_GET['id'])) { ?>
            <div class="review-write-container">
              <h3>Bạn đã mua sản phẩm này trước đây, đã đủ điều kiện để đánh giá</h3>
              <form method="POST">
                <label class="review-write-label">Đánh giá:</label>
                <div class="review-write-star-input">
                  <label>
                    <input type="radio" name="so_sao" value="1" required />
                    <span class="icon">★</span>
                  </label>
                  <label>
                    <input type="radio" name="so_sao" value="2" required />
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                  </label>
                  <label>
                    <input type="radio" name="so_sao" value="3" required />
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                  </label>
                  <label>
                    <input type="radio" name="so_sao" value="4" required />
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                  </label>
                  <label>
                    <input type="radio" name="so_sao" value="5" required />
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                  </label>
                </div>

                <label class="review-write-label">Nội dung:</label>
                <textarea name="danh_gia" class="review-write-input" required></textarea>

                <button type="submit" class="review-write-submit styled-btn" name="review">
                  Gửi
                </button>
              </form>
            </div>
          <?php } ?>
        </section>

        <section class="detail-section">
          <h2>Bình luận</h2>
          <div class="reviews-container">
            <?php if (!empty($comments)) : ?>
              <?php foreach ($comments as $comment) : ?>
                <?php $user = showOne('tb_nguoi_dung', $comment['id_nd']) ?>
                <div class="review">
                  <div class="review-row">
                    <img class="review-avatar" src="<?= BASE_URL . 'uploads/users/' . $user['avatar'] ?>" alt="avatar">
                    <h3 class="review-name">
                      <?= $user['ho_ten'] ?>
                    </h3>
                  </div>
                  <span>
                    Ngày viết <?= $comment['thoi_gian'] ?>
                  </span>
                  <p>
                    <?= $comment['noi_dung'] ?>
                  </p>
                </div>
              <?php endforeach ?>
            <?php else : ?>
              <h3>Sản phẩm này không có bình luận</h3>
            <?php endif ?>
          </div>

          <?php if (isset($_SESSION['user']) && $_SESSION['user']['id']) { ?>
            <div class="review-write-container">
              <form method="POST">
                <label class="review-write-label">Bình luận:</label>
                <textarea name="noi_dung" class="review-write-input" required></textarea>
                <button type="submit" class="review-write-submit styled-btn" name="comment">
                  Đăng
                </button>
              </form>
            </div>
          <?php } ?>
        </section>
    </main>
  </div>

  <div id="zoom-modal" onclick="closeZoomModal(event)">
    <div id="zoom-modal-container">
      <img id="zoom-modal-img" src="" alt="image error">

      <button class="zoom-btn" id="zoom-close-btn">X</button>
      <button class="zoom-btn" id="zoom-next-btn" onclick="switchZoomImg(+1)">❯</button>
      <button class="zoom-btn" id="zoom-previous-btn" onclick="switchZoomImg(-1)">❮</button>
    </div>
  </div>

  <!-- Footer -->
  <?php include(PATH_VIEW . 'layouts/footer.php') ?>
</body>

</html>