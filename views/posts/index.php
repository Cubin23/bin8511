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
              Danh sách bài viết
            </h1>
          </div>
          <div>
          <?php
            foreach ($posts as $post) {  
            ?>
                <div class="article">
                  <a href="?act=post&id=<?= $post['id'] ?>">

                    <?php if ($post['hinh_anh']) { ?>
                      <img src="<?= BASE_URL . 'uploads/posts/' . $post['hinh_anh'] ?>" alt="<?= $post['tieu_de'] ?>">
                    <?php } ?>
                    <div class="article-brand">
                    </div>

                    <span class="article-title">
                      <?= $post['tieu_de'] ?>
                    </span>

                    <span class="article-description">
                      <?= $post['mo_ta_bv'] ?>
                    </span>

                    <span class="article-date">
                      <?= $post['ngay_dang'] ?>
                    </span>
                  </a>
                </div>
            <?php
            }
            ?>
          </div>
        </section>
        <!-- landotbien special offer -->
        <section id="s9-special-offer" class="special-offer">
          <div class="special-offer-img">
            <img src="imgs/special_offers/landotbien_offer.jpg" alt="">
          </div>
          <div class="special-offer-text">
            <h1>Lan dot bien</h1>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>