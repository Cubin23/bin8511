<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= BASE_URL ?>imgs/logo/images.png" />
    <title><?= $post['tieu_de'] ?></title>
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

        <main>

            <section class="main-section" style="display: block ">
                <div id="">
                    <h1 id="article-title">
                        <?= $post['p_tieu_de'] ?>
                    </h1>
                </div>

                <div id="article-date">
                    <span class="label">Ngày đăng:</span>
                    <span><?= $post['p_ngay_dang'] ?></span>
                </div>

                <div id="article-author">
                    <span class="label">Đăng bởi:</span>
                    <span><?= $post['us_name'] ?></span>
                </div>

                <div id="article-img">
                    <img src="<?= BASE_URL ?>uploads/posts/<?= $post['p_hinh_anh'] ?>" alt="<?= $post['p_tieu_de'] ?>" width="100%">
                </div>

                <div id="article-content">
                    <?= $post['p_noi_dung'] ?>
                </div>

            </section>

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

        </main>
    </div>
</body>

</html>