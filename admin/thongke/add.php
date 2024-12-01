<div class="row">
    <div class="row formtitle">
        <h1>Thêm Thống Kê Mới</h1>
    </div>
    <div class="row formcontent">
        <form action="index.php?act=addthongke" method="post">
            <div class="row mb10">
                Sản Phẩm ID <br>
                <input type="number" name="san_pham_id" required>
            </div>
            <div class="row mb10">
                Số Lượng Bán <br>
                <input type="number" name="so_luong_ban" required>
            </div>
            <div class="row mb10">
                Doanh Thu <br>
                <input type="number" step="0.01" name="doanh_thu" required>
            </div>
            <div class="row mb10">
                Ngày <br>
                <input type="date" name="ngay" required>
            </div>
            <div class="row mb10">
                <input type="submit" name="themmoi" value="Thêm Mới">
                <input type="reset" value="Nhập Lại">
                <a href="index.php?act=listthongke"><input type="button" value="Danh Sách"></a>
            </div>
            <?php if (isset($thongbao) && $thongbao != "") echo $thongbao; ?>
        </form>
    </div>
</div>
