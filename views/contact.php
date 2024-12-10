<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= BASE_URL ?>imgs/logo/images.png" />
    <title>Liên hệ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="css/form.css" />
</head>

<body style="background-image: url('imgs/contact-us-form-background.jpg');">
    <!-- Header -->
    <?php include(PATH_VIEW . 'layouts/header.php') ?>

    <div id="main-container">
        <div class="form-container contact-us-form-container">
            <div class="form-header">
                <img src="imgs/contact-us.png" alt="image error" />
                <h2>Liên hệ</h2>
            </div>
            <?php if (isset($_SESSION['error'])) {
                foreach ($_SESSION['error'] as $error) { ?>
                    <p class="alert alert-danger"><?= $error ?></p>
                <?php }
            }
            if (isset($_SESSION['success'])) { ?>
                <p class="alert alert-success"><?= $_SESSION['success'] ?></p>
            <?php } ?>

            <form method="post">
                <div id="sections-container">
                    <div>
                        <input name="tieu_de" type="text" placeholder="Tiêu đề" required />
                        <input class="ms-4" name="ten_kh" type="text" placeholder="Họ và tên" required />
                        <input class="ms-4" name="email" type="text" placeholder="Email" required />
                        <input name="so_dien_thoai" type="text" placeholder="Số điện thoại" required />
                        <input class="ms-4" name="dia_chi" type="text" placeholder="Địa chỉ" />
                    </div>
                </div>
                <textarea name="noi_dung" rows="8" cols="80" required placeholder="Nội dung"></textarea>
                <button type="submit">
                    <img src="imgs/send.png" alt="image error" />
                    <span>Gửi</span>
                </button>
            </form>
        </div>
    </div>

    <footer></footer>
</body>

</html>