<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="<?= BASE_URL ?>imgs/logo/images.png" />
  <title>Tài khoản của tôi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link rel="stylesheet" href="css/general.css" />
  <link rel="stylesheet" href="css/aside.css">
  <link rel="stylesheet" href="css/article.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/form.css" />

  <script src="js/validate_password.js"></script>
  <script src="js/previewImage.js"></script>

  <style>
    .form-container {
      box-shadow: none;
      width: 100%;
      margin: 0;
      padding: 0;
    }

    .form-container button[type='submit'] {
      width: 50%;
      margin-top: 2rem;
    }
  </style>
</head>

<body>
  <!-- Header -->
  <?php include(PATH_VIEW . 'layouts/header.php') ?>

  <main>
    <div id="main-container">
      <aside>
        <?php include PATH_VIEW . 'layouts/aside.php' ?>
      </aside>
      <div>
        <section style="min-height: 789px;">
          <div class="form-container">
            <?php if (isset($_SESSION['error'])) {
              foreach ($_SESSION['error'] as $error) { ?>
                <p class="alert alert-danger"><?= $error ?></p>
              <?php }
            }
            if (isset($_SESSION['success'])) { ?>
              <p class="alert alert-success"><?= $_SESSION['success'] ?></p>
            <?php } ?>
            <!-- info -->
            <form method="POST" enctype="multipart/form-data">
              <div class="form-header">
                <img src="imgs/account.png" alt="image error" />
                <h2>Thông tin của tôi</h2>
              </div>

              <div id="sections-container">
                <div class="section">
                  <br /><span>Họ tên</span>
                  <input value="<?= $user['ho_ten'] ?>" name="ho_ten" type="text" minlength="2" maxlength="155" required />
                  <br /><span>Email</span>
                  <input value="<?= $user['email'] ?>" name="email" type="email" minlength="2" maxlength="155" required />
                  <br /><span>Giới tính</span>
                  <div class="d-flex align-items-center gap-4 mb-3">
                    <div class="form-check ps-4">
                      <input class="form-check-input" type="radio" name="gioi_tinh" id="gioi_tinh1" value="male" <?= $user['gioi_tinh'] == "male" ? "checked" : "" ?>>
                      <label class="form-check-label" for="gioi_tinh1">
                        Nam
                      </label>
                    </div>
                    <div class="form-check ps-4">
                      <input class="form-check-input" type="radio" name="gioi_tinh" value="female" id="gioi_tinh2" <?= $user['gioi_tinh'] == "female" ? "checked" : "" ?>>
                      <label class="form-check-label" for="gioi_tinh2">
                        Nữ
                      </label>
                    </div>
                  </div>
                </div>
                <div class="splitter"></div>
                <div class="section">
                  <br /><span>Địa chỉ</span>
                  <input value="<?= $user['dia_chi'] ?>" name="dia_chi" type="text" maxlength="155" />
                  <br /><span>Số điện thoại</span>
                  <input value="<?= $user['so_dien_thoai'] ?>" name="so_dien_thoai" type="number" maxlength="155" />
                  <br /><span>Ngày sinh</span>
                  <input value="<?= $user['ngay_sinh'] ?>" name="ngay_sinh" type="date" min="1900-01-01" max="<?= date('Y-m-d') ?>" />
                </div>
              </div>
              <div>
                <label for="image" class="form-label">Ảnh đại diện:</label>
                <div class="mb-3 input-group">
                  <input type="file" class="form-control" id="image" accept="image/*" onchange="loadFile(event)" name="avatar">
                </div>
                <div class="text-center">
                  <img id="output" width="200px" height="200px" <?= $user['avatar'] ? 'src="' . BASE_URL . 'uploads/users/' . $user['avatar'] . '"' : '' ?> />
                </div>
              </div>
              <button name="change_info" type="submit" class="styled-btn">
                <span>Cập nhật</span>
              </button>
            </form>
            <hr>
            <!-- password -->
            <form method="POST">
              <div class="form-header">
                <h2>Mật khẩu của tôi</h2>
              </div>
              <div id="sections-container" style="width: 50%;">
                <div class="section" style="width: 100%;">
                  <br /><span>Mật khẩu cũ</span>
                  <input name="old_password" type="password" minlength="4" maxlength="155" required />
                  <br /><span>Mật khẩu mới</span>
                  <input name="password" type="password" minlength="4" maxlength="155" required />
                  <br /><span>Xác nhận mật khẩu mới</span>
                  <input name="password_conf" type="password" required />
                </div>
              </div>
              <button name="change_password" type="submit" class="styled-btn" onclick="validatePassword();">
                <span>Đổi mật khẩu</span>
              </button>
            </form>
          </div>
        </section>
        <!-- galaxy s9 special offer -->
        <section id="s9-special-offer" class="special-offer">
          <div class="special-offer-img">
            <img src="imgs/special_offers/s9_special_offer.png" alt="">
          </div>
          <div class="special-offer-text">
            <h2>Galaxy S9</h2>
            <p>
              With a camera that works like your eye.
            </p>
            <a href="article?article_id=51" class="styled-btn">
              ORDER NOW
            </a>
          </div>
        </section>
        <!-- airpods special offer -->
        <section id="airpods-special-offer" class="special-offer">
          <div class="special-offer-text">
            <h2>AirPods Pro</h2>
            <p>
              AirPods deliver effortless, all-day audio on the go.
            </p>
            <a href="article?article_id=1" class="styled-btn">
              ORDER NOW
            </a>
          </div>
          <div class="special-offer-img">
            <img src="imgs/special_offers/airpods_special_offer.png" alt="">
          </div>
        </section>
      </div>
    </div>
  </main>
  <script>
    $('.display-link').on("click", function(e) {
      let target = e.target.dataset.target;
      $('.hidden-cart-table').hide();
      $(target).show();
    });
  </script>

  <!-- feedback notification -->
  <?php if (isset($_GET['fn'])) : ?>
    <div id="feedback_notification" class="fn-<?= $_GET['fn'] ?>">
      <span><?= $_GET['fn_message'] ?></span>
      <button id="fn-close">X</button>
    </div>
    <script>
      document
        .getElementById('fn-close')
        .addEventListener('click', () => document
          .getElementById('feedback_notification').remove()
        )
    </script>
  <?php endif ?>

  <!-- Footer -->
  <?php include(PATH_VIEW . 'layouts/footer.php') ?>
</body>

</html>