<div class="row">
    <div class="row formtitle">
     <center> <h1>Danh Sách Thống Kê</h1></center>  
    </div>
    <div class="row formcontent">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sản Phẩm ID</th>
                    <th>Số Lượng Bán</th>
                    <th>Doanh Thu</th>
                    <th>Ngày</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listthongke as $thongke) { ?>
                    <tr>
                        <td><?= $thongke['thong_ke_id'] ?></td>
                        <td><?= $thongke['san_pham_id'] ?></td>
                        <td><?= $thongke['so_luong_ban'] ?></td>
                        <td><?= number_format($thongke['doanh_thu'], 2) ?> VND</td>
                        <td><?= $thongke['ngay'] ?></td>
                        <td>
                            <a href="index.php?act=suathongke&thong_ke_id=<?= $thongke['thong_ke_id'] ?>">Sửa</a>
                            <a href="index.php?act=xoathongke&thong_ke_id=<?= $thongke['thong_ke_id'] ?>">Xóa</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<style>
    /* CSS cho bảng thống kê */
table {
    width: 100%;
    border-collapse: collapse; /* Gộp các đường viền vào nhau */
    margin-bottom: 20px;
    font-family: Arial, sans-serif;
}

th, td {
    padding: 12px 15px;
    text-align: left;
    border: 1px solid #ddd; /* Đường viền giữa các ô */
}

/* Phần tiêu đề bảng */
th {
    background-color: #4CAF50; /* Màu nền cho tiêu đề */
    color: white;
    font-weight: bold;
    text-align: center;
}

/* Các dòng lẻ và chẵn có màu nền khác nhau */
tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:nth-child(odd) {
    background-color: #f2f2f2;
}

/* Hiệu ứng khi rê chuột qua các hàng */
tr:hover {
    background-color: #ddd; /* Đổi màu khi hover */
}

/* Căn chỉnh các ô ở giữa (thường cho dữ liệu số) */
td.center {
    text-align: center;
}

/* Căn chỉnh số liệu bên phải */
td.right {
    text-align: right;
}

</style>
