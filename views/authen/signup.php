<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="<?= BASE_URL ?>imgs/logo/images.png" />
  <title>Đăng ký</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/general.css" />
  <link rel="stylesheet" href="css/form.css" />

  <script src="js/validate_password.js"></script>
</head>

<body style="background-image: url('imgs/signup-form-background.jpg');">
  <!-- Header -->
  <?php include(PATH_VIEW . 'layouts/header.php') ?>

  <div id="main-container">
    <div class="form-container signup-form-container">
      <div class="form-header">
        <img src="imgs/new-account.png" alt="image error" />
        <h2>Đăng ký</h2>
      </div>
      <?php if (isset($_SESSION['error'])) {
        foreach ($_SESSION['error'] as $error) { ?>
          <p class="alert alert-danger"><?= $error ?></p>
      <?php }
      } ?>

      <form name="signup" method="POST">
        <div id="sections-container">
          <div class="section">
            <input name="ho_ten" type="text" minlength="2" maxlength="155" placeholder="Họ và tên" required />
            <input name="email" type="email" maxlength="155" placeholder="Email" required />
            <input name="mat_khau" type="password" minlength="4" maxlength="155" placeholder="Mật khẩu" required />
            <input name="password_conf" type="password" placeholder="Xác nhận mật khẩu" required />
          </div>
          <div class="splitter"></div>
          <div class="section">
            <input name="dia_chi" type="text" maxlength="155" placeholder="Địa chỉ" required />
            <input name="so_dien_thoai" type="text" maxlength="155" placeholder="Số điện thoại" required />
            <br /><span>Ngày sinh</span>
            <input name="ngay_sinh" type="date" min="1900-01-01" max="<?= date("Y-m-d") ?>" required />
          </div>
        </div>
        <button type="submit" onclick="validatePassword();">
          <img src="imgs/create.png" alt="image error" />
          <span>Đăng ký</span>
        </button>
      </form>
      <span id="switch_span">Đã có tài khoản? <a href="<?= BASE_URL ?>?act=login">Đăng nhập</a></span>
    </div>
  </div>

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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>