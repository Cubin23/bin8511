<div class="row">
    <div class="row frmtitle">
        <h1>THÊM LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row frmcontent">
        <form action="index.php?act=adddm" method="post">
            <div class="row mb10">
                <label for="maloai">Mã loại</label><br>
                <input type="text" id="maloai" name="maloai" disabled>
            </div>
            <div class="row mb10">
                <label for="tenloai">Tên loại</label><br>
                <input type="text" id="tenloai" name="tenloai">
            </div>
            <div class="row mb10">
                <input type="submit" name="themmoi" value="THÊM MỚI">
                <input type="reset" value="NHẬP LẠI">
                <a href="danhsach_loaihang.html">
                    <input type="button" value="DANH SÁCH">
                </a>
            </div>
            <?php if (isset($thongbao) && !empty($thongbao)): ?>
                <div class="row mb10">
                    <p style="color: red;"><?= htmlspecialchars($thongbao); ?></p>
                </div>
            <?php endif; ?>
        </form>
    </div>
</div>
