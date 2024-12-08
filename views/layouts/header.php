<head>
	<link rel="stylesheet" href="css/header.css" />
	<script src="js/jquery/jquery-3.3.1.min.js"></script>
	<script src="js/cart.js"></script>
</head>

<body>
	<header>
		<nav>
			<div id="logo">
				<a href="./">
					<img src="imgs/logo/images.png" alt="error" />
				</a>
			</div>

			<form method="GET" action="" id="research">
				<input type="text" name="act" value="search" hidden>
				<input type="search" name="product_name" minlength="2" placeholder="VD: iPhone, Samsung ..." required />
				<button type="submit" name="search">
					<img src="imgs/search.png" alt="error" />
					<span>Tìm kiếm</span>
				</button>
			</form>

			<ul id="navigation" class="m-0 p-0">
				<?php if (!isset($_SESSION['user'])) : ?>
					<li class="navigation-item">
						<img src="imgs/connect.png" alt="image error" />
						<span>Xác thực</span>

						<div class="nav-hover-tab" id="connect-nht">
							<a href="<?= BASE_URL ?>?act=login" class="nht-login-button">
								<img src="imgs/account.png" alt="image error" />
								<span>Đăng nhập</span>
							</a>

							<span class="splitter"></span>

							<a href="<?= BASE_URL ?>?act=signup" class="nht-login-button">
								<img src="imgs/new-account.png" alt="image error" />
								<span>Đăng ký</span>
							</a>
						</div>
					</li>
				<?php else : ?>
					<li class="navigation-item">
						<img src="imgs/connect.png" alt="image error" />
						<span>Tài khoản</span>

						<div class="nav-hover-tab" id="connect-nht">
							<?php if ($_SESSION['user']['id_cv'] == 1) : ?>
								<a href="<?= BASE_URL_ADMIN ?>" class="nht-login-button" style="margin-bottom: 8px">
									<img src="imgs/admin.png" alt="image error" />
									<span>Trang quản trị</span>
								</a>
							<?php endif ?>

							<a href="<?= BASE_URL ?>?act=account" class="nht-login-button" style="margin-bottom: 8px">
								<img src="imgs/information.png" alt="image error" />
								<span>Thông tin</span>
							</a>

							<a href="<?= BASE_URL ?>?act=myOrder" class="nht-login-button">
								<img src="imgs/shopping-cart.png" alt="image error" />
								<span>Đơn hàng</span>
							</a>

							<span class="splitter"></span>

							<a href="<?= BASE_URL ?>?act=logout" class="nht-login-button">
								<img src="imgs/logout.png" alt="image error" />
								<span>Đăng xuất</span>
							</a>
						</div>
					</li>
				<?php endif ?>
			</ul>

			<div id="cart-container" class="align-self-center">
				<a href="<?= BASE_URL ?>?act=cart">
					<button id="cart-button" class="position-relative">
						<?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) != 0) : ?>
							<span class="position-absolute z-3 top-0 start-100 translate-middle badge rounded-pill bg-danger">
								<?= count($_SESSION['cart'])  ?>
							</span>
						<?php endif ?>
						<img src="imgs/shopping-cart.png" alt="image error" />
					</button>
				</a>
			</div>
		</nav>
	</header>
	<style>
		/* CSS để thay đổi màu nền và màu chữ khi hover */
		.navbar-nav .nav-link:hover {
			background-color: #c0c0c0 !important;
			/* Màu nền khi hover */
			color: var(--color-3) !important;
			/* Màu chữ khi hover */
		}
	</style>
	<section class="container-header bg-body-tertiary">
		<nav class="navbar navbar-expand-lg">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="navbarScroll">
					<ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll d-flex justify-content-center gap-4 w-100" style="--bs-scroll-height: 100px;">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="./"><span style="font-size: 18px; font-weight: bold">Trang chủ</span></a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link text-black dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<span style="font-size: 18px; font-weight: bold">Danh mục</span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<?php
									$categories = listAll('tb_danh_muc_sp');
									foreach ($categories as $category) : ?>
										<a href="?act=search&category_id=<?= $category['id'] ?>&search=" data-category-id="<?= $category['id'] ?>" class="category-button">
											<img src="<?= BASE_URL ?>uploads/prCategories/<?= $category['hinh_anh'] ?>" alt="category icon" />
											<span style="font-size: 15px; font-weight: bold"><?= $category['ten_dm'] ?></span>
										</a>
									<?php endforeach ?>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="?act=posts-index"><span style="font-size: 18px; font-weight: bold">Bài viết</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="?act=contact"><span style="font-size: 18px; font-weight: bold">Liên hệ</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="?act=promotion"><span style="font-size: 18px; font-weight: bold">Mã khuyến mãi</span></a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</section>

</body>