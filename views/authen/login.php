<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= BASE_URL ?>imgs/logo/images.png" />
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="css/form.css" />
</head>

<body style="background-image: url('imgs/login-form-background.jpg');">
    <!-- Header -->
    <?php include(PATH_VIEW . 'layouts/header.php') ?>

    <div id="main-container">
        <div class="form-container login-form-container">
            <div class="form-header">
                <img src="imgs/account.png" alt="image error" />
                <h2>Đăng nhập</h2>
            </div>
            <?php if (isset($_SESSION['success'])) { ?>
                <p class="alert alert-success"><?= $_SESSION['success'] ?></p>
            <?php } ?>

            <?php if (isset($_SESSION['error'])) {
                foreach ($_SESSION['error'] as $error) { ?>
                    <p class="alert alert-danger"><?= $error ?></p>
            <?php }
            } ?>

            <form name="login" method="POST">
                <input name="email" type="text" placeholder="Email" required />
                <input name="password" type="password" placeholder="Password" required />
                <button type="submit">
                    <img src="imgs/login.png" alt="image error" />
                    <span>Đăng nhập</span>
                </button>
            </form>
            <span id="switch_span">Chưa có tài khoản? <a href="<?= BASE_URL ?>?act=signup">Đăng ký</a></span>
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