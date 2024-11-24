<style>
    table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px auto;
    font-family: 'Roboto', sans-serif;
}

table th,
table td {
    padding: 12px 15px;
    text-align: left;
    border: 1px solid #ddd;
}

table th {
    background-color: #f4f4f4;
    font-weight: bold;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #f1f1f1;
}

table img {
    width: 100px;
    height: auto;
    object-fit: cover;
}

table a {
    color: #007bff;
    text-decoration: none;
}

table a:hover {
    text-decoration: underline;
}

h2 {
    text-align: center;
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

</style>
<?php
$sql = "SELECT * FROM san_pham";
$list_san_pham = pdo_query($sql);
?>

<h2>Danh sách sản phẩm</h2>

<table border="1" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Mô tả</th>
        <th>Ảnh</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($list_san_pham as $sp) : ?>
        <tr>
            <td><?= $sp['san_pham_id'] ?></td>
            <td><?= $sp['ten_san_pham'] ?></td>
            <td><?= $sp['gia'] ?></td>
            <td><?= $sp['mo_ta'] ?></td>
            <td><img src="../uploads/<?= $sp['anh_url'] ?>" width="100"></td>
            <td>
                <a href="index.php?act=editsp&id=<?= $sp['san_pham_id'] ?>">Sửa</a> | 
                <a href="index.php?act=deletesp&id=<?= $sp['san_pham_id'] ?>">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
