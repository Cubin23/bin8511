<div class="row">
    <div class="row formtitle">
        <h1>Cập Nhật Thống Kê</h1>
    </div>
    <div class="row formcontent">
        <form action="index.php?act=updatethongke" method="post">
            <div class="row mb10">
                Sản Phẩm ID <br>
                <input type="number" name="san_pham_id" value="<?= $thongke['san_pham_id'] ?>" required>
            </div>
            <div class="row mb10">
                Số Lượng Bán <br>
                <input type="number" name="so_luong_ban" value="<?= $thongke['so_luong_ban'] ?>" required>
            </div>
            <div class="row mb10">
                Doanh Thu <br>
                <input type="number" step="0.01" name="doanh_thu" value="<?= $thongke['doanh_thu'] ?>" required>
            </div>
            <div class="row mb10">
                Ngày <br>
                <input type="date" name="ngay" value="<?= $thongke['ngay'] ?>" required>
            </div>
            <div class="row mb10">
                <input type="hidden" name="thong_ke_id" value="<?= $thongke['thong_ke_id'] ?>">
                <input type="submit" name="capnhat" value="Cập Nhật">
                <input type="reset" value="Nhập Lại">
                <a href="index.php?act=listthongke"><input type="button" value="Danh Sách"></a>
            </div>
            <?php if (isset($thongbao) && $thongbao != "") echo $thongbao; ?>
        </form>
    </div>
</div>
