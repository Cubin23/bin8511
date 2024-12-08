<!-- script -->
<script defer src="js/category.js"></script>

<style>
	section.filter {
		display: block;
		width: 100%;
		padding: 8px;
		margin-bottom: 15px;
		border-radius: 4px;
		box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.05);
		background-color: var(--color-1);
	}
</style>

<?php if (isset($_GET['act']) && $_GET['act'] != '/') { ?>
	<section class="filter">
		<h4>Bộ lọc</h4>
		<form action="" method="GET">
			<input type="text" name="act" id="" value="search" hidden>
			<div class="form-group">
				<label for="category">Danh mục:</label>
				<select class="form-control" name="category_id">
					<option value="">Tất cả</option>
					<?php foreach ($categories as $category) : ?>
						<option value="<?= $category['id'] ?>"><?= $category['ten_dm'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<label for="name">Tên sản phẩm:</label>
				<input type="text" class="form-control" name="product_name">
			</div>
			<div class="form-group">
				<label for="price">Giá thấp nhất:</label>
				<input type="number" class="form-control" name="price_min">
			</div>
			<div class="form-group">
				<label for="price">Giá cao nhất:</label>
				<input type="number" class="form-control" name="price_max">
			</div>
			<button type="submit" name="search" class="btn btn-primary mt-3">Áp dụng</button>
		</form>
	</section>
<?php } ?>

<section id="category-container">
	<h2>Danh mục sản phẩm</h2>
	<div id="category-buttons-container">
		<?php
		$categories = listAll('tb_danh_muc_sp');
		foreach ($categories as $category) : ?>
			<a href="?act=search&category_id=<?= $category['id'] ?>&search=" data-category-id="<?= $category['id'] ?>" class="category-button">
				<?php if (!empty($category['hinh_anh'])) { ?>
					<img src="<?= BASE_URL ?>uploads/prCategories/<?= $category['hinh_anh'] ?>" alt="category icon" />
				<?php } ?>
				<span><?= $category['ten_dm'] ?></span>
			</a>
		<?php endforeach ?>
	</div>
</section>

<!-- special offer -->
<section class="aside-special-offer">
	<div class="aside-special-offer-text">
		<h2>Fast.</h2>
		<h2>Robust.</h2>
		<h2>Gorgeous.</h2>
		<h3>Cay van phong</h3>

		<a href="#" class="styled-btn">
			Order Now
		</a>
	</div>
	<div class="aside-special-offer-img">
		<img src="imgs/article/52/2.jpg" alt="Cay van phong" loading="lazy">
		<img src="imgs/article/52/3.jpg" alt="Cay van phong" loading="lazy">
		<img src="imgs/article/52/1.jpg" alt="Cay van phong" loading="lazy">
	</div>
</section>
<!-- under 30000 articles -->
<section class="aside-articles aside-sticky">
	<h3>Dưới 1,000,000 VNĐ</h3>
	<div class="aside-articles-container">
		<?php
		$aside_products = getSearchProduct(null, null, null, 15000000);
		for ($i = 0; $i < 3; $i++) {
			if (isset($aside_products[$i])) {
		?>
				<div class="aside-article article">
					<a href="?act=product&id=<?= $aside_products[$i]['id'] ?>">

						<?php if ($aside_products[$i]['gia_km']) { ?>
							<span class="discount-span">-<?= ceil(100 - ($aside_products[$i]['gia_km']) / ($aside_products[$i]['gia_sp']) * 100) ?>%</span>
						<?php } ?>

						<img src="uploads/products/<?= getProductImage($aside_products[$i]['id'])['hinh_anh'] ?>" />

						<div class="article-brand">
							<span class="label">Danh mục:</span>
							<?php $category  = showOne('tb_danh_muc_sp', $aside_products[$i]['id_dm']);
							if (!empty($category['hinh_anh'])) { ?>
								<img src="uploads/prCategories/<?= $category['hinh_anh'] ?>" />
							<?php } ?>
							<span><?= $category['ten_dm'] ?></span>
						</div>

						<span class="article-title">
							<?= $aside_products[$i]['ten_sp'] ?>
						</span>

						<?php if (!$aside_products[$i]['gia_km']) { ?>
							<span class="article-price"><?= number_format($aside_products[$i]['gia_sp']) ?> VNĐ</span>
						<?php } else { ?>
							<span class="article-price"><?= number_format($aside_products[$i]['gia_km']) ?> VNĐ
							</span>
						<?php } ?>
					</a>
				</div>
		<?php }
		} ?>
	</div>
</section>