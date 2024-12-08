<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <?php if (isset($_SESSION['error'])) {
        foreach ($_SESSION['error'] as $error) { ?>
            <p class="alert alert-danger"><?= $error ?></p>
    <?php }
    } ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= BASE_URL_ADMIN ?>?act=posts">Quay trở lại</a>
            </h6>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tiêu đề bài viết:<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="tieu_de" name="tieu_de" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Mô tả bài viết:<span class="text-danger"></span></label>
                            <input type="text" class="form-control" id="mo_ta_bv" name="mo_ta_bv" required autofocus>
                        </div>
                        <label for="image" class="form-label">Hình ảnh:<span class="text-danger">*</span></label>
                        <div class="mb-3 input-group">
                            <input type="file" class="form-control" id="hinh_anh" accept="image/*" onchange="loadFile(event)" name="hinh_anh" required>
                            <label class="input-group-text" for="image">Tải lên</label>
                        </div>
                        <div class="text-center">
                            <img id="output" width="200px" height="200px" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="content" class="form-label">Nội dung bài viết:<span class="text-danger">*</span></label>
                            <textarea class="form-control" id="noi_dung" name="noi_dung" rows="13" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <div>
                        <a href="<?= BASE_URL_ADMIN ?>?act=posts" class=" btn btn-secondary">Quay trở lại</a>
                        <button type="reset" class="btn btn-danger">Đặt lại</button>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>