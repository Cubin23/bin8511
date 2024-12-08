<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= BASE_URL_ADMIN ?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item  <?= !isset($_GET['act'])  ? "active" : "" ?>">
    <a class="nav-link" href="<?= BASE_URL_ADMIN ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <!-- <hr class="sidebar-divider"> -->

  <!-- Nav Item - Role -->
  <li class="nav-item">
    <a class="nav-link" href="<?= BASE_URL ?>">
      <i class="fa-solid fa-cart-shopping"></i>
      Website
    </a>
  </li>

  <li class="nav-item <?= isset($_GET['act']) && strpos($_GET['act'], 'role') !== false ? "active" : "" ?>">
    <a class="nav-link" href="<?= BASE_URL_ADMIN ?>?act=roles">
      <i class="fa-solid fa-user"></i>
      <span>QL Chức vụ</span></a>
  </li>

  <!-- Nav Item - User -->
  <li class="nav-item <?= isset($_GET['act']) && strpos($_GET['act'], 'user') !== false ? "active" : "" ?>">
    <a class="nav-link" href="<?= BASE_URL_ADMIN ?>?act=users">
      <i class="fa-solid fa-users"></i>
      <span>QL Người dùng</span></a>
  </li>

  <!-- Nav Item - Pr category -->
  <li class="nav-item <?= isset($_GET['act']) && strpos($_GET['act'], 'prCategor') !== false ? "active" : "" ?>">
    <a class="nav-link" href="<?= BASE_URL_ADMIN ?>?act=prCategories">
      <i class="fa-solid fa-layer-group"></i>
      <span>QL Danh mục Sp</span></a>
  </li>

  <!-- Nav Item - Product -->
  <li class="nav-item <?= isset($_GET['act']) && strpos($_GET['act'], 'product') !== false ? "active" : "" ?>">
    <a class="nav-link" href="<?= BASE_URL_ADMIN ?>?act=products">
      <i class="fa-solid fa-mobile-screen-button"></i>
      <span>QL Sản phẩm</span></a>
  </li>

  <!-- Nav Item - Post -->
  <li class="nav-item <?= isset($_GET['act']) && strpos($_GET['act'], 'post') !== false ? "active" : "" ?>">
    <a class="nav-link" href="<?= BASE_URL_ADMIN ?>?act=posts">
      <i class="fa-solid fa-file-lines"></i>
      <span>QL Bài viết</span></a>
  </li>

  <li class="nav-item <?= isset($_GET['act']) && strpos($_GET['act'], 'contact') !== false ? "active" : "" ?>">
    <a class="nav-link" href="<?= BASE_URL_ADMIN ?>?act=contacts">
      <i class="fa-solid fa-paper-plane"></i>
      <span>QL Liên hệ</span></a>
  </li>

  <li class="nav-item <?= isset($_GET['act']) && strpos($_GET['act'], 'promotion') !== false ? "active" : "" ?>">
    <a class="nav-link" href="<?= BASE_URL_ADMIN ?>?act=promotions">
      <i class="fa-solid fa-ticket"></i>
      <span>QL Khuyến mãi</span></a>
  </li>

  <li class="nav-item <?= isset($_GET['act']) && strpos($_GET['act'], 'order') !== false ? "active" : "" ?>">
    <a class="nav-link" href="<?= BASE_URL_ADMIN ?>?act=orders">
      <i class="fa-solid fa-cart-shopping"></i>
      <span>QL Đơn hàng</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>