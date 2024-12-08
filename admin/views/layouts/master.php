<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?= BASE_URL ?>imgs/logo/logo-black.png" />

  <title><?= $title ?? "Dashboard" ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fontawesome-6-pro@6.4.0/css/all.min.css" integrity="sha256-R6pa/zpbhz9IjJIAXKP/0Kk53cRwfsjdik4Ojf9lOrQ=" crossorigin="anonymous">

  <!-- Custom fonts for this template-->
  <link href="<?= BASE_URL ?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= BASE_URL ?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

  <?php
  if (isset($styles) && is_array($styles)) {
    foreach ($styles as $style) {
      require_once PATH_VIEW_ADMIN . $style . '.php';
    }
  }
  ?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php require_once PATH_VIEW_ADMIN . 'layouts/sidebar.php' ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php require_once PATH_VIEW_ADMIN . 'layouts/topbar.php' ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <?php require_once PATH_VIEW_ADMIN . $view . '.php' ?>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php require_once PATH_VIEW_ADMIN . 'layouts/footer.php' ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php require_once PATH_VIEW_ADMIN . 'components/logoutModal.php' ?>


  <!-- Bootstrap core JavaScript-->
  <script src="<?= BASE_URL ?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?= BASE_URL ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= BASE_URL ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= BASE_URL ?>assets/admin/js/sb-admin-2.min.js"></script>

  <?php
  if (isset($scripts) && is_array($scripts)) {
    foreach ($scripts as $script) {
      require_once PATH_VIEW_ADMIN  . $script . '.php';
    }
  }
  ?>

  <script src="<?= BASE_URL ?>js/previewImage.js"></script>
</body>

</html>