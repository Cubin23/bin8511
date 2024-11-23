<style>
    table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 18px;
    text-align: left;
}

table th, table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
}

table th {
    background-color: #f4f4f4;
    font-weight: bold;
    color: #333;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:nth-child(odd) {
    background-color: #fff;
}

table img {
    width: 100px;
    height: auto;
    border-radius: 5px;
}

table td a {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

table td a:hover {
    color: #0056b3;
    text-decoration: underline;
}

.action-buttons {
    display: flex;
    gap: 10px;
}

.action-buttons a {
    padding: 8px 12px;
    background-color: #28a745;
    color: white;
    border-radius: 4px;
    text-decoration: none;
}

.action-buttons a:hover {
    opacity: 0.9;
}

.action-buttons .delete {
    background-color: #dc3545;
}

.action-buttons .delete:hover {
    opacity: 0.9;
}

</style>
<?php
$products = pdo_query("SELECT * FROM products");
?>

<h2>Danh sách sản phẩm</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Hình ảnh</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($products as $product) : ?>
    <tr>
        <td><?= $product['id'] ?></td>
        <td><?= $product['name'] ?></td>
        <td><?= $product['price'] ?></td>
        <td><img src="../uploads/<?= $product['image'] ?>" width="100"></td>
        <td>
            <a href="index.php?act=editsp&id=<?= $product['id'] ?>">Sửa</a> |
            <a href="index.php?act=deletesp&id=<?= $product['id'] ?>">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
